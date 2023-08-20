<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Candidate;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required', 'string', 'in:candidate,employer'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        if ($user->role == 'employer'){
            Company::create([
                'uuid' => Str::uuid(),
                'user_id' => $user->id,
                'name' => $request->name,
                'email' => $request->email
            ]);

            $company = Company::where('user_id', Auth::id())->get();

            event(new Registered($user));
            Auth::login($user);

            return redirect()->route('company.show', $company)->with('company', $company);
        }
        else {
            // Split the name
            $name_parts = explode(' ', $request->name);
            $first_name = array_shift($name_parts);
            $last_name = implode(' ', $name_parts);


            Candidate::create([
                'uuid' => Str::uuid(),
                'user_id' => $user->id,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $request->email
            ]);

            $candidate = Candidate::where('user_id', Auth::id())->get();

            event(new Registered($user));
            Auth::login($user);

            return redirect()->route('candidate.show', $candidate)->with('candidate', $candidate);
        }

    }
}
