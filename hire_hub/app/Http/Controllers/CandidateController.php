<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Country;
use App\Models\Listing;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidate = Candidate::where('user_id', Auth::id())->first();
        return view('candidate.show', compact('candidate'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        if($candidate->user_id != Auth::id()){
            return abort(403);
        }
        return view('candidate.show')->with('candidate', $candidate);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        $countries = Country::all();

        if($candidate->user_id != Auth::id()){
            return abort(403);
        }

        return view('candidate.edit', compact('candidate', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        if($candidate->user_id != Auth::id()){
            return abort(403);
        }

        $request->validate([
            'email' => [
                'required', 'string', 'email', 'max:255',
                Rule::unique('candidates')->ignore($candidate->id),
            ],
        ]);

        $user = $request->user(); // Get the authenticated user

        $candidate->update([
            'first_name' => $request->input('fname'),
            'last_name' => $request->input('lname'),
            'email' => $request->input('email'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'birthday' => $request->input('birthday'),
            'profile_photo' => !is_null($request->file('file')) ? basename($request->file('file')->store('public')) : $candidate->profile_photo,
            'profile_uploaded' => !is_null($request->file('file') || $candidate->profile_photo) ? true : false,
            'about_me' => $request->input('about')
        ]);

        if ($user->email !== $request->input('email')) {
            // Update user email and reset email_verified_at
            $user->email = $request->input('email');
            $user->email_verified_at = null;
            $user->save();
        }

        return redirect()->route('candidate.show', $candidate)->with('success', 'Profile updated successfully');
    }



    public function getJobs(Candidate $candidate){
        $listings = $candidate->listings()
        ->with('tags')
        ->latest()
        ->paginate(5);

        return view('candidate.jobs', compact('candidate', 'listings'));

    }

}
