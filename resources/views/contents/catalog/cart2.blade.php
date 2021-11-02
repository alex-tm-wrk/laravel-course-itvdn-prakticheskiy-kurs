<div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
    <div class="card shop-list border-0 position-relative">
        <div class="shop-image position-relative overflow-hidden rounded shadow">
            <a href="{{ route('catalog.show', ['slug' => $product->slug]) }}"><img src="{{ $product->cover }}" class="img-fluid" alt="{{ $product->title }}"></a>
            @if($product->stock > 0)
                <a href="{{ route('catalog.show', ['slug' => $product->slug]) }}" class="overlay-work">
                    <img src="{{ $product->cover }}" class="img-fluid" alt="">
            </a>
            @else
                <div class="overlay-work">
                    <div class="py-2 bg-soft-dark rounded-bottom out-stock">
                        <h6 class="mb-0 text-center">Out of stock</h6>
                    </div>
                </div>
            @endif
        </div>
        <div class="card-body content pt-4 p-2">
            <a href="{{ route('catalog.show', ['slug' => $product->slug]) }}" class="text-dark product-name h6">{{ $product->title }}</a>
            <div class="d-flex justify-content-between mt-1">
                <h6 class="text-dark small fst-italic mb-0 mt-1">${{ $product->price }} <del class="text-danger ms-2">$25.00</del> </h6>
                <ul class="list-unstyled text-warning mb-0">
                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                </ul>
            </div>
            <a href="{{ $product->stock > 0 ? route('cart.add', ['productId' => $product->id]) : '#' }}" class="btn-sm btn-outline-success float-end">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                add to cart
            </a>
        </div>
    </div>
</div><!--end col-->
