@extends('layouts.front')

@section('title')
    Checkout
@endsection


@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('cart') }}">
                    Cart
                </a> 
            </h6> 
        </div>
</div>
    <div class="container mt-3">
        <form action="{{ url('place-order') }}" method="POST">
        {{csrf_field()  }}
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">

                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text"   class="form-control firstname" value="{{Auth::user()->name }}" name="fname" placeholder="Enter First name">
                                <span id="fname_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text"  class="form-control lastname" value="{{Auth::user()->lname}}"  name="lname" placeholder="Enter Last name">
                                <span id="lname_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="text"  class="form-control email"  value="{{Auth::user()->email }}"  name="email" placeholder="Enter Email">
                                <span id="email_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="">Phone Number</label>
                                <input type="text"  class="form-control phone" name="phone" value="{{Auth::user()->phone }}"  placeholder="Enter Phone Number">
                                <span id="phone_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="">Address 1</label>
                                <input type="text"  class="form-control address1" name="address1" value="{{Auth::user()->address1 }}"  placeholder="Enter Address 1">
                                <span id="address1_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <input type="text"  class="form-control address2" name="address2"   value="{{Auth::user()->address2 }}" placeholder="Enter Address 2">
                                <span id="address2_error" class="text-danger"></span>
                            </div>

                            
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <input type="text"  class="form-control city"   name="city"   value="{{Auth::user()->city }}" placeholder="Enter City">
                                <span id="city_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="">State</label>
                                <input type="text"  class="form-control state" name="state"   value="{{Auth::user()->state }}" placeholder="Enter State">
                                <span id="state_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="">Country</label>
                                <input type="text"  class="form-control country" name="country"  value="{{Auth::user()->country }}" placeholder="Enter Country">
                                <span id="country_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="">Pin Code</label>
                                <input type="text"  class="form-control pincode" name="pincode"  value="{{Auth::user()->pincode }}" placeholder="Enter Pin Code">
                                <span id="pincode_error" class="text-danger"></span>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                 
                    <div class="card-body">
                        @php $total = 0;  @endphp
                        <h6>Order Details</h6>
                          <hr>
                          <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>

                                <tbody>
                                  @foreach ($cartItems as $item)
                                        <tr>
                                            <td>{{$item->products->name}}</td>
                                            <td>{{$item->prod_qty}}</td>
                                            <td>{{$item->products->selling_price}} <small><strong>RSD</strong></small></td>
                                         </tr>
                                    @php  $total +=$item->products->selling_price * $item->prod_qty;   @endphp
                                   @endforeach
                                </tbody>
                               
                            </thead>
                          
                          </table>
                          <h6>Grand Total: <p class="float-end"> {{ $total }} <small>RSD</small></p></h6>
                          <hr>
                          <input type="hidden" name="payment_mode" value="COD">
                          <button type="submit" class="btn btn-success w-100 float-end">Place Order | COD</button>
                          {{-- <button type="button" class="btn btn-primary w-100 mt-3 razorpay_btn">Play with Razopay</button> --}}
                          {{-- <button type="button" class="btn btn-primary w-100 mt-3">Pay with Razopay</button> --}}
                    </div> 
                 
                </div>
            </div>
        </div>
    </form>
    </div>

@endsection

@section('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

@endsection