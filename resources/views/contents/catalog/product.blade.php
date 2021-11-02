@extends('layouts.app')

@section('vendor-styles')
    <!-- Slider -->
    <link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet">
@endsection

@section('title')
{{ $product->title }}
@endsection

@section('content')
    <!-- Start Product -->
    <section class="section pb-0" style="min-height: 90vh;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="tiny-single-item">
                        @foreach($product->gallery->images as $photo)
                        <div class="tiny-slide"><img src="{{ $photo->path }}" class="img-fluid rounded" alt=""></div>
                        @endforeach
                    </div>
                </div><!--end col-->

                <div class="col-md-7 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="section-title ms-md-4">
                        <h4 class="title">{{ $product->title }}</h4>
                        <h5 class="text-muted">${{ $product->price }}</h5>
                        <ul class="list-unstyled text-warning h5 mb-0">
                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                        </ul>

                        <h5 class="mt-4 py-2">Overview :</h5>
                        <p class="text-muted">{{ $product->description }}</p>

                        <div class="mt-4 py-2">
                            <a href="{{ $product->stock > 0 ? route('cart.add', ['productId' => $product->id]) : '#' }}" class="btn btn-soft-primary ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                Add to Cart
                            </a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

    </section><!--end section-->

    <!-- End Product -->
@endsection

@section('vendor-script')
    <!-- SLIDER -->
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
@endsection
