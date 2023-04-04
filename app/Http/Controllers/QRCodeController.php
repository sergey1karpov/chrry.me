<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ColorConvertorService;
use App\Services\UploadPhotoService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\QRCode as QrModel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class QRCodeController extends Controller
{
    public function __construct(
        private UploadPhotoService $uploadService,
    ) {}

    /**
     * Form to generate qr-code
     * @param User $user
     * @return Application|Factory|View
     */
    public function setQrSettingsForm(User $user): View|Factory|Application
    {
        return view('user.qr', ['user' => $user]);
    }

    /**
     * Convert colors from string to int array
     * @param string $color
     * @return array
     */
    public function convertRGB(string $color): array
    {
        return explode(',', ColorConvertorService::convertBackgroundColor($color));
    }

    /**
     * Get logo if user has it
     * @param User $user
     * @return string
     */
    public function getLogoToQr(User $user): string
    {
        return str_replace('../', '', $user->qrCode->logotype);
    }

    /**
     * Generate qr-code
     * @param User $user
     * @param Request $request
     * @return RedirectResponse
     */
    public function generateQrCode(User $user, Request $request)
    {
        if(isset($user->qrCode->code)) {
            $this->uploadService->deletePhotoFromFolder($user->qrCode->code);
        }

        $qrPath = '../storage/app/public/' . Auth::user()->id . '/' . uniqid() .'.png';

        if($request->qr_type == 'colors') {
            $this->generateColorQrWithFile($user, $request, $qrPath);
        }

        if($request->qr_type == 'gradient') {
            $this->generateGradientWithFile($user, $request, $qrPath);
        }

        QrModel::updateOrCreate(
            ['user_id' => $user->id],
            ['user_id' => $user->id, 'code' => $qrPath]
        );

        return redirect()->route('setQrSettingsForm', ['user' => $user->id]);
    }

    public function generateColorQrWithFile(User $user, Request $request, string $qrPath): void
    {
        if (!File::exists('../storage/app/public/' . Auth::user()->id)) {
            File::makeDirectory('../storage/app/public/' . Auth::user()->id, 0777,true);
        }

        if(isset($user->qrCode->logotype)) {
            QrCode::format('png')
                ->merge(base_path($this->getLogoToQr($user)), $request->logo_size, true)
                ->size(1500)
                ->margin(1)
                ->errorCorrection('H')
                ->style($request->qr_style)
                ->color($this->convertRGB($request->qr_color)[0], $this->convertRGB($request->qr_color)[1], $this->convertRGB($request->qr_color)[2])
                ->backgroundColor($this->convertRGB($request->qr_bg_color)[0], $this->convertRGB($request->qr_bg_color)[1], $this->convertRGB($request->qr_bg_color)[2])
                ->eyeColor(0, $this->convertRGB($request->eye_1_color)[0], $this->convertRGB($request->eye_1_color)[1], $this->convertRGB($request->eye_1_color)[2], $request->eye_1_outterRed, $request->eye_1_outterGreen, $request->eye_1_outterBlue)
                ->eyeColor(1, $this->convertRGB($request->eye_2_color)[0], $this->convertRGB($request->eye_2_color)[1], $this->convertRGB($request->eye_2_color)[2], $request->eye_2_outterRed, $request->eye_2_outterGreen, $request->eye_2_outterBlue)
                ->eyeColor(2, $this->convertRGB($request->eye_3_color)[0], $this->convertRGB($request->eye_3_color)[1], $this->convertRGB($request->eye_3_color)[2], $request->eye_3_outterRed, $request->eye_3_outterGreen, $request->eye_3_outterBlue)
                ->generate(route('userHomePage', ['user' =>  $user->slug]), $qrPath);
        }

        if(!isset($user->qrCode->logotype)) {
            QrCode::format('png')
                ->size(1500)
                ->margin(1)
                ->errorCorrection('H')
                ->style($request->qr_style)
                ->color($this->convertRGB($request->qr_color)[0], $this->convertRGB($request->qr_color)[1], $this->convertRGB($request->qr_color)[2])
                ->backgroundColor($this->convertRGB($request->qr_bg_color)[0], $this->convertRGB($request->qr_bg_color)[1], $this->convertRGB($request->qr_bg_color)[2])
                ->eyeColor(0, $this->convertRGB($request->eye_1_color)[0], $this->convertRGB($request->eye_1_color)[1], $this->convertRGB($request->eye_1_color)[2], $request->eye_1_outterRed, $request->eye_1_outterGreen, $request->eye_1_outterBlue)
                ->eyeColor(1, $this->convertRGB($request->eye_2_color)[0], $this->convertRGB($request->eye_2_color)[1], $this->convertRGB($request->eye_2_color)[2], $request->eye_2_outterRed, $request->eye_2_outterGreen, $request->eye_2_outterBlue)
                ->eyeColor(2, $this->convertRGB($request->eye_3_color)[0], $this->convertRGB($request->eye_3_color)[1], $this->convertRGB($request->eye_3_color)[2], $request->eye_3_outterRed, $request->eye_3_outterGreen, $request->eye_3_outterBlue)
                ->generate(route('userHomePage', ['user' =>  $user->slug]), $qrPath);
        }
    }

    public function generateGradientWithFile(User $user, Request $request, string $qrPath): void
    {
        if (!File::exists('../storage/app/public/' . Auth::user()->id)) {
            File::makeDirectory('../storage/app/public/' . Auth::user()->id, 0777,true);
        }

        if(isset($user->qrCode->logotype)) {
            QrCode::format('png')
                ->merge(base_path($this->getLogoToQr($user)), $request->logo_size, true)
                ->size(1500)
                ->margin(1)
                ->errorCorrection('H')
                ->style($request->qr_style)
                ->gradient($request->startRed, $request->startGreen, $request->startBlue, $request->endRed, $request->endGreen, $request->endBlue, $request->gr_type)
                ->generate(route('userHomePage', ['user' =>  $user->slug]), $qrPath);
        }

        if(!isset($user->qrCode->logotype)) {
            QrCode::format('png')
                ->size(1500)
                ->margin(1)
                ->errorCorrection('H')
                ->style($request->qr_style)
                ->gradient($request->startRed, $request->startGreen, $request->startBlue, $request->endRed, $request->endGreen, $request->endBlue, $request->gr_type)
                ->generate(route('userHomePage', ['user' =>  $user->slug]), $qrPath);
        }
    }

    /**
     * Upload logo to qr code
     * @param User $user
     * @param Request $request
     * @return RedirectResponse
     */
    public function uploadLogotype(User $user, Request $request): RedirectResponse
    {
        QrModel::updateOrCreate(
            ['user_id' => $user->id],
            [
                'user_id' => $user->id,
                'logotype' => $this->uploadService->saveUserLogotype(
                    photo: $request->logo,
                    size: 500,
                    path: '../storage/app/public/' . Auth::user()->id . '/',
                    dropImagePath: $user->qrCode->logotype ?? null,
                )
            ]
        );

        return redirect()->back();
    }

    /**
     * Download qr-code
     * @param User $user
     * @return BinaryFileResponse
     */
    public function qrDownload(User $user): BinaryFileResponse
    {
        return response()->download($user->qrCode->code);
    }

    /**
     * Delete logotype for qr-code
     * @param User $user
     * @return RedirectResponse
     */
    public function dropQrLogotype(User $user): RedirectResponse
    {
        $this->uploadService->deletePhotoFromFolder($user->qrCode->logotype);

        QrModel::where('user_id', $user->id)->update([
            'logotype' => '',
        ]);

        return redirect()->back();
    }
}
