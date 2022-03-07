@extends('layouts.frontend')

@section('banner', $banner)

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 post-list">
        @foreach($jobs as $job)
            <div style="column-gap: 3rem;" class="single-post d-flex align-items-center flex-row border-bottom">
                <div class="thumb">
                    @if($job->company->logo)
                        <img src="{{ Storage::url('images/companies/'. $job->company->logo) }}" alt="">
                    @endif
                </div>
                <div class="details">
                    <div class="title d-flex flex-row justify-content-between">
                        <div class="titles">
                            <a href="{{ route('job.show', $job->id) }}"><h4>{{ $job->title }}</h4></a>
                            <h6>{{ $job->company->name }}</h6>					
                        </div>
                    </div>
                    <p>
                        {{ $job->short_description }}
                    </p>
                    <h5>Job Nature: {{ $job->job_nature }}</h5>
                    <p class="address"><span class="lnr lnr-map"></span> {{ $job->address }}</p>
                    <p class="address"><span class="lnr lnr-database"></span> {{ $job->salary }}</p>
                </div>
            </div>
        @endforeach
        {{ $jobs->appends(request()->query())->links() }}
    </div>	
</div>
@endsection