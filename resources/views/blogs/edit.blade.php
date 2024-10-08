@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <div class="d-flex justify-content-between pt-5 mb-4">
            <h3 class="fs-2"><b>Edit Blog</b></h3>
            <div>
                <a href="{{ route('blogs.index') }}" class="btn btn-dark text-uppercase fw-bold"><i class="fa-solid fa-angle-left"></i> Back</a>
            </div>
        </div>
        <div class="card border-0 shadow-lg">
            <form action="{{ route('blogs.update', $blog->id) }}" method="POST" name="blogForm" id="blogForm">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label fw-semibold">Title</label>
                        <input type="text" value="{{ $blog->title }}" name="title" id="title" class="form-control" placeholder="Title">
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label fw-semibold">Desc</label>
                        <textarea name="desc" id="desc" cols="30" rows="3" class="form-control" placeholder="Desc">{{ $blog->desc }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold">Description</label>
                        <textarea name="description" id="description" cols="30" rows="7" class="summernote" placeholder="Description">{{ $blog->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="image_id" id="image_id">
                        <label for="image" class="form-label fw-semibold">Image</label>
                        <input type="file" value="{{ $blog->image }}" name="image" id="image" class="form-control" placeholder="Image">
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label fw-semibold">Author</label>
                        <input type="text" value="{{ $blog->author }}" name="author" id="author" class="form-control" placeholder="Author">
                    </div>
                    <button type="submit" class="btn btn-dark text-uppercase fw-bold"><i class="fa-solid fa-wrench"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('CustomJS')
    <script>
        $('#blogForm').submit(function (e) {
            e.preventDefault();
            $("button[type=submit]").prop('disabled', true);
            $.ajax({
                type: "PUT",
                url: "{{ route('blogs.update', $blog->id) }}",
                data: $('#blogForm').serializeArray(),
                dataType: "json",
                success: function (res) {
                    $("button[type=submit]").prop('disabled', false);
                    if (res.status == false) {
                        var err = res.errors;
                        if (err.title) {
                            $('#title').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(err.title);
                        } else {
                            $('#title').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                        }

                        if (err.desc) {
                            $('#desc').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(err.desc);
                        } else {
                            $('#desc').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                        }

                        if (err.description) {
                            $('#description').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(err.description);
                        } else {
                            $('#description').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                        }

                        if (err.author) {
                            $('#author').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(err.author);
                        } else {
                            $('#author').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                        }
                    } else {
                        $('#title').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                        $('#desc').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                        $('#description').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                        $('#author').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                        window.location.href = "{{ route('blogs.index') }}";
                    }
                },
                error: function (jqXHR, exception) {
                    console.log('Something Went Wrong!')
                },
            });
        });

        $(document).ready(function() {
            $('#image').on('change', function() {
                var formData = new FormData();
                formData.append('image', this.files[0]);
                $.ajax({
                    url: "{{ route('images.create') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        $("#image_id").val(res.image_id);
                        var html = `<div class="col-md-10">
                                        <div class="card">
                                            <input type="hidden" name="image_gallery_array[]" value="${res.image_id}">
                                            <img src="${res.ImagePath}" class="card-img-top" alt="">
                                            <div class="card-body">
                                                <a href="#" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>`;
                        $('#image-preview').html(html);
                    },
                    error: function(jqXHR, exception) {
                        console.log('Something Went Wrong!');
                    }
                });
            });
        });
    </script>
@endsection