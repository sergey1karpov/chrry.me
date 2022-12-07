<?php

namespace App\Models;

use App\Interfaces\Statistic;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStats extends Model implements Statistic
{
    use HasFactory;

    protected $table = 'stats_product';

    protected $fillable = [
        'user_id',
        'product_id',
        'guest_ip',
        'city',
        'country',
        'country_code',
    ];
}
