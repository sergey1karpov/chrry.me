<?php

namespace App\Repositories;

use App\Http\Requests\VerifyRequest;
use App\Models\User;
use App\Models\Verification;
use App\Services\UploadPhotoService;

class VerificationRepository
{
    public function __construct(private UploadPhotoService $uploadService) {}

    /**
     * @param User $user
     * @return bool
     */
    public function getVerifyRequestIfExists(User $user): bool
    {
        $verifyRequest = Verification::where('user_id', $user->id)->first();

        if ($verifyRequest) {
            return true;
        }

        return false;
    }

    /**
     * @param User $user
     * @param VerifyRequest $request
     * @param string $uploadPath
     * @return void
     */
    public function createVerifyRequest(User $user, VerifyRequest $request, string $uploadPath): void
    {
        Verification::create([
            'user_id'         => $user->id,
            'profile_address' => 'chrry.me/' . $user->slug,
            'description'     => $request->description,
            'contacts'        => $request->contacts,
            'photo'           => $this->uploadService->savePhoto(
                photo: $request->photo,
                path: $uploadPath,
                size: 1000
            )
        ]);
    }
}
