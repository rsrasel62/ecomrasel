@extends('layouts.dashboard')
@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Category</li>
    </ol>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Color list</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Sl</th>
                            <th>Color name</th>
                            <th>Color code</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($colors as $sl=>$color)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $color->color_name }}</td>
                                <td>
                                    <div style="width: 50px; height: 50px; background-color: {{ $color->color_code }}"></div>

                                    {{ ($color->color_code)==null?'no color':'' }}</td>
                                <td>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <h3>size list</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Sl</th>
                            <th>Size name</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($sizes as $sl=>$size)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $size->size }}</td>
                                <td>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add color</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('color.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="color" placeholder="color" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="color_code" placeholder="color code" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-warning">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <h3>Add size</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('size.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="size" placeholder="size" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-warning">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
