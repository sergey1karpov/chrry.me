<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarketSettingsRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ShopController extends Controller
{
    /**
     * Show market setting form
     *
     * @param User $user
     * @return View
     */
    public function marketSettingsForm(User $user): View
    {
        return view('product.settings', compact('user'));
    }

    /**
     * Update market settings
     *
     * @param User $user
     * @param MarketSettingsRequest $request
     * @return RedirectResponse
     */
    public function marketSettingsPatch(User $user, MarketSettingsRequest $request): RedirectResponse
    {
        $user->marketSettings()->update([
            'delivery_rules'    => $request->delivery_rules,
            'payment_rules'     => $request->payment_rules,
            'refund_rules'      => $request->refund_rules,
            'other_rules'       => $request->other_rules,
            'cards_style'       => $request->cards_style,
            'cards_shadow'      => $request->cards_shadow,
            'color_title'       => $request->color_title,
            'color_price'       => $request->color_price,
            'title_shadow'      => $request->title_shadow,
            'price_shadow'      => $request->price_shadow,
            'title_font_size'   => $request->title_font_size,
            'price_font_size'   => $request->price_font_size,
            'card_round'        => $request->card_round,
            'show_search'       => $request->show_search,
            'search_position'   => $request->search_position,
            'canvas_color'      => $request->canvas_color,
            'canvas_font_color' => $request->canvas_font_color,
            'show_social'       => $request->show_social,
        ]);

        return redirect()->back()->with('success', 'Параметры витрины успешно изменены!');
    }
}

