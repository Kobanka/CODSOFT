<?php

namespace App\Providers;

use App\Models\Candidate;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.dashboard2', function ($view) {
            $company = Company::where('user_id', Auth::id())->first();
            $listings = $company->listings();
            $view->with('listings', $listings);
        });

        View::composer('layouts.dashboard', function ($view) {
            $candidate = Candidate::where('user_id', Auth::id())->first();
            $listings = $candidate->clicks();
            $view->with('listings', $listings);
        });
    }
}
