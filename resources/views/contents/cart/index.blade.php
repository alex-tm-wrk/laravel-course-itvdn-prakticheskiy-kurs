@extends('layouts.app')

@section('title')
    Cart
@endsection

@section('content')
    <!-- Start -->
    <section class="section" style="min-height: 90vh;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive bg-white shadow rounded">
                        <table class="table mb-0 table-center">
                            <thead>
                            <tr>
                                <th class="border-bottom py-3" style="min-width:20px "></th>
                                <th class="border-bottom text-start py-3" style="min-width: 300px;">Product</th>
                                <th class="border-bottom text-center py-3" style="min-width: 160px;">Price</th>
                                <th class="border-bottom text-center py-3" style="min-width: 160px;">Qty</th>
                                <th class="border-bottom text-end py-3 pe-4" style="min-width: 160px;">Total</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($cart as $item)
                            <tr class="shop-list">
                                <td class="h6 text-center">
                                    <a href="{{ route('cart.drop', ['productId' => $item->rowId]) }}" class="text-danger">
                                        <i class="uil uil-times"></i>
                                    </a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $item->options->img }}" class="img-fluid avatar avatar-small rounded shadow" style="height:auto;" alt="">
                                        <h6 class="mb-0 ms-3">
                                            <a href="{{ route('catalog.show', ['slug' => $item->options->slug]) }}" class="text-dark product-name h6">{{ $item->name }}</a>
                                        </h6>
                                    </div>
                                </td>
                                <td class="text-center">$ {{ $item->price }}</td>
                                <td class="text-center qty-icons">

                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="productId" value="{{ $item->rowId }}">
                                        <input type="number" name="qty" value="{{ $item->qty }}" min="1">
                                        <button class="btn-sm btn-primary" type="submit">Update</button>
                                    </form>
                                </td>
                                <td class="text-end fw-bold pe-4">${{ $item->total() }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row">
                <div class="col-lg-8 col-md-6 mt-4 pt-2">
                    <a href="{{ route('catalog.index') }}" class="btn btn-primary">Shop More</a>
                    <a href="{{ route('cart.destroy') }}" class="btn btn-soft-primary ms-2">Clear Cart</a>
                </div>
                <div class="col-lg-4 col-md-6 ms-auto mt-4 pt-2">
                    <div class="table-responsive bg-white rounded shadow">
                        <table class="table table-center table-padding mb-0">
                            <tbody>
                            <tr>
                                <td class="h6 ps-4 py-3">Subtotal</td>
                                <td class="text-end fw-bold pe-4">$ {{ Cart::subtotal() }}</td>
                            </tr>
                            <tr>
                                <td class="h6 ps-4 py-3">Taxes</td>
                                <td class="text-end fw-bold pe-4">$ {{ Cart::tax() }}</td>
                            </tr>
                            <tr class="bg-light">
                                <td class="h6 ps-4 py-3">Total</td>
                                <td class="text-end fw-bold pe-4">$ {{ Cart::total() }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 pt-2 text-end">
                        <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Proceed to checkout</a>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
@endsection
