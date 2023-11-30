@extends('frontend.master')
@section('content')
<section class="middle">
    {{-- <div class="container">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="text-center d-block mb-5">
                    <h2>Checkout</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-12 col-lg-7 col-md-12">
                <form>
                    <h5 class="mb-4 ft-medium">Billing Details</h5>
                    <div class="row mb-2">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="text-dark">Customer Name *</label>
                                <input type="text" class="form-control" name="customer_name" value="{{ Auth::guard('customerlogin')->user()->name }}" placeholder="First Name" />
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="text-dark">Email *</label>
                                <input type="email" class="form-control" name="customer_email" value="{{ Auth::guard('customerlogin')->user()->email }}" placeholder="Email" />
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="text-dark">Company</label>
                                <input type="text" name="company" class="form-control" placeholder="Company Name (optional)" />
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="text-dark">Country *</label>
                                <select class="custom-select" name="country">
                                  <option value="1" selected="">India</option>
                                  <option value="2">United State</option>
                                  <option value="3">United Kingdom</option>
                                  <option value="4">China</option>
                                  <option value="5">Pakistan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="text-dark">City / Town *</label>
                                <select class="custom-select" name="city">
                                  <option value="1" selected="">India</option>
                                  <option value="2">United State</option>
                                  <option value="3">United Kingdom</option>
                                  <option value="4">China</option>
                                  <option value="5">Pakistan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                            <div class="form-group">
                                <label class="text-dark">Address</label>
                                <input type="text" class="form-control" placeholder="Address" />
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                            <div class="form-group">
                                <label class="text-dark">ZIP / Postcode *</label>
                                <input type="number" name="zip" class="form-control" placeholder="Zip / Postcode" />
                            </div>
                        </div>


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="text-dark">Mobile Number *</label>
                                <input type="number" name="number" class="form-control" placeholder="Mobile Number" />
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="text-dark">Additional Information</label>
                                <textarea name="notes" class="form-control ht-50"></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="row mb-4">
                        <div class="col-12 d-block">
                            <input id="createaccount" class="checkbox-custom" name="createaccount" type="checkbox">
                            <label for="createaccount" class="checkbox-custom-label">Create An Account?</label>
                        </div>
                    </div>

                    <h5 class="mb-4 ft-medium">Payments</h5>
                    <div class="row mb-4">
                        <div class="col-12 col-lg-12 col-xl-12 col-md-12">
                            <div class="panel-group pay_opy980" id="payaccordion">

                                <!-- Pay By Paypal -->
                                <div class="panel panel-default border">
                                    <div class="panel-heading" id="pay">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" role="button" data-parent="#payaccordion" href="#payPal" aria-expanded="true"  aria-controls="payPal" class="">PayPal<img src="assets/img/paypal.html" class="img-fluid" alt=""></a>
                                        </h4>
                                    </div>
                                    <div id="payPal" class="panel-collapse collapse show" aria-labelledby="pay" data-parent="#payaccordion">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="text-dark">PayPal Email</label>
                                                <input type="text" class="form-control simple" placeholder="paypal@gmail.com">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-dark btm-md full-width">Pay 400.00 USD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pay By Strip -->
                                <div class="panel panel-default border">
                                    <div class="panel-heading" id="stripes">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" role="button" data-parent="#payaccordion" href="#stripePay" aria-expanded="false"  aria-controls="stripePay" class="">Stripe<img src="assets/img/strip.html" class="img-fluid" alt=""></a>
                                        </h4>
                                    </div>
                                    <div id="stripePay" class="collapse" aria-labelledby="stripes" data-parent="#payaccordion">
                                        <div class="panel-body">

                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="text-dark">Card Holder Name *</label>
                                                        <input type="text" class="form-control" placeholder="Dhananjay Preet" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="text-dark">Card Number *</label>
                                                        <input type="text" class="form-control" placeholder="5426 4586 5485 4759" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-5 col-md-5 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-dark">Expire Month *</label>
                                                        <select class="custom-select">
                                                          <option value="1" selected="">January</option>
                                                          <option value="2">February</option>
                                                          <option value="3">March</option>
                                                          <option value="4">April</option>
                                                          <option value="5">May</option>
                                                          <option value="6">June</option>
                                                          <option value="7">July</option>
                                                          <option value="8">August</option>
                                                          <option value="9">September</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-5 col-md-5 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-dark">Expire Year *</label>
                                                        <select class="custom-select">
                                                          <option value="1" selected="">2010</option>
                                                          <option value="2">2018</option>
                                                          <option value="3">2019</option>
                                                          <option value="4">2020</option>
                                                          <option value="5">2021</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-md-2 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="text-dark">CVC *</label>
                                                        <input type="text" class="form-control" placeholder="CVV*">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <input id="ak-2" class="checkbox-custom" name="ak-2" type="checkbox">
                                                        <label for="ak-2" class="checkbox-custom-label">By Continuing, you ar'e agree to conditions</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group text-center">
                                                        <a href="#" class="btn btn-dark full-width">Pay 202.00 USD</a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Pay By Debit or credtit -->
                                <div class="panel panel-default border">
                                    <div class="panel-heading" id="dabit">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#payaccordion" data-target="#debitPay" aria-expanded="false"  aria-controls="debitPay" class="">Debit Or Credit<img src="assets/img/debit.html" class="img-fluid" alt=""></a>
                                        </h4>
                                    </div>
                                    <div id="debitPay" class="panel-collapse collapse" aria-labelledby="dabit" data-parent="#payaccordion">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="text-dark">Card Holder Name *</label>
                                                        <input type="text" class="form-control" placeholder="Card Holder Name" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="text-dark">Card Number *</label>
                                                        <input type="text" class="form-control" placeholder="7589 6356 8547 9120" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-5 col-md-5 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-dark">Expire Month *</label>
                                                        <select class="custom-select">
                                                          <option value="1" selected="">January</option>
                                                          <option value="2">February</option>
                                                          <option value="3">March</option>
                                                          <option value="4">April</option>
                                                          <option value="5">May</option>
                                                          <option value="6">June</option>
                                                          <option value="7">July</option>
                                                          <option value="8">August</option>
                                                          <option value="9">September</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-5 col-md-5 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-dark">Expire Year *</label>
                                                        <select class="custom-select">
                                                          <option value="1" selected="">2010</option>
                                                          <option value="2">2018</option>
                                                          <option value="3">2019</option>
                                                          <option value="4">2020</option>
                                                          <option value="5">2021</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-md-2 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="text-dark">CVC *</label>
                                                        <input type="text" class="form-control" placeholder="CVV*" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <input id="al-2" class="checkbox-custom" name="al-2" type="checkbox">
                                                        <label for="al-2" class="checkbox-custom-label">By Continuing, you ar'e agree to conditions</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group text-center">
                                                        <a href="#" class="btn btn-dark full-width">Pay 202.00 USD</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <!-- Sidebar -->
            <div class="col-12 col-lg-4 col-md-12">
                <div class="d-block mb-3">
                    <h5 class="mb-4">Order Items ({{ $carts->count() }})</h5>
                    <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x mb-4">
                        @foreach ($carts as $cart)
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <!-- Image -->
                                    <a href="product.html"><img src="{{ asset('uploads/product/preview')}}/{{ $cart->rel_to_product->preview }}" alt="..." class="img-fluid"></a>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <div class="cart_single_caption pl-2">
                                        <h4 class="product_title fs-md ft-medium mb-1 lh-1">{{ $cart->rel_to_product->product_name }}</h4>
                                        <p class="mb-1 lh-1"><span class="text-dark">Size: {{ $cart->rel_to_size->size }}</span></p>
                                        <p class="mb-3 lh-1"><span class="text-dark">Color: {{ ($cart->color_id == null)?'NA': $cart->rel_to_color->color_name }}</span></p>
                                        <h4 class="fs-md ft-medium mb-3 lh-1">Tk {{ $cart->rel_to_product->after_discount }}
                                        X {{ $cart->quantity }}</h4>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>

                <div class="card mb-4 gray">
                  <div class="card-body">
                    <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                      <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                        <span>Subtotal</span> <span class="ml-auto text-dark ft-medium">Tk {{ session('subtotal')}}</span>
                      </li>
                      <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                        <span>Tax</span> <span class="ml-auto text-dark ft-medium">$10.10</span>
                      </li>
                      <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                        <span>Total</span> <span class="ml-auto text-dark ft-medium">$108.22</span>
                      </li>
                      <li class="list-group-item fs-sm text-center">
                        Shipping cost calculated at Checkout *
                      </li>
                    </ul>
                  </div>
                </div>

                <a class="btn btn-block btn-dark mb-3" href="checkout.html">Place Your Order</a>
            </div>

        </div>

    </div> --}}
    <div class="container">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="text-center d-block mb-5">
                    <h2>Checkout</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-12 col-lg-7 col-md-12">
