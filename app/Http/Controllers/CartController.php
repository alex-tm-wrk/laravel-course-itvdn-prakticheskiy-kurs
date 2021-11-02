<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartUpdateRequest;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::content();

        return view('contents.cart.index', compact('cart'));
    }

    public function add($productId)
    {
        $product = Product::findOrfail($productId);

        $cartItem = Cart::add($product->id, $product->title, 1, $product->price, 1, ['slug' => $product->slug, 'img' => $product->cover]);
        $cartItem->associate(Product::class);

        return back();
    }

    public function update(CartUpdateRequest $request)
    {
        Cart::update($request->productId, $request->qty);

        return back();
    }

    public function drop($productId)
    {
        Cart::remove($productId);

        return back();
    }

    public function destroy()
    {
        Cart::destroy();

        return back();
    }

    public function checkout()
    {
        $cart = Cart::content();

        return view('contents.orders.index', compact('cart'));
    }

    public function success($orderId)
    {
        $order = Order::findOrFail($orderId);

        return view('contents.orders.success', compact('order'));
    }
}
