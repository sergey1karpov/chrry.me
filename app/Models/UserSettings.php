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

        'avatar_vs_logotype',
        'event_followers',

        'name_bold',
        'description_bold',

        'follow_block_border_radius',
        'follow_block_bg_color',
        'follow_block_text',
        'follow_block_text_size',
        'follow_block_font',
        'follow_block_font_color',
        'follow_block_font_shadow_color',
        'follow_block_font_shadow_right',
        'follow_block_font_shadow_bottom',
        'follow_block_font_shadow_blur',
        'follow_btn_top_shadow_color',
        'follow_btn_top_shadow_top',
        'follow_btn_top_shadow_right',
        'follow_btn_top_shadow_blur',

        'congratulation_gif',
        'congratulation_text',
        'congratulation_on_off',
        'verify_icon',

        'follow_border',
        'follow_border_color',
        'follow_border_animation',
        'follow_border_animation_speed',
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

        'avatar_vs_logotype' => null,
        'event_followers' => false,

        'name_bold' => false,
        'description_bold' => false,

        'follow_block_border_radius' => false,
        'follow_block_bg_color' => false,
        'follow_block_text' => false,
        'follow_block_text_size' => false,
        'follow_block_font' => false,
        'follow_block_font_color' => false,
        'follow_block_font_shadow_color' => false,
        'follow_block_font_shadow_right' => false,
        'follow_block_font_shadow_bottom' => false,
        'follow_block_font_shadow_blur' => false,
        'follow_btn_top_shadow_color' => false,
        'follow_btn_top_shadow_top' => false,
        'follow_btn_top_shadow_right' => false,
        'follow_btn_top_shadow_blur' => false,

        'congratulation_gif' => false,
        'congratulation_text' => false,
        'congratulation_on_off' => false,
        'verify_icon' => null,

        'follow_border' => null,
        'follow_border_color' => null,
        'follow_border_animation' => null,
        'follow_border_animation_speed' => null,
    ];
}
