<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create([
            'customerName' => $request->firstName,
            'customerLastName' => $request->lastName,
            'customerEmail' => $request->email,
            'customerPhone' => $request->name,
            'customerAddress' => $request->address,
            'comment' => $request->comment,
            'total' => Cart::total(2, '.', '')
        ]);

        foreach (Cart::content() as $row) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $row->model->id,
                'price' => $row->model->price,
                'quantity' => $row->qty
            ]);
        }

        if ($request->has('updateUser'))
        {
            $user = auth()->guest() ? User::where('email', $request->email)->first() : auth()->user();

            if (!is_null($user))
            {
                $user->update([
                    'name' => $request->name,
                    'lastname' => $request->name,
                    'email' => $request->name,
                    'phone' => $request->name,
                    'address' => $request->name
                ]);
                $order->update([
                    'user_id' => $user->id
                ]);
            }
        }

        Cart::destroy();

        return redirect()->route('order.success', ['orderId' => $order->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
