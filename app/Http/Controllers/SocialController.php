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
                if ($request->linkedIn == null) {
                    return redirect()->back()->with('error','  مطلوب لينكد إن');
                }
                if ($request->twitter == null) {
                    return redirect()->back()->with('error','  مطلوب تويتر');
                }
                if ($request->facebook == null) {
                    return redirect()->back()->with('error',' مطلوب سناب شات');
                }
                if ($request->instagram == null) {

                    return redirect()->back()->with('error',' مطلوب انستغرام');
                }

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
                    'addedBy' => Auth::user()->id,
                    // 'whatsapp' => $request->whatsapp,

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
