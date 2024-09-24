@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <div class="d-flex justify-content-between pt-5 mb-4">
            <h3 class="fs-2"><b>Edit Blog</b></h3>
            <div>
                <a href="#" class="btn btn-dark text-uppercase"><b>Back</b></a>
            </div>
        </div>
        <div class="card border-0 shadow-lg">
            <form action="store action" method="POST">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Desc</label>
                        <textarea name="desc" id="desc" cols="30" rows="5" class="form-control" placeholder="Desc"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="15" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control" placeholder="Image">
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" name="author" id="author" class="form-control" placeholder="Author">
                    </div>
                    <button type="submit" class="btn btn-dark text-uppercase"><b>Update</b></button>
                </div>
            </form>
        </div>
    </div>
@endsection