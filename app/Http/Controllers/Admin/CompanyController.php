<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CompanyRequest;
use App\Traits\ImageUploadTrait;

class CompanyController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::latest()->paginate(5);

        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $image = NULL;
        if ($request->hasFile('logo')) {
            $image = $this->uploadImage($request->name, $request->logo, 'companies', 197, 183);
        }

        Company::create([
            'name' => $request->name,
            'logo' => $image,
        ]);

        return redirect()->route('admin.companies.index')->with([
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
    public function show(Company $company)
    {
        return view('admin.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request,Company $company)
    {
          $image = $company->logo;
        if ($request->has('logo')) {
            if ($company->cover != null && File::exists('storage/images/companies/'. $company->cover)) {
                unlink('storage/images/companiess/'. $company->cover);
            }
            $image = $this->uploadImage($request->name, $request->logo, 'companies', 268, 268);
        }

        $company->update([
            'name' => $request->name,
            'logo' => $image,
        ]);

        return redirect()->route('admin.companies.index')->with([
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
    public function destroy(Company $company)
    {
        if ($company->logo) {
            if (File::exists('storage/images/companies/'. $company->logo)) {
                unlink('storage/images/companies/'. $company->logo);
            }
        }

        $company->delete();

        return redirect()->route('admin.companies.index')->with([
            'message' => 'deleted successfully',
            'alert-type' => 'danger'
        ]);
    }
}
