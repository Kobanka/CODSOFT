<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Country;
use App\Models\Listing;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::where('user_id', Auth::id())->first();
        return view('company.show', compact('company'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {

        if($company->user_id != Auth::id()){
            return abort(403);
        }
        return view('company.show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $countries = Country::all();
        $categories = Category::all();

        if($company->user_id != Auth::id()){
            return abort(403);
        }

        return view('company.edit', compact('company', 'countries', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        if($company->user_id != Auth::id()){
            return abort(403);
        }

        $request->validate([
            'email' => [
                'required', 'string', 'email', 'max:255',
                Rule::unique('companies')->ignore($company->id),
            ],
        ]);

        $user = $request->user(); // Get the authenticated user

        $company->update([
            'name' => $request->input('cname'),
            'email' => $request->input('email'),
            'established' => $request->input('cdate'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'category' => $request->input('category'),
            'phone' => $request->input('phone'),
            'people' => $request->input('people'),
            'profile_photo' => !is_null($request->file('file')) ? basename($request->file('file')->store('public')) : $company->profile_photo,
            'profile_uploaded' => !is_null($request->file('file') || $company->profile_photo) ? true : false,
            'about_comp' => $request->input('about')
        ]);

        if ($user->email !== $request->input('email')) {
            // Update user email and reset email_verified_at
            $user->email = $request->input('email');
            $user->email_verified_at = null;
            $user->save();
        }

        return redirect()->route('company.show', $company)->with('success', 'Profile updated successfully');
    }

    public function getJobs(Company $company){
        $listings = $company->listings()
        ->with('tags')
        ->latest()
        ->paginate(5);

        return view('company.jobs', compact('company', 'listings'));

    }

}
