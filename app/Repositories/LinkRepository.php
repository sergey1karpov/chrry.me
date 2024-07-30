<?php

namespace App\Repositories;

use App\Http\Requests\LinkRequest;
use App\Models\Link;
use App\Models\User;
use App\Services\LinkPropertiesService;
use App\Services\PropertiesService;
use App\Services\UploadPhotoService;
use Illuminate\Support\Facades\Auth;

final class LinkRepository
{
    public function __construct(
        private LinkPropertiesService $linkPropertiesService,
        private UploadPhotoService $uploadPhotoService,
        private PropertiesService $propertiesService,
    ) {}

    /**
     * Create new link
     *
     * @param User $user
     * @param LinkRequest $request
     * @return void
     */
    public function addLink(User $user, LinkRequest $request): void
    {
        $this->linkPropertiesService->setDesignLinkProperties($request, $this->propertiesService);

        Link::create([
            'type'      => 'LINK',
            'user_id'   => Auth::user()->id,
            'title'     => $request->title,
            'link'      => $request->link,
            'icon'      => $request->icon,
            'photo'     => isset($request->photo) ?
                $this->uploadPhotoService->savePhoto(
                    photo: $request->photo,
                    path: $user->imgPath($user->id),
                    size: 200,
                    imageType: 'link'
                ) : null,
            'pinned' => isset($request->pinned) ? 1:0,
            'animation' => $request->animation,
            'animation_speed' => $request->animation_speed,
            'properties' => isset($request->check_last_link) ? $this->linkPropertiesService->getLastLinkDesignFields($user) : serialize($this->propertiesService->getProperties()),
        ]);
    }
}
