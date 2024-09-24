@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('blogs.index') }}" class="btn btn-dark text-uppercase"><b>Show All Blogs</b></a>
        </div>
    </div>
@endsection