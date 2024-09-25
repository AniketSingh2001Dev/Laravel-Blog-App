@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between pt-5 mb-4">
            <h3 class="fs-2"><b>All Blogs</b></h3>
            <div>
                <a href="{{ route('blogs.create') }}" class="btn btn-dark text-uppercase"><b>Create</b></a>
            </div>
        </div>
        <div class="row">
            @if ($blogs->isNotEmpty())
                @foreach ($blogs as $blog)
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card border-0 shadow-lg">
                            <img src="https://placehold.co/600x400" alt="thumbnail" width="600px" height="400px" class="card-img-top img-fluid">
                            <div class="card-body">
                                <h4 class="card-title text-capitalize"><b>{{ $blog->title }}</b></h4>
                                <p class="card-text">{{ $blog->desc }}</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-dark text-uppercase"><b>Details</b></a>
                                    <div>
                                        <a href="{{ route('blogs.edit', $blog->id) }}" class="text-dark px-2"><i class="fa-solid fa-pen"></i></a>
                                        <a href="delete.html" class="text-dark"><i class="fa-solid fa-trash-can"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection