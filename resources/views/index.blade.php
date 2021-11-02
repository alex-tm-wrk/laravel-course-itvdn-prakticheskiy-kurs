@extends('layouts.app')

@section('title')
    Home
@endsection

@section('vendor-styles')
    <!-- Slider -->
    <link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Start -->
    <section class="section">
        <!-- Start Most Viewed Products -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="mb-0">Most Viewed Products</h5>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                @foreach($products as $product)
                    @include('contents.catalog.cart2', compact('product'))
                @endforeach
            </div><!--end row-->
        </div><!--end container-->
        <!-- End Most Viewed Product -->

    </section><!--end section-->
    <!-- End -->
@endsection

@section('vendor-script')
    <!-- SLIDER -->
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    <!-- Icons -->
    <script src="{{ asset('js/feather.min.js') }}"></script>
@endsection
