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
        <div class="card">
            <div class="card-header">
                <h3>Product list</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Sl</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>After discount</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Preview</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($products as $sl=>$product)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ substr($product->product_name, 0, 15) }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ ($product->discount==null?'no discound':$product->discount) }}</td>
                            <td>{{ ($product->after_discount==null?'no discound':$product->after_discount) }}</td>
                            <td>{{ ($product->brand==null?'no brand':$product->brand) }}</td>
                            <td>{{ $product->rel_to_category->category_name }}</td>
                            <td>{{ $product->rel_to_subcategory->subcategory_name }}</td>
                            <td>
                                <img width="50" src="{{ asset('uploads/product/preview') }}/{{ $product->preview }}" alt="">
                            </td>
                            <td>
                                <div class="dropdown mb-2">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg text-muted pb-3px"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                                      <a class="dropdown-item d-flex align-items-center" href="{{ route('add.inventory', $product->id) }}">Add inventory</a>
                                      <a class="dropdown-item d-flex align-items-center" href="{{ route('product.delete', $product->id) }}">Delete</a>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
