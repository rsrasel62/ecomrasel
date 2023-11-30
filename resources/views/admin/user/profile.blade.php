@extends('layouts.dashboard')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                @if (session('namupdate'))
                    <div class="alert alert-info">{{ session('namupdate') }}</div>
                @endif
                <div class="card-body">
                                  <h6 class="card-title">Profile update</h6>
                                  <form class="forms-sample" action="{{ route('usernameemail.update') }}" method="POST">
                                    @csrf
                                      <div class="form-group">
                                          <label for="exampleInputUsername1">Username</label>
                                          <input type="text" name="name" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ Auth::user()->name }}" placeholder="{{ Auth::user()->name }}">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Email address</label>
                                          <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="{{ Auth::user()->email }}" value="{{ Auth::user()->email }}">
                                      </div>
                                      <button type="submit" class="btn btn-primary mr-2">Update</button>
                                  </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    @if (session('passreset'))
                    <div class="alert alert-info">{{ session('passreset') }}</div>
                    @endif
                                  <h6 class="card-title">Profile update</h6>
                                  <form class="forms-sample" action="{{ route('user.password.update') }}" method="POST">
                                    @csrf
                                      <div class="form-group">
                                          <label for="exampleInputUsername1">Old Password</label>
                                          <input type="Password" name="old_password" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="******" >
                                          @if (session('wrongPass'))
                                            <strong class="text-danger">{{ session('wrongPass') }}</strong>
                                          @endif
                                          @error('old_password')
                                                <strong class="text-danger">{{ $message }}</strong>
                                          @enderror
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputUsername1">New Password</label>
                                          <input type="password" name="new_password" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="******">
                                          @error('new_password')
                                          <strong class="text-danger">{{ $message }}</strong>
                                          @enderror
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputUsername1">Confirm Password</label>
                                          <input type="password" class="form-control" name="confirm_password" id="exampleInputUsername1" autocomplete="off" placeholder="******">
                                          @error('confirm_password')
                                          <strong class="text-danger">{{ $message }}</strong>
                                          @enderror
                                      </div>

                                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                      <button class="btn btn-light">Cancel</button>
                                  </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('profile.photo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        @if (session('photoupdate'))
                        <div class="alert alert-info">{{ session('photoupdate') }}</div>
                        @endif
                        <label>File upload</label>

                        <div class="input-group col-xs-12">
                            @if (Auth::user()->image == null)
                              <img src="{{ asset('uploads/1.png') }}" alt="">
                            @else
                              <img width="100" src="{{ asset('uploads/user') }}/{{ Auth::user()->image }}" alt="">
                            @endif
                        </div>

                        <input type="file" name="photo" class="file-upload-default">
                        <div class="input-group mt-3 col-xs-12">
                            <input type="file" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                        <div class="input-group mt-3 col-xs-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4"></div>
    </div>
</div>
@endsection
