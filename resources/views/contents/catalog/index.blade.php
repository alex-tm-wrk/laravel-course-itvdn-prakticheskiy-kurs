@extends('layouts.app')

@section('title')
    Catalog
@endsection

@section('content')
    <!-- Start Products -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="card border-0 sidebar sticky-bar">
                        <div class="card-body p-0">

                            <!-- Categories -->
                            <div class="widget mt-4 pt-2">
                                <h5 class="widget-title">Categories</h5>
                                <ul class="list-unstyled mt-4 mb-0 blog-categories">
                                    @foreach($categories as $category)
                                    <li><a href="jvascript:void(0)">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Categories -->
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-9 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-7">
                            <div class="section-title">
                                <h5 class="mb-0">Showing 1–{{ $products->count() }} of {{ \App\Models\Product::count() }} results</h5>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row">
                        @foreach($products as $product)
                            @include('contents.catalog.cart', compact('product'))
                        @endforeach

                        <!-- PAGINATION START -->
                            {{ $products->links() }}
                        <!-- PAGINATION END -->
                    </div><!--end row-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Products -->
@endsection
