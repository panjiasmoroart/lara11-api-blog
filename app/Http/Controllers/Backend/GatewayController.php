<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GatewayOne;
 use Intervention\Image\ImageManager;
 use Intervention\Image\Drivers\Gd\Driver;


class GatewayController extends Controller
{
    public function GetWayOne()
    {
        $getone = GatewayOne::find(1);
        return view('backend.gateway.gateway_one', compact('getone'));
    }
}
