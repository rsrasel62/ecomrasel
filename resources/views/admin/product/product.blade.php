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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Upload product</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <select name="category_id" id="category_id" class="category_id">
                                            <option value="">--Select Category--</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <select name="subcategory_id" id="subcategory" class="subcategory">
                                            <option value="">--select subcategory</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <input type="text" name="product_name" placeholder="product name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <input type="number" name='price' placeholder="product price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <input type="number" name='discount' placeholder="discount%" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <input type="text" name='brand' placeholder="brand" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mt-3">
                                            <input type="text" name='short_desp' placeholder="short description" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mt-3">
                                            <textarea id="summernote" name='long_desp' placeholder="description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mt-3">
                                            <label for="" class="form-label">Product preview</label>
                                            <input type="file" name='preview' placeholder="Product preview" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mt-3">
                                            <label for="" class="form-label">Product thumbails</label>
                                            <input type="file" name='thumbnails[]' multiple placeholder="Product thumbails" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
    </div>
@endsection

@section('footer_script')
    <script>
        $('.category_id').change(function(){
            var category_id = $(this).val();

            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:'/getsubcategory',
            data:{'category_id':category_id},
            success:function(data){
                // alert(data);
                $('.subcategory').html(data);
            }
        });

        });



    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection

