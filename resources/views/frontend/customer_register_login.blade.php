@extends('frontend.master')
@section('content')
			<!-- ======================= Top Breadcrubms ======================== -->
			<div class="gray py-3">
				<div class="container">
					<div class="row">
						<div class="colxl-12 col-lg-12 col-md-12">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item"><a href="#">Pages</a></li>
									<li class="breadcrumb-item active" aria-current="page">Login</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- ======================= Top Breadcrubms ======================== -->

			<!-- ======================= Login Detail ======================== -->
			<section class="middle">
				<div class="container">
					<div class="row align-items-start justify-content-between">

						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
							<form class="border p-3 rounded" action="{{ route('customer.login') }}" method="POST">
                                @if(session('wrong_pass'))
                                    <strong class="text-danger">{{ session('wrong_pass') }}</strong>
                                @endif
                                @if(session('login'))
                                   <div class="alert alert-info">{{ session('login') }}</div>
                                @endif
                                @csrf
								<div class="form-group">
									<label>User email *</label>
									<input type="email" name="email" class="form-control" placeholder="email*">
                                    @error('email')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
								</div>

								<div class="form-group">
									<label>Password *</label>
									<input type="password" name="password" class="form-control" placeholder="Password*">
                                    @error('password')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
								</div>

								<div class="form-group">
									<div class="d-flex align-items-center justify-content-between">
										<div class="flex-1">
											<input id="dd" class="checkbox-custom" name="dd" type="checkbox">
											<label for="dd" class="checkbox-custom-label">Remember Me</label>
										</div>
										<div class="eltio_k2">
											<a href="#">Lost Your Password?</a>
										</div>
									</div>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-md full-width bg-dark text-light fs-md ft-medium">Login</button>
								</div>
							</form>
						</div>

						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mfliud">
							<form class="border p-3 rounded" action="{{ route('customer.store') }}" method="POST">
                                @csrf

									<div class="form-group">
										<label>Name *</label>
										<input type="text" name="name" class="form-control" placeholder="First Name">
                                        @error('name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
									</div>


								<div class="form-group">
									<label>Email *</label>
									<input type="email" name="email" class="form-control" placeholder="email*">
                                    @error('email')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
								</div>

								<div class="row">
									<div class="form-group col-md-6">
										<label>Password *</label>
										<input type="password" name="password" class="form-control" placeholder="Password*">
                                        @error('password')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror

									</div>

									<div class="form-group col-md-6">
										<label>Confirm Password *</label>
										<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password*">
                                        @error('confirm_password')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
									</div>
								</div>

								<div class="form-group">
									<p>By registering your details, you agree with our Terms & Conditions, and Privacy and Cookie Policy.</p>
								</div>

								<div class="form-group">
									<div class="d-flex align-items-center justify-content-between">
										<div class="flex-1">
											<input id="ddd" class="checkbox-custom" name="ddd" type="checkbox">
											<label for="ddd" class="checkbox-custom-label">Sign me up for the Newsletter!</label>
										</div>
									</div>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-md full-width bg-dark text-light fs-md ft-medium">Create An Account</button>
								</div>
							</form>
						</div>

					</div>
				</div>
			</section>
@endsection