<form action="{{ route('order.store')}}" method="POST">
    @csrf
                    <h5 class="mb-4 ft-medium">Billing Details</h5>
                    <div class="row mb-2">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="text-dark">Customer Name *</label>
                                <input type="text" class="form-control" name="name" value="{{ Auth::guard('customerlogin')->user()->name }}" placeholder="First Name" />
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="text-dark">Email *</label>
                                <input type="email" class="form-control" name="email" value="{{ Auth::guard('customerlogin')->user()->email }}" placeholder="Email" />
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="text-dark">Company</label>
                                <input type="text" name="company" class="form-control" placeholder="Company Name (optional)" />
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="text-dark">Phone</label>
                                <input type="tel" name="phone" class="form-control" placeholder="Phone number" />
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="text-dark">Country *</label>
                                <select class="custom-select" id="country_id" name="country_id">
                                  <option value="1" >--Select country--</option>
                                  @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                  @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="text-dark">City / Town *</label>
                                <select class="custom-select" id="city_id" name="city_id">
                                    <option value="">--Select city--</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                            <div class="form-group">
                                <label class="text-dark">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Address" />
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                            <div class="form-group">
                                <label class="text-dark">ZIP / Postcode *</label>
                                <input type="number" name="zip" class="form-control" placeholder="Zip / Postcode" />
                            </div>
                        </div>


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="text-dark">Mobile Number *</label>
                                <input type="number" name="number" class="form-control" placeholder="Mobile Number" />
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="text-dark">Additional Information</label>
                                <textarea name="notes" class="form-control ht-50"></textarea>
                            </div>
                        </div>

                    </div>

                    {{-- <div class="row mb-4">
                        <div class="col-12 d-block">
                            <input id="createaccount" class="checkbox-custom" name="createaccount" type="checkbox">
                            <label for="createaccount" class="checkbox-custom-label">Create An Account?</label>
                        </div>
                    </div>

                    <h5 class="mb-4 ft-medium">Payments</h5>
                    <div class="row mb-4">
                        <div class="col-12 col-lg-12 col-xl-12 col-md-12">
                            <div class="panel-group pay_opy980" id="payaccordion">

                                <!-- Pay By Paypal -->
                                <div class="panel panel-default border">
                                    <div class="panel-heading" id="pay">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" role="button" data-parent="#payaccordion" href="#payPal" aria-expanded="true"  aria-controls="payPal" class="">PayPal<img src="assets/img/paypal.html" class="img-fluid" alt=""></a>
                                        </h4>
                                    </div>
                                    <div id="payPal" class="panel-collapse collapse show" aria-labelledby="pay" data-parent="#payaccordion">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="text-dark">PayPal Email</label>
                                                <input type="text" class="form-control simple" placeholder="paypal@gmail.com">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-dark btm-md full-width">Pay 400.00 USD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pay By Strip -->
                                <div class="panel panel-default border">
                                    <div class="panel-heading" id="stripes">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" role="button" data-parent="#payaccordion" href="#stripePay" aria-expanded="false"  aria-controls="stripePay" class="">Stripe<img src="assets/img/strip.html" class="img-fluid" alt=""></a>
                                        </h4>
                                    </div>
                                    <div id="stripePay" class="collapse" aria-labelledby="stripes" data-parent="#payaccordion">
                                        <div class="panel-body">

                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="text-dark">Card Holder Name *</label>
                                                        <input type="text" class="form-control" placeholder="Dhananjay Preet" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="text-dark">Card Number *</label>
                                                        <input type="text" class="form-control" placeholder="5426 4586 5485 4759" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-5 col-md-5 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-dark">Expire Month *</label>
                                                        <select class="custom-select">
                                                          <option value="1" selected="">January</option>
                                                          <option value="2">February</option>
                                                          <option value="3">March</option>
                                                          <option value="4">April</option>
                                                          <option value="5">May</option>
                                                          <option value="6">June</option>
                                                          <option value="7">July</option>
                                                          <option value="8">August</option>
                                                          <option value="9">September</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-5 col-md-5 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-dark">Expire Year *</label>
                                                        <select class="custom-select">
                                                          <option value="1" selected="">2010</option>
                                                          <option value="2">2018</option>
                                                          <option value="3">2019</option>
                                                          <option value="4">2020</option>
                                                          <option value="5">2021</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-md-2 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="text-dark">CVC *</label>
                                                        <input type="text" class="form-control" placeholder="CVV*">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <input id="ak-2" class="checkbox-custom" name="ak-2" type="checkbox">
                                                        <label for="ak-2" class="checkbox-custom-label">By Continuing, you ar'e agree to conditions</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group text-center">
                                                        <a href="#" class="btn btn-dark full-width">Pay 202.00 USD</a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Pay By Debit or credtit -->
                                <div class="panel panel-default border">
                                    <div class="panel-heading" id="dabit">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#payaccordion" data-target="#debitPay" aria-expanded="false"  aria-controls="debitPay" class="">Debit Or Credit<img src="assets/img/debit.html" class="img-fluid" alt=""></a>
                                        </h4>
                                    </div>
                                    <div id="debitPay" class="panel-collapse collapse" aria-labelledby="dabit" data-parent="#payaccordion">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="text-dark">Card Holder Name *</label>
                                                        <input type="text" class="form-control" placeholder="Card Holder Name" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="text-dark">Card Number *</label>
                                                        <input type="text" class="form-control" placeholder="7589 6356 8547 9120" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-5 col-md-5 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-dark">Expire Month *</label>
                                                        <select class="custom-select">
                                                          <option value="1" selected="">January</option>
                                                          <option value="2">February</option>
                                                          <option value="3">March</option>
                                                          <option value="4">April</option>
                                                          <option value="5">May</option>
                                                          <option value="6">June</option>
                                                          <option value="7">July</option>
                                                          <option value="8">August</option>
                                                          <option value="9">September</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-5 col-md-5 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-dark">Expire Year *</label>
                                                        <select class="custom-select">
                                                          <option value="1" selected="">2010</option>
                                                          <option value="2">2018</option>
                                                          <option value="3">2019</option>
                                                          <option value="4">2020</option>
                                                          <option value="5">2021</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-md-2 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="text-dark">CVC *</label>
                                                        <input type="text" class="form-control" placeholder="CVV*" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <input id="al-2" class="checkbox-custom" name="al-2" type="checkbox">
                                                        <label for="al-2" class="checkbox-custom-label">By Continuing, you ar'e agree to conditions</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group text-center">
                                                        <a href="#" class="btn btn-dark full-width">Pay 202.00 USD</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}


            </div>

            <!-- Sidebar -->
            <div class="col-12 col-lg-4 col-md-12">
                <div class="d-block mb-3">
                    <h5 class="mb-4">Order Items ({{ $carts->count() }})</h5>
                    <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x mb-4">
                        @foreach ($carts as $cart)
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <!-- Image -->
                                    <a href="product.html"><img src="{{ asset('uploads/product/preview')}}/{{ $cart->rel_to_product->preview }}" alt="..." class="img-fluid"></a>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <div class="cart_single_caption pl-2">
                                        <h4 class="product_title fs-md ft-medium mb-1 lh-1">{{ $cart->rel_to_product->product_name }}</h4>
                                        <p class="mb-1 lh-1"><span class="text-dark">Size: {{ $cart->rel_to_size->size }}</span></p>
                                        <p class="mb-3 lh-1"><span class="text-dark">Color: {{ ($cart->color_id == null)?'NA': $cart->rel_to_color->color_name }}</span></p>
                                        <h4 class="fs-md ft-medium mb-3 lh-1">Tk {{ $cart->rel_to_product->after_discount }}
                                        X {{ $cart->quantity }}</h4>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>



                <div class="mb-4">
                    <div class="form-group">
                        <h6>Delivery Location</h6>
                        <ul class="no-ul-list">
                            <li>
                                <input id="c1" class="radio-custom charge" name="charge" type="radio" value="70">
                                <label for="c1" class="radio-custom-label">Inside City</label>
                            </li>
                            <li>
                                <input id="c2" class="radio-custom charge" name="charge" type="radio" value="100">
                                <label for="c2" class="radio-custom-label">Outside City</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="form-group">
                        <h6>Select Payment Method</h6>
                        <ul class="no-ul-list">
                            <li>
                                <input id="c3" class="radio-custom" value="1" name="payment_method" type="radio">
                                <label for="c3" class="radio-custom-label">Cash on Delivery</label>
                            </li>
                            <li>
                                <input id="c4" class="radio-custom" value="2" name="payment_method" type="radio">
                                <label for="c4" class="radio-custom-label">Pay With SSLCommerz</label>
                            </li>
                            <li>
                                <input id="c5" class="radio-custom" value="3" name="payment_method" type="radio">
                                <label for="c5" class="radio-custom-label">Pay With Stripe</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card mb-4 gray">
                    <div class="card-body">
                      <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                        <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                          <span>Subtotal</span> <span class="ml-auto text-dark ft-medium ">TK <span class="sub_total">{{ session('subtotal')}}</span></span>
                        </li>
                        <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                          <span>Charge</span> <span class="ml-auto text-dark ft-medium">TK <span id="charge"></span>
                        </li>
                        <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                          <span>Total</span> <span class="ml-auto text-dark ft-medium" >TK<span id="total"></span></span>
                        </li>
                        <li class="list-group-item fs-sm text-center">
                          Shipping cost calculated at Checkout *
                        </li>
                      </ul>
                    </div>
                  </div>

                  <input type="hidden" name="sub_total" value="{{ session('subtotal') }}">
                  <input type="hidden" name="discount" value="{{ session('discount') }}">
                <button class="btn btn-block btn-dark mb-3" type="submit">Place Your Order</button>
            </div>

        </div>
    </form>
    </div>

</section>
@endsection
@section('footer_script')
<script>
        $('.charge').click(function(){
            var charge = $(this).val();
            var sub_total = $('.sub_total').html();
            var total = parseInt(sub_total)+parseInt(charge);
            $('#charge').html(charge);
            $('#total').html(total);
        });
</script>
<script>
        $('#country_id').change(function(){
            var country_id = $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: 'getcity',
                data: {'country_id': country_id},
                success: function(data) {
                    $('#city_id').html(data);
                }
            });
        });

</script>
<script>
    $('#country_id').select2({
  placeholder: 'Select an option'
});
    $('#city_id').select2({
  placeholder: 'Select an option'
});
</script>
@endsection
