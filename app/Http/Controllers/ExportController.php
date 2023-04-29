<?php

namespace App\Http\Controllers;

use App\Exports\EventFollowExport;
use App\Exports\OrdersExport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportType(User $user, string $type, Request $request)
    {
        if(Auth::user()->id == $user->id) {
            if($type == 'OrderFollowers') {
                return Excel::download(new OrdersExport($request), 'usersList.'.$request->query->get('format'));
            } elseif ($type == 'EventFollowers') {
                return Excel::download(new EventFollowExport($request), 'usersList.'.$request->query->get('format'));
            }
        }

        abort(404);
    }
}

