@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('Edit job') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="text">{{ __('Back to job') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.jobs.update', $job) }}" method="POST" >
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="title">title</label>
                                <input class="form-control" id="title" type="text" name="title" value="{{ old('title', $job->title) }}">
                                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="company">company</label>
                                <select name="company_id" id="company" class="form-control select2" required>
                                    @foreach($companies as $id => $company)
                                        <option value="{{ $id }}" {{ (isset($job) && $job->company ? $job->company->id : old('company_id')) == $id ? 'selected' : '' }}>{{ $company }}</option>
                                    @endforeach
                                </select>
                                @error('company_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="short_description">short description</label>
                                <textarea name="short_description" id="short_description" cols="30" rows="10">{{ old('short_description', $job->short_description) }}</textarea>
                                @error('short_description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="full_description">full description</label>
                                <textarea name="full_description" id="full_description" cols="30" rows="10">{{ old('full_description', $job->full_description) }}</textarea>
                                @error('full_description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="requirements">requirements</label>
                                <textarea name="requirements" id="requirements" cols="30" rows="10">{{ old('requirements', $job->requirements) }}</textarea>
                                @error('requirements')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="job_nature">job nature</label>
                                <input class="form-control" id="job_nature" type="text" name="job_nature" value="{{ old('job_nature', $job->job_nature) }}">
                                @error('job_nature')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="location">location</label>
                                <select name="location_id" id="location" class="form-control select2" required>
                                    @foreach($locations as $id => $location)
                                        <option value="{{ $id }}" {{ (isset($job) && $job->location ? $job->location->id : old('location_id')) == $id ? 'selected' : '' }}>{{ $location }}</option>
                                    @endforeach
                                </select>
                                @error('job_nature')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="address">address</label>
                                <textarea name="address" id="address" cols="30" rows="10" width="100">{{ old('address', $job->address) }}</textarea>
                                @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="categories">categories</label>
                                <select name="categories[]" id="categories" class="form-control select2" multiple="multiple">
                                    @foreach($categories as $id => $categories)
                                        <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || isset($job) && $job->categories->contains($id)) ? 'selected' : '' }}>{{ $categories }}</option>
                                    @endforeach
                                </select>
                                @error('categories')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="salary">salary</label>
                                <input class="form-control" id="salary" type="number" name="salary" value="{{ old('salary',$job->salary) }}">
                                @error('salary')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="top_rated">top rated</label>
                                <input name="top_rated" type="hidden" value="0">
                                <input value="1" type="checkbox" id="top_rated" name="top_rated" {{ old('top_rated', $job->top_rated) == 1 ? 'checked' : '' }}>
                                @error('top_rated')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group pt-4">
                        <button class="btn btn-primary" type="submit" name="submit">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
