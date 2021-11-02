@extends('layouts.app')

@section('title')
    Checkout
@endsection

@section('content')
    <!-- Start -->
    <section class="section" style="min-height: 90vh;">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <div class="card rounded shadow p-4 border-0">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="h5 mb-0">Your cart</span>
                            <span class="badge bg-primary rounded-pill">{{ \Gloudemans\Shoppingcart\Facades\Cart::count() }}</span>
                        </div>
                        <ul class="list-group mb-3 border">
                            @foreach($cart as $item)
                            <li class="d-flex justify-content-between lh-sm p-3 border-bottom">
                                <div>
                                    <h6 class="my-0">{{ $item->name }}</h6>
                                    <small class="text-muted">${{ $item->qty }} x {{ $item->price }}</small>
                                </div>
                                <span class="text-muted">${{ $item->price * $item->qty }}</span>
                            </li>
                            @endforeach
                            <li class="d-flex justify-content-between p-3">
                                <span>Total (USD)</span>
                                <strong>${{ Cart::total() }}</strong>
                            </li>
                        </ul>

                    </div>
                </div><!--end col-->

                <div class="col-md-7 col-lg-8">
                    <div class="card rounded shadow p-4 border-0">
                        <h4 class="mb-3">Billing address</h4>
                        <form action="{{ route('orders.store') }}" class="needs-validation" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="{{ auth()->user()->name ?? '' }}"
                                           required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="lastName" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="{{ auth()->user()->lastname ?? '' }}"
                                           required>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="phone" class="form-label">Phone</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                                        <div class="invalid-feedback"> Your phone is required. </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email <span
                                            class="text-muted">(Optional)</span></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="{{ auth()->user()->email ?? '' }}">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" value="{{ auth()->user()->address ?? '' }}"
                                           required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="comment" class="form-label">comment</label>
                                    <input type="text" class="form-control" id="comment" name="comment" placeholder="comment" value=""
                                           required>
                                    <div class="invalid-feedback">
                                        Please enter your comment.
                                    </div>
                                </div>

                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="updateUser" name="updateUser">
                                <label class="form-check-label" for="updateUser">Save this information for next
                                    time</label>
                            </div>

                            <button class="w-100 btn btn-primary" type="submit">Continue to checkout</button>
                        </form>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
@endsection
