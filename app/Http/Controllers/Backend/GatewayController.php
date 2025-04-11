<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GatewayOne;
use App\Models\GatewayTwo;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class GatewayController extends Controller
{
    public function GetWayOne()
    {
        $getone = GatewayOne::find(1);
        return view('backend.gateway.gateway_one', compact('getone'));
    }

    public function UpdateGetWayOne(Request $request)
    {
        $getone_id = $request->id;
        $getone = GatewayOne::find($getone_id);
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(960,679)->save(public_path('upload/gateway/'.$name_gen));
            $save_url = 'upload/gateway/'.$name_gen;

            if (file_exists(public_path($getone->image))) {
                @unlink(public_path($getone->image));
            }

            $getone->update([
                'title' => $request->title,
                'description' => $request->description,
                'phone' => $request->phone,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            $getone->update([
                'title' => $request->title,
                'description' => $request->description,
                'phone' => $request->phone,
            ]);

            $notification = array(
                'message' => 'Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }

    public function GetWayTwo()
    {
        $gettwo = GatewayTwo::find(1);
        return view('backend.gateway.gateway_two', compact('gettwo'));
    }

    public function UpdateGetWayTwo(Request $request)
    {
        $gettwo_id = $request->id;
        $gettwo = GateWayTwo::find($gettwo_id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1414,1236)->save(public_path('upload/gateway/'.$name_gen));
            $save_url = 'upload/gateway/'.$name_gen;

            if (file_exists(public_path($gettwo->image))) {
                @unlink(public_path($gettwo->image));
            }

            $gettwo->update([
                'title' => $request->title,
                'description' => $request->description,
                'project' => $request->project,
                'review' => $request->review,
                'exerience' => $request->exerience,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
      }
      else{
            $gettwo->update([
                'title' => $request->title,
                'description' => $request->description,
                'project' => $request->project,
                'review' => $request->review,
                'exerience' => $request->exerience,
            ]);

            $notification = array(
                'message' => 'Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
      }

    }
}
