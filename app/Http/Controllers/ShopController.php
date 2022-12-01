<?php

namespace App\Http\Controllers;

use App\Models\ShopSettings;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * [Description ShopController]
 */
class ShopController extends Controller
{
    public function marketSettingsForm(int $userId): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::where('id', $userId)->firstOrFail();
        return view('product.settings', compact('user'));
    }

    public function marketSettingsPatch(int $userId, Request $request): \Illuminate\Http\RedirectResponse
    {
        $settings = ShopSettings::where('user_id', $userId)->first();

        ShopSettings::where('id', $settings->id)->update([
            'cards_style' => $request->cards_style,
            'cards_shadow' => $request->cards_shadow,
            'color_title' => $request->color_title,
            'color_price' => $request->color_price,
            'title_shadow' => $request->title_shadow,
            'price_shadow' => $request->price_shadow,
            'title_font_size' => $request->title_font_size,
            'price_font_size' => $request->price_font_size,
            'card_round' => $request->card_round,
            'show_search' => $request->show_search,
            'search_position' => $request->search_position,
            'canvas_color' => $request->canvas_color,
            'canvas_font_color' => $request->canvas_font_color,
            'show_social' => $request->show_social,
        ]);

        return redirect()->back()->with('success', 'Параметры витрины успешно изменены!');
    }
}
