<?php

namespace App\Models;

use App\Http\Requests\OrderProductRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

class Order extends Model
{
    use HasFactory, Searchable;

    protected $table = 'orders';

    public $timestamps = false;

    protected $fillable = [
        'client_name', 'client_email', 'client_phone', 'client_text', 'user_id', 'product_id', 'processed',
        'client_telegram', 'client_viber', 'client_whatsapp', 'order_status', 'processed_at', 'created_at',
    ];

    const NEW_ORDER = 'new';
    const IN_WORK_ORDER = 'in_work';
    const PROCESSED_ORDER = 'processed';

    public function searchableAs()
    {
        return 'orders_index';
    }

    public function toSearchableArray()
    {
        return [
            'id'    => $this->id,
            'client_name' => $this->client_name,
        ];
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
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
            'client_telegram' => $request->client_telegram,
            'client_viber' => $request->client_viber,
            'client_whatsapp' => $request->client_whatsapp,
            'order_status' => Order::NEW_ORDER,
            'created_at' => \date('Y-m-d H:i:s'),
        ]);
    }

    public function getUserOrders(int $userId, string $status)
    {
        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', 'users.id')
            ->join('products', 'orders.product_id', 'products.id')
            ->select(
                'orders.*', 'products.title', 'products.main_photo', 'products.price'
            )
            ->where('users.id', $userId)
            ->where('orders.order_status', $status)
            ->orderBy('orders.id', 'DESC')
            ->get();

        return $orders;
    }

    public function order(int $userId, Order $order, Request $request)
    {
        if($request->processed) {
            Order::where('id', $order->id)->where('user_id', $userId)->update([
                'processed' => 1,
                'order_status' => Order::IN_WORK_ORDER,
                'updated_at' => \date('Y-m-d H:i:s'),
            ]);
        }
    }
}
