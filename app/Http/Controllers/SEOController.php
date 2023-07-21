<?php

namespace App\Http\Controllers;

use App\Http\Requests\SEORequest;
use App\Models\SEO;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SEOController extends Controller
{
    /**
     * @param User $user
     * @return Factory|View|Application
     */
    public function seo(User $user): Factory|View|Application
    {
        return view('seo.seo', [
            'user' => $user,
            'seo'  => $user->seo,
        ]);
    }

    /**
     * @param User $user
     * @param SEORequest $request
     * @return RedirectResponse
     */
    public function setSeo(User $user, SEORequest $request): RedirectResponse
    {
        SEO::updateOrCreate(
            ['user_id' => $user->id],
            [
                'user_id'     => $user->id,
                'title'       => $request->title,
                'description' => $request->description,
                'keywords'    => $this->seoKeywords($request->keywords),
            ]
        );

        return redirect()->back()->with('success', 'SEO settings are set!');
    }

    /**
     * @param string|null $keywords
     * @return string
     */
    public function seoKeywords(string $keywords = null): string
    {
        $words = explode(',', $keywords);
        return serialize(array_slice($words, 0, 10, true));
    }
}
