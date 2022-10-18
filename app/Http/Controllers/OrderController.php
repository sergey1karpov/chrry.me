<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderProductRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(
        private Order $order,
    ) {}

    public function sendOrder(int $userId, Product $product, OrderProductRequest $request)
    {
        $user = User::find($userId);

        $this->order->sendOrder($userId, $product, $request);

        return redirect()->route('userHomePage', ['slug' => $user->slug])
            ->with('success', 'Ваша заявка отправленна');
    }

    public function orders(int $userId)
    {
        $user = User::findOrFail($userId);

        $orders = $this->order->getUserOrders($userId);

        return view('product.orders', compact('user', 'orders'));
    }

    public function orderProcessing(int $userId, Order $order, Request $request)
    {
        $order->orderProcessing($userId, $order, $request);
        return redirect()->back();
    }
}
