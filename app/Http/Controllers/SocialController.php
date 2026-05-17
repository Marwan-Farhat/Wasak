<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    //updateSocialAccount
    public function updateSocialAccount(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                if ($request->id == null) {
                    return redirect()->back()->with('error',' مطلوب معرف');
                }
                $data = Social::find($request->id);
                if($data == null)
                {
                    return redirect()->back()->with('error','هناك خطأ ما');
                }
                $data->update([
                    'linkedIn' => $request->linkedIn,
                    'twitter' => $request->twitter,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'whatsapp' => $request->whatsapp,
                    'tiktok' => $request->tiktok,
                    'whatsapp_url' => $request->whatsapp_url,
                    'addedBy' => Auth::user()->id,
                ]);
                return redirect()->back()->with('success',' تم تحديث حساب Social بنجاح');
            } catch (Exception $e) {
                return redirect()->back()->with('error','هناك خطأ ما');
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    //viewSocialAccount
    public function viewSocialAccount()
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try{
                $data = Social::select('id', 'linkedIn', 'twitter',
                 'facebook','instagram','whatsapp'
                 )
                ->first();
                return response()->json(["success" => true, "socialAccount" => $data]);
            }catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        }else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }
}
