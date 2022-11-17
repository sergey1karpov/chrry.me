<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection
{
    public Request $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $orderQuery = Order::query();

        $orderQuery->select('client_name');

        if($this->data->query->has('email')) {
            $orderQuery->addSelect('client_email');
        }

        if($this->data->query->has('phone')) {
            $orderQuery->addSelect('client_phone');
        }

        if($this->data->query->has('viber')) {
            $orderQuery->addSelect('client_viber');
        }

        if($this->data->query->has('whatsapp')) {
            $orderQuery->addSelect('client_whatsapp');
        }

        if($this->data->query->has('telegram')) {
            $orderQuery->addSelect('client_telegram');
        }

        $orderQuery->where('user_id', $this->data->query->get('user'));

        $orderQuery->where('order_status', Order::PROCESSED_ORDER);

        $orderQuery->orderBy('created_at');

//        return $orderQuery->get();
        $finalQuery = $orderQuery->get();
        return collect($finalQuery->unique('client_name'));
//        dd(collect($finalQuery->unique('client_name')));
    }
}
