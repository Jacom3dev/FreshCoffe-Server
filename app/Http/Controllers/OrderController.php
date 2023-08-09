<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProducts;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $order = Order::create([
            "user_id"=>$userId,
            "total"=>$request->total
        ]);

        $products = $request->products;
        $order_product = [];

        foreach ($products as $product) {
            $order_product[] = [
                "order_id"=>$order->id,
                "product_id"=>$product["id"],
                "amount"=>$product["amount"],
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now()
            ];
        }

        OrderProducts::insert($order_product);
        return ["message"=>"order created"];
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
