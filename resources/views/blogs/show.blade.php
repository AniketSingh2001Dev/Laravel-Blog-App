@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between pt-5 mb-4">
            <h3 class="fs-1 text-capitalize"><b>{{ $blog->title }}</b></h3>
            <div>
                <a href="{{ route('blogs.index') }}" class="btn btn-dark text-uppercase"><b>Back</b></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 fs-5">
                <p>By <b class="text-capitalize">{{ $blog->author }}</b> on <i>{{ \Carbon\Carbon::parse($blog->created_at)->format('l, jS F, Y') }}</i> at {{ \Carbon\Carbon::parse($blog->created_at)->format('h:i A') }} IST</p>
            </div>
            <img src="https://placehold.co/800x250" alt="image" width="800px" height="250px" class="img-fluid">
            <p class="mt-3 fs-5">{{ $blog->description }}</p>
        </div>

    </div>
@endsection