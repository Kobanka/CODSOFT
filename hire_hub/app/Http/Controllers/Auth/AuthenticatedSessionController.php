<?php

namespace App\Http\Controllers\Auth;

use App\Models\Company;
use App\Models\Candidate;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        
        $user = Auth::user(); // Get the authenticated user

        if ($user->role == 'candidate'){
            $candidate = Candidate::where('user_id', Auth::id())->get();
            return redirect('/candidate/show/{candidate}')->with('candidate', $candidate);
        }
        elseif ($user->role == 'employer'){
            $company = Company::where('user_id', Auth::id())->get();
            return redirect('/company/show/{candidate}')->with('company', $company);
        }
        else {
            return redirect()->to('register');
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('listings.index');
    }
}
