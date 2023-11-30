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
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Category List</h2>
                    </div>
                    <div class="card-body">
                        @if (session('delete_category'))
                            <div class="alert alert-info">{{ session('delete_category') }}</div>
                        @endif
                        <table class="table table-bordered">
                            <tr>
                                <th>Sl</th>
                                <th>Category Name</th>
                                <th>Added By</th>
                                <th>Category Image</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($categories as $sl=>$category)
                                <tr>
                                    <td>{{ $sl+1 }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->rel_to_user->name }}</td>
                                    <td>
                                        @if ($category->cat_image == null)
                                            <img src="{{ Avatar::create($category->category_name)->toBase64() }}" />
                                        @else
                                            <img src="{{ asset('uploads/category') }}/{{ $category->cat_image }}" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown mb-2">
                                            <button class="btn p-0" type="button" id="dropdownMenuButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg text-muted pb-3px"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                                              <a class="dropdown-item d-flex align-items-center" href="{{ route('category.edit', $category->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-sm mr-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg> <span class="">Edit</span></a>
                                              <a class="dropdown-item d-flex align-items-center" href="{{ route('category.delete', $category->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash icon-sm mr-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> <span class="">Delete</span></a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2>Trash Category List</h2>
                    </div>
                    <div class="card-body">
                        @if (session('delete_category'))
                            <div class="alert alert-info">{{ session('delete_category') }}</div>
                        @endif
                        <table class="table table-bordered">
                            <tr>
                                <th>Sl</th>
                                <th>Category Name</th>
                                <th>Added By</th>
                                <th>Category Image</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($trashed as $sl=>$category)
                                <tr>
                                    <td>{{ $sl+1 }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->rel_to_user->name }}</td>
                                    <td>
                                        @if ($category->cat_image == null)
                                            <img src="{{ Avatar::create($category->category_name)->toBase64() }}" />
                                        @else
                                            <img src="{{ asset('uploads/category') }}/{{ $category->cat_image }}" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown mb-2">
                                            <button class="btn p-0" type="button" id="dropdownMenuButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg text-muted pb-3px"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                                              <a class="dropdown-item d-flex align-items-center" href="{{ route('category.restore', $category->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-sm mr-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg> <span class="">Restore</span></a>
                                              <a class="dropdown-item d-flex align-items-center" href="{{ route('trash.delete', $category->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash icon-sm mr-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> <span class="">Delete</span></a>
                                            </div>
                                          </div>

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-warning">{{ session('success') }}</div>
                    @endif
                    <div class="card-header">
                        <h2>Add new category</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" type="text" value="{{ old('category_name') }}" name="category_name" placeholder="Enter the category name">
                            @error('category_name')
                                <strong class="text-danger">{{ $message  }}</strong>
                            @enderror
                            <input class="form-control mt-2" type="file" name="cat_image" id="">
                            @error('cat_image')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                            <button class="btn form-control mt-2 btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
