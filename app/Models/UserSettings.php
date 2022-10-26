<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model
{
    use HasFactory;

    protected $table = 'user_settings';

    protected $fillable = [
        'user_id',
        'logotype',
        'logotype_size',
        'logotype_shadow_right',
        'logotype_shadow_bottom',
        'logotype_shadow_round',
        'logotype_shadow_color',
        'avatar_vs_logotype',

        'round_links_width',
        'round_links_shadow_right',
        'round_links_shadow_bottom',
        'round_links_shadow_round',
        'round_links_shadow_color',
    ];
}
