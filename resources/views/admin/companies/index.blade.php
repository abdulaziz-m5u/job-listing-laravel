@extends('layouts.admin')

@section('content')
   <div class="container">
    <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('Companies') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('admin.companies.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>{{ __('New company') }}
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th class="text-center" style="width: 30px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($companies as $company)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('admin.companies.show', $company->id) }}">
                                    {{ $company->name }}
                                </a>
                            </td>
                            <td>
                                <img width="60" src="{{ Storage::url('images/companies/'. $company->logo) }}" alt="">
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.companies.edit', $company) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form onclick="return confirm('are you sure !')" action="{{ route('admin.companies.destroy', $company) }}"
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
                            <td class="text-center" colspan="6">No companies found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                <div class="float-right">
                                    {!! $companies->appends(request()->all())->links() !!}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
   </div>
@endsection
