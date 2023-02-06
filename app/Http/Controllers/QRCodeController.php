<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ColorConvertorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\QRCode as QrModel;

class QRCodeController extends Controller
{
    public function setQrSettingsForm(User $user)
    {
        return view('user.qr', compact('user'));
    }

    public function generateQrCode(User $user, Request $request)
    {
        $bgColor = explode(',', ColorConvertorService::convertBackgroundColor($request->qr_bg_color));
        $color = explode(',', ColorConvertorService::convertBackgroundColor($request->qr_color));

        $eye_1_color = explode(',', ColorConvertorService::convertBackgroundColor($request->eye_1_color));
        $eye_2_color = explode(',', ColorConvertorService::convertBackgroundColor($request->eye_2_color));
        $eye_3_color = explode(',', ColorConvertorService::convertBackgroundColor($request->eye_3_color));

        $logo = str_replace('../', '', $user->logotype);

        if($request->qr_type == 'colors') {
            $code = QrCode::size(320)
                ->margin(1)
                ->errorCorrection('H')
                ->style($request->qr_style) //Если round, то показать на сколько 0.1-0.9
                ->color($color[0], $color[1], $color[2])
                ->backgroundColor($bgColor[0], $bgColor[1], $bgColor[2])
                ->eyeColor(0, $eye_1_color[0], $eye_1_color[1], $eye_1_color[2], $request->eye_1_outterRed, $request->eye_1_outterGreen, $request->eye_1_outterBlue)
                ->eyeColor(1, $eye_2_color[0], $eye_2_color[1], $eye_2_color[2], $request->eye_2_outterRed, $request->eye_2_outterGreen, $request->eye_2_outterBlue)
                ->eyeColor(2, $eye_3_color[0], $eye_3_color[1], $eye_3_color[2], $request->eye_3_outterRed, $request->eye_3_outterGreen, $request->eye_3_outterBlue)
                ->generate(route('userHomePage', ['user' =>  $user->slug]));

//            $code = QrCode::format('png')->size(1500)
//                ->merge(base_path($logo), .3, true)->errorCorrection('H')
//                ->generate('https://www.example.com', base_path($logo));

            QrModel::updateOrCreate(
                ['user_id' => $user->id],
                ['user_id' => $user->id, 'code' => $code]
            );
        }

        if($request->qr_type == 'gradient') {
            $code = QrCode::size(320)
                ->margin(1)
                ->errorCorrection('H')
                ->style($request->qr_style) //Если round, то показать на сколько 0.1-0.9
                ->gradient($request->startRed, $request->startGreen, $request->startBlue, $request->endRed, $request->endGreen, $request->endBlue, $request->gr_type)

                ->generate(route('userHomePage', ['user' =>  $user->slug]));

            QrModel::updateOrCreate(
                ['user_id' => $user->id],
                ['user_id' => $user->id, 'code' => $code]
            );
        }

        return redirect()->back();
    }

    public function qrDownload(User $user)
    {
        return response()->download($user->qrCode->code);
    }
}

//            $code = QrCode::format('png')->size(1500)
//                ->merge(base_path($logo), .5, true)->errorCorrection('H')
//                ->generate('https://www.example.com', base_path($logo));
