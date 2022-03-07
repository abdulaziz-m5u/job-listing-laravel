<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $jobs = Job::with('company')
            ->whereHas('categories', function($query) use ($category) {
                $query->where('category_id', $category->id);
            })
            ->paginate(7);

        $banner = 'Category: '.$category->name;
    
        return view('frontend.jobs.index', compact(['jobs', 'banner']));
    }
}
