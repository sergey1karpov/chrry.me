<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderProductRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Traits\Date;
use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $orders = $this->order->getUserOrders($userId, Order::NEW_ORDER);

        return view('product.orders', compact('user', 'orders'));
    }

    public function ordersInWork(int $userId)
    {
        $user = User::findOrFail($userId);

        $orders = $this->order->getUserOrders($userId, Order::IN_WORK_ORDER);

        return view('product.orders', compact('user', 'orders'));
    }

    public function ordersProcessed(int $userId)
    {
        $user = User::findOrFail($userId);

        $orders = $this->order->getUserOrders($userId, Order::PROCESSED_ORDER);

        return view('product.orders', compact('user', 'orders'));
    }

    public function ordersSearch(int $userId, Request $request)
    {
        $user = User::where('id', $userId)->firstOrFail();

        $orders = Order::search($request->search)
            ->where('user_id', $user->id)
            ->where('order_status', Order::PROCESSED_ORDER)
            ->paginate(25);

        return view('product.orders', compact('user', 'orders'));
    }

    /**
     * Перевод заказа в статус в Работе
     *
     * @param int $userId
     * @param Order $order
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function order(int $userId, Order $order, Request $request)
    {
        $order->order($userId, $order, $request);
        return redirect()->back();
    }

    /**
     * Перевод в статус Выполненные заявки
     *
     * @param int $userId
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function orderProcessed(int $userId, Order $order)
    {
        Order::where('id', $order->id)->where('user_id', $userId)->update([
            'processed' => 1,
            'order_status' => Order::PROCESSED_ORDER,
            'processed_at' => \date('Y-m-d H:i:s'),
        ]);

        $product = Product::where('id', $order->product_id)->first();
        $product->count++;
        $product->save();

        return redirect()->back();
    }
}
