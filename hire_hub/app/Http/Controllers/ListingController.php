<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Mail\JobPost;
use App\Mail\JobPosted;
use App\Models\Company;
use App\Models\Country;
use App\Models\Listing;
use App\Mail\JobApplied;
use App\Mail\JobApply;
use App\Models\Category;
use App\Models\Candidate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ListingController extends Controller
{
    // Search Jobs and List Job to the Welcome Page
    public function index(Request $request)
{
    $listings = Listing::where('is_active', true)
            ->with('tags')
            ->latest()
            ->paginate(4);
    // $query = $request->input('s', ''); // Get the search query from the request
    $query = strtolower($request->get('s'));

    if (!empty($query)) {
        $listings = Listing::where('is_active', true)
        ->with('tags', 'company') // Eager load both tags and company
        ->latest();

        if ($request->has('s')) {
            $listings = $listings->where(function ($queryBuilder) use ($query) {
                $queryBuilder
                    ->where('title', 'like', '%' . $query . '%')
                    ->orWhereHas('company', function ($companyQuery) use ($query) {
                        $companyQuery->where('name', 'like', '%' . $query . '%'); // Search by company name
                    })
                    ->orWhere('country', 'like', '%' . $query . '%');
            });
        }

        $listings = $listings->paginate(4);
    } 

    $tags = Tag::orderBy('name')->get();

    if ($request->has('tag')) {
        $listings = Listing::where('is_active', true)
            ->with('tags')
            ->latest()
            ->get();
        $tag = $request->get('tag');
        $listings = $listings->filter(function ($listing) use ($tag) {
            return $listing->tags->contains('slug', $tag);
        });
    }

    return view('listings.index', compact('listings', 'tags'))->with('hero', ['listings' => $listings, 'tags' => $tags]);
}


    // Show a Job Full information
    public function show(Listing $listing, Request $request){
        return view('listings.show', compact('listing'));
    }

    // Store applied Jobs with the the user applying
    public function apply(Listing $listing, Request $request){
        $candidate = Candidate::where('user_id', Auth::id())->first();
        $company = Company::where('id', $listing->company_id)->first();

        // Check if the candidate has already applied to this listing
        if ($candidate->clicks()->where('listing_id', $listing->id)->exists()) {
            session()->flash('error', 'You have already applied to this job.');
            return redirect()->back();
        }

        $listing->clicks()
                ->create([
                    'user_agent' => $request->userAgent(),
                    'ip' => $request->ip(),
                    'candidate_id' => $candidate->id
                ]);
        
        Mail::to($candidate->email)->send(new JobApplied($candidate));
        Mail::to($company->email)->send(new JobApply($candidate, $company, $listing));
        session()->flash('success', 'Job applied successfully !!!');
        
        return redirect()->route('candidate.show', $candidate);
    }


    // Create or Post a New Job
    public function create(){
        $countries = Country::all();
        $categories = Category::all();

        return view('listings.create', compact('countries', 'categories'));
    }

    // Store a brand new created Job
    public function store(Request $request){
        $company = Company::where('user_id', Auth::id())->first();
        $candidates = Candidate::all();

        // Process the listing creation form
        $request->validate([
            'title' => 'required',
            'country' => 'required',
            'category' => 'required',
            'type' => 'required',
            'experience' => 'required',
            'tag' => 'required',
            'cdate' => 'required',
            'content' => 'required'
        ]);

        // Create the listing
        try {
            $listing = $company->listings()
                ->create([
                    'title' => $request->title,
                    'country' => $request->country,
                    'category' => $request->category,
                    'type' => $request->type,
                    'experience' => $request->experience,
                    'closing_date' => $request->cdate,
                    'job_description' => $request->input('content'),
                    'slug' => Str::slug($request->title) . '-' . rand(1111, 9999),
                    'is_active' => true
                ]);
            
            foreach (explode(',', $request->tag) as $requestTag) {
                $trimmedTag = trim($requestTag);

                // Check if the tag already exists
                $tag = Tag::where('slug', Str::slug($trimmedTag))->first();

                if (!$tag) {
                    $tag = Tag::create([
                        'slug' => Str::slug($trimmedTag),
                        'name' => ucwords($trimmedTag)
                    ]);
                }

                // Attach the tag to the listing if it's not already attached
                if (!$listing->tags->contains($tag->id)) {
                    $tag->listings()->attach($listing->id);
                }
            }

            Mail::to($company->email)->send(new JobPosted($company));
            foreach ($candidates as $candidate){
                Mail::to($candidate->email)->send(new JobPost($candidate, $company, $listing));
            }

            session()->flash('success', 'Job posted successfully !!!');
            return redirect()->route('company.show', $company);
            
        } catch(\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    // Get All Listings
    public function getJobs(){
        $listings = Listing::where('is_active', true)
        ->with('tags')
        ->latest()
        ->paginate(7);

        $tags = Tag::orderBy('name')
        ->get();

        return view('listings.jobs', compact('listings', 'tags'));
    }

    // Get All Companies
    public function getCompanies(){
        $companies = Company::paginate(3);

        return view('listings.companies', compact('companies'));
    }

    // Get All Candidates
    public function getCandidates(){
        $candidates =Candidate::paginate(3);

        return view('listings.candidates', compact('candidates'));
    }
}
