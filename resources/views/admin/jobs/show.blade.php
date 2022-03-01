@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ $job->title }}
            </div>

            <div class="card-body">
                <div class="mb-2">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    id
                                </th>
                                <td>
                                    {{ $job->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    title
                                </th>
                                <td>
                                    {{ $job->title }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    company
                                </th>
                                <td>
                                    {{ $job->company->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    short_description
                                </th>
                                <td>
                                    {{ $job->short_description }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    full_description
                                </th>
                                <td>
                                    {!! $job->full_description !!}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    requirements
                                </th>
                                <td>
                                    {!! $job->requirements !!}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    job_nature
                                </th>
                                <td>
                                    {{ $job->job_nature }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    location
                                </th>
                                <td>
                                    {{ $job->location->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                   address
                                </th>
                                <td>
                                    {{ $job->address }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Categories
                                </th>
                                <td>
                                    @foreach($job->categories as $id => $categories)
                                        <span class="label label-info label-many">{{ $categories->name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    salary
                                </th>
                                <td>
                                    {{ $job->salary }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    top_rated
                                </th>
                                <td>
                                    <input type="checkbox" disabled {{ $job->top_rated ? "checked" : "" }}>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a style="margin-top:20px;" class="btn btn-primary" href="{{ route('admin.jobs.index') }}">
                        back
                    </a>
                </div>


            </div>
        </div>
    </div>
@endsection
