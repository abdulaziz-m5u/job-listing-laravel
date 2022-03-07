<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $top_rates =  Job::whereTopRated(true)->latest()->take(3)->get();
        $locations = Location::withCount('jobs')->whereHas('jobs')->orderBy('jobs_count', 'desc')->get();
        $categories = Category::withCount('jobs')->whereHas('jobs')->orderBy('jobs_count', 'desc')->get();
        $jobs = Job::with('company')
            ->latest()
            ->take(7)
            ->get();
        $searchByCategory = Category::withCount('jobs')
            ->whereHas('jobs')
            ->orderBy('jobs_count', 'desc')
            ->take(5)
            ->pluck('name', 'id');
        $searchCategories = Category::pluck('name', 'id');
        $searchLocations = Location::pluck('name', 'id');

        return view('frontend.homepage', compact('top_rates','locations','categories','jobs', 'searchByCategory', 'searchCategories', 'searchLocations'));
    }

    public function search(Request $request)
    {
        $jobs = Job::with('company')
            ->searchResults()
            ->paginate(7);

        $banner = 'Search results';

        return view('frontend.jobs.index', compact(['jobs', 'banner']));
    }
}
