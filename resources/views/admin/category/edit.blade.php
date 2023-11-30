@extends('layouts.dashboard')
@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Category</li>
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Category update</h2>
                </div>
                <div class="card-header">
                    @if (session('update_category'))
                    <div class="alert alert-info">{{ session('update_category') }}</div>
                    @endif
                    <form action="{{ route('category.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <h6 class="card-title">Category update</h6>
                                <div class="form-group">
                                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                                    <label for="exampleInputUsername1">Category name</label>
                                    <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}" id="exampleInputUsername1" autocomplete="off" "="">
                                </div>
                                <div class="form-group">
                                    <label>File upload</label>
                                    <input type="file" name="cat_image" class="file-upload-default" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <img width="300"  id="blah" src="{{ asset('uploads/category') }}/{{ $category->cat_image }}" alt="">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Update</button>

                        </form>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
