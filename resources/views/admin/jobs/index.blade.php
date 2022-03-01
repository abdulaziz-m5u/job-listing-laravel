@extends('layouts.admin')

@section('content')
   <div class="container">
    <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('Jobs') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>{{ __('New job') }}
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>title</th>
                        <th>company</th>
                        <th>short_description</th>
                        <th>location</th>
                        <th>address</th>
                        <th>categories</th>
                        <th>salary</th>
                        <th>top_rated</th>
                        <th class="text-center" style="width: 30px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($jobs as $job)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $job->title }}</td>
                            <td>{{ $job->company->name }}</td>
                            <td>{{ $job->short_description }}</td>
                            <td>{{ $job->location->name }}</td>
                            <td>{{ $job->address }}</td>
                            <td>
                                @foreach($job->categories as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $job->salary }}</td>
                            <td>
                                {{ $job->top_rated ? 'yes' : 'no' }}
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.jobs.show', $job) }}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.jobs.edit', $job) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form onclick="return confirm('are you sure !')" action="{{ route('admin.jobs.destroy', $job) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="10">No locations found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">
                                <div class="float-right">
                                    {!! $jobs->appends(request()->all())->links() !!}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
   </div>
@endsection
