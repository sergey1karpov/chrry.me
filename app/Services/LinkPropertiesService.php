<?php

namespace App\Services;

use App\Enums\EntityPropertiesPrefix;
use App\Http\Requests\LinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;

final class LinkPropertiesService
{
    /**
     * @field_prefix dl_
     * @param UpdateLinkRequest|LinkRequest|Request $request
     * @param PropertiesService $propertiesService
     * @return void
     */
    public function setDesignLinkProperties(UpdateLinkRequest|LinkRequest|Request $request, PropertiesService $propertiesService): void
    {
        $designProductFields = preg_grep("/^" . EntityPropertiesPrefix::Link ."/", array_keys($request->all()));
        foreach ($designProductFields as $field) {
            $propertiesService->addProperty($field, $request->$field);
        }
    }

    /**
     * @param User $user
     * @return string|null
     */
    public function getLastLinkDesignFields(User $user): ?string
    {
        $event = Link::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();

        return $event->properties;
    }
}
