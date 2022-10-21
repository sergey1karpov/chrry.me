<?php

namespace App\Models;

use App\Http\Requests\OrderProductRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'client_name', 'client_email', 'client_phone', 'client_text', 'user_id', 'product_id', 'processed',
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }

    public function sendOrder(int $userId, Product $product, OrderProductRequest $request)
    {
        if(Auth::check()) {
            if($userId == Auth::user()->id) {
                abort(403);
            }
        }

        Order::create([
            'user_id' => $userId,
            'product_id' => $product->id,
            'client_name' => $request->client_name,
            'client_email' => $request->client_email,
            'client_phone' => $request->client_phone,
            'client_text' => $request->client_text,
        ]);
    }

    public function getUserOrders(int $userId)
    {
        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', 'users.id')
            ->join('products', 'orders.product_id', 'products.id')
            ->select(
                'orders.*', 'products.title', 'products.main_photo', 'products.price'
            )
            ->where('users.id', $userId)
            ->orderBy('orders.id', 'DESC')
            ->get();

        return $orders;
    }

    public function orderProcessing(int $userId, Order $order, Request $request)
    {
        if($request->processed) {
            Order::where('id', $order->id)->where('user_id', $userId)->update([
                'processed' => 1,
            ]);
        }
    }
}
