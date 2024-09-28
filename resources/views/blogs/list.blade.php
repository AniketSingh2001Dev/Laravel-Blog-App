@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mt-3">
            @include('alert.message')
        </div>
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
                            @if (!empty($blog->image))
                                <img src="{{ asset('uploads/blogs/thumb/' . $blog->image) }}" alt="thumbnail" width="600px" height="400px" class="card-img-top img-fluid">
                            @else
                                <img src="https://placehold.co/600x400" alt="thumbnail" width="600px" height="400px" class="card-img-top img-fluid">
                            @endif
                            <div class="card-body">
                                <h4 class="card-title text-capitalize"><b>{{ $blog->title }}</b></h4>
                                <p class="card-text">{{ Str::words($blog->desc, 20) }}</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-dark text-uppercase"><b>Details</b></a>
                                    <div>
                                        <a href="{{ route('blogs.edit', $blog->id) }}" class="text-dark px-2"><i class="fa-solid fa-pen"></i></a>
                                        <a href="javascript:void(0)" onclick="deleteBlog({{ $blog->id }})" class="text-dark"><i class="fa-solid fa-trash-can"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-secondary fs-3 text-center mt-5 text-capitalize fw-semibold" role="alert">
                    Be the first person to post a blog!!
                </div>
            @endif
        </div>
    </div>
@endsection

@section('CustomJS')
    <script>
        function deleteBlog(id) {
            var url = "{{ route('blogs.destroy', 'ID') }}";
            var newUrl = url.replace('ID', id);
            if (confirm('Are you sure that you want to Delete This BLOG?')) {
                $.ajax({
                    type: "DELETE",
                    url: newUrl,
                    data: {},
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (res) {
                        if (res.status) {
                            window.location.href = "{{ route('blogs.index') }}";
                        }
                    }
                });
            }
        }
    </script>
@endsection