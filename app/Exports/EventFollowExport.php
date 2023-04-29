<?php

namespace App\Exports;

use App\Models\EventFollow;
use App\Models\EventsFollow;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class EventFollowExport implements FromCollection
{
    public Request $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection(): Collection
    {
        $orderQuery = EventsFollow::query();

        $orderQuery->select('name', 'email');

        if($this->data->query->has('telephone')) {
            $orderQuery->whereNotNull('telephone')->addSelect('telephone');
        }

        if($this->data->query->has('telegram')) {
            $orderQuery->whereNotNull('telegram')->addSelect('telegram');
        }

        if($this->data->query->has('fromSort') && $this->data->query->has('toSort')) {
            if($this->data->query->get('fromSort') == null && $this->data->query->get('toSort') == null) {
                $orderQuery->whereBetween('created_at', ['1990-1-11 00:00:00', today()]);
            } else {
                $startDate = Carbon::createFromFormat('m/d/Y', $this->data->query->get('fromSort'))->format('Y-m-d 00:00:00');
                $endDate = Carbon::createFromFormat('m/d/Y', $this->data->query->get('toSort'))->format('Y-m-d 00:00:00');
                $orderQuery->whereBetween('created_at', [$startDate, $endDate]);
            }
        }

        $orderQuery->where('user_id', $this->data->query->get('user'));
        $orderQuery->where('country_id', $this->data->query->get('country'));
        $orderQuery->where('city_id', $this->data->query->get('city'));

        $orderQuery->orderBy('created_at');

        $finalQuery = $orderQuery->get();

        return collect($finalQuery);
    }
}
