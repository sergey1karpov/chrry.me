<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopSettings extends Model
{
    use HasFactory;

    protected $table = 'market_settings';

    protected $fillable = [
        'user_id',
        'cards_style',
        'cards_shadow',
        'color_title',
        'color_price',
        'title_shadow',
        'price_shadow',
        'title_font_size',
        'price_font_size',
        'card_round',
    ];
}
