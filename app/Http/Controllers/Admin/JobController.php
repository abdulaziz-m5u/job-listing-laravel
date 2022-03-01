<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\Company;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JobRequest;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::latest()->paginate(5);

        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all()->pluck('name','id');
        $locations = Location::all()->pluck('name','id');
        $categories = Category::all()->pluck('name','id');

        return view('admin.jobs.create', compact('companies','locations','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        $job = Job::create($request->validated());
        $job->categories()->sync($request->categories);

        return redirect()->route('admin.jobs.index')->with([
            'message' => 'created successfully',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('admin.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $companies = Company::all()->pluck('name','id');
        $locations = Location::all()->pluck('name','id');
        $categories = Category::all()->pluck('name','id');

        return view('admin.jobs.edit', compact('job','companies','locations','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request,Job $job)
    {
        $job->update($request->validated());
        $job->categories()->sync($request->categories);

        return redirect()->route('admin.jobs.index')->with([
            'message' => 'updated successfully',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('admin.jobs.index')->with([
            'message' => 'deleted successfully',
            'alert-type' => 'danger'
        ]);
    }
}
