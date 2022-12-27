<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderProductRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private readonly Order $order) {}

    /**
     * Order product
     *
     * @param User $user
     * @param Product $product
     * @param OrderProductRequest $request
     * @return RedirectResponse
     */
    public function sendOrder(User $user, Product $product, OrderProductRequest $request): RedirectResponse
    {
        $this->order->sendOrder($user, $product, $request);

        return redirect()->route('userHomePage', ['user' => $user->slug])
            ->with('success', 'Ваша заявка создана');
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function orders(User $user): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $orders = $this->order->getUserOrders($user, Order::NEW_ORDER);

        return view('product.orders', compact('user', 'orders'));
    }

    public function ordersInWork(User $user)
    {
        $orders = $this->order->getUserOrders($user, Order::IN_WORK_ORDER);

        return view('product.orders', compact('user', 'orders'));
    }

    public function ordersProcessed(User $user)
    {
        $orders = $this->order->getUserOrders($user, Order::PROCESSED_ORDER);

        return view('product.orders', compact('user', 'orders'));
    }

    public function ordersReject(User $user, Order $order) {
        $order->delete();

        return redirect()->back();
    }

    public function ordersSearch(User $user, Request $request)
    {
        $orders = Order::search($request->search)
            ->where('user_id', $user->id)
            ->where('order_status', Order::PROCESSED_ORDER)
            ->paginate(25);

        return view('product.orders', compact('user', 'orders'));
    }

    /**
     * Перевод заказа в статус в Работе
     *
     * @param User $user
     * @param Order $order
     * @param Request $request
     * @return RedirectResponse
     */
    public function changeStatusToInWork(User $user, Order $order, Request $request): RedirectResponse
    {
        $order->order($user, $order, $request);

        return redirect()->back();
    }

    /**
     * Перевод в статус Выполненные заявки
     *
     * @param int $userId
     * @param Order $order
     * @return RedirectResponse
     */
    public function changeStatusToInProcessed(User $user, Order $order): RedirectResponse
    {
        Order::where('id', $order->id)->where('user_id', $user->id)->update([
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
