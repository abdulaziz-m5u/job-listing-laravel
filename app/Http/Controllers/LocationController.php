<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function show(Location $location)
    {
        $jobs = Job::with('company')
            ->whereHas('location', function($query) use($location) {
                $query->whereId($location->id);
            })
            ->paginate(7);

        $banner = 'Location: '.$location->name;
    
        return view('frontend.jobs.index', compact(['jobs', 'banner']));
    }
}
