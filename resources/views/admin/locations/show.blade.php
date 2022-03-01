@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ $location->name }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">
                        <span class="text">Back to location</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Created at</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $location->name }}</td>
                        <td>{{ $location->created_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
