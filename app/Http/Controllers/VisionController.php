<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Vision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisionController extends Controller
{
    //updateVision
    public function updateVision(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                if ($request->id == null) {
                    return redirect()->back()->with('error',' مطلوب معرف');
                }
                if ($request->description == null) {
                    return redirect()->back()->with('error','الوصف مطلوب');

                }
                if ($request->ar_description == null) {
                    return redirect()->back()->with('error','الوصف العربي مطلوب');

                }
                $data = Vision::find($request->id);
                if ($data == null) {
                    return redirect()->back()->with('error',' مطلوب معرف');
                }
                $data->update([
                    'description' => $request->description,
                    'ar_description' => $request->ar_description,
                    'addedBy' => Auth::user()->id,
                    'status' => 1,
                ]);
                return redirect()->back()->with('success','تمت الرؤية بنجاح ');
            } catch (Exception $e) {
                return redirect()->back()->with('error','هناك خطأ ما');
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    //viewVision
    public function viewVision()
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try{
                $data = Vision::select('id', 'description',
                 'ar_description','status'
                 )
                ->first();
                return response()->json(["success" => true, "data" => $data]);
            }catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        }else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }
}
