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
        'banner',
        'avatar',
        'favicon',
        'logotype',

        'logotype_size',
        'logotype_shadow_right',
        'logotype_shadow_bottom',
        'logotype_shadow_round',
        'logotype_shadow_color',

        'background_color',
        'name_color',
        'description_color',
        'verify_color',
        'navigation_color',

        'social_links_bar',
        'show_logo',
        'links_bar_position',

        'round_links_width',
        'round_links_shadow_right',
        'round_links_shadow_bottom',
        'round_links_shadow_round',
        'round_links_shadow_color',

        'name_font',
        'name_font_size',
        'name_font_shadow_right',
        'name_font_shadow_bottom',
        'name_font_shadow_blur',
        'name_font_shadow_color',

        'description_font',
        'description_font_size',
        'description_font_shadow_right',
        'description_font_shadow_bottom',
        'description_font_shadow_blur',
        'description_font_shadow_color',

        'verify_icon_type',

        'avatar_vs_logotype'
    ];

    protected $attributes = [
        'banner' => null,
        'avatar' => null,
        'favicon' => null,
        'logotype' => null,

        'logotype_size' => null,
        'logotype_shadow_right' => null,
        'logotype_shadow_bottom' => null,
        'logotype_shadow_round' => null,
        'logotype_shadow_color' => null,

        'background_color' => null,
        'name_color' => null,
        'description_color' => null,
        'verify_color' => null,
        'navigation_color' => null,

        'social_links_bar' => null,
        'show_logo' => null,
        'links_bar_position' => null,

        'round_links_width' => null,
        'round_links_shadow_right' => null,
        'round_links_shadow_bottom' => null,
        'round_links_shadow_round' => null,
        'round_links_shadow_color' => null,

        'name_font' => 1.2,
        'name_font_size' => null,
        'name_font_shadow_right' => null,
        'name_font_shadow_bottom' => null,
        'name_font_shadow_blur' => null,
        'name_font_shadow_color' => null,

        'description_font' => 0.9,
        'description_font_size' => null,
        'description_font_shadow_right' => null,
        'description_font_shadow_bottom' => null,
        'description_font_shadow_blur' => null,
        'description_font_shadow_color' => null,

        'verify_icon_type' => null,

        'avatar_vs_logotype' => null
    ];
}