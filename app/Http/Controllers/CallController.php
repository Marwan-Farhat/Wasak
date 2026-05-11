<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\CallUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CallController extends Controller
{
    //updateCallUs
    public function updateCallUs(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            // try {
                if ($request->phone == null) {
                    return redirect()->back()->with('error',' الهاتف مطلوب ');
                }
                if ($request->email == null) {
                    return redirect()->back()->with('error',' مطلوب اميل ');
                }
                // if ($request->workDays == null) {
                //     return redirect()->back()->with('error','  أيام العمل مطلوبة');
                // }
                // if ($request->workHours == null) {

                //     return redirect()->back()->with('error',' ساعات العمل مطلوبة ');
                // }
                if ($request->id == null) {
                    return redirect()->back()->with('error',' مطلوب معرف');
                }
                $data = CallUs::find($request->id);
                if($data == null)
                {
                    return redirect()->back()->with('error','هناك خطأ ما');
                }
                $data->update([
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'workDays' => $request->workDays,
                    'workHours' => $request->workHours,
                    'en_workDays' => $request->en_workDays,
                    'en_workHours' => $request->en_workHours,
                    'addedBy' => Auth::user()->id,
                    'long' => $request->long,
                    'lat' => $request->lat
                ]);
                return redirect()->back()->with('success','  اتصل بنا تم تحديثه بنجاح');
            // } catch (Exception $e) {
            //     return redirect()->back()->with('error','هناك خطأ ما');
            // }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }

    //viewCallUs
    public function viewCallUs()
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try{
                $data = CallUs::select('id', 'email', 'phone',
                 'workDays','workHours'
                 )
                ->first();
                return response()->json(["success" => true, "CallUs" => $data]);
            }catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        }else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }
}
