<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ShowStatus;

class AchievementController extends Controller
{
    //updateachievements
    public function updateachievements(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                // if ($request->image == null) {
                //     return response()->json((['success' => false, 'message' => 'image field is required']));
                // }
                if ($request->id == null) {
                    return redirect()->back()->with('error',' مطلوب معرف');
                }
                if ($request->description == null) {
                    return redirect()->back()->with('error','الوصف مطلوب');

                }
                if ($request->ar_description == null) {
                    return redirect()->back()->with('error','الوصف العربي مطلوب');

                }
                $data = Achievement::find($request->id);
                if ($data == null) {
                    return redirect()->back()->with('error',' مطلوب معرف');
                }
                if ($request->file('image')) {
                    if($data->imageName != null)
                    {
                        $base_url = getenv("APP_URL");
                        $file_url = $base_url . $data->imageName;
                        $file_path = public_path(parse_url($file_url, PHP_URL_PATH));
                        if (file_exists($file_path)) {
                            unlink($file_path);
                        }
                    }
                    $time = time();
                    $image = $request->file('image');
                    $ext = $image->getClientOriginalExtension();
                    $base_url = getenv("APP_URL");
                    $application = $base_url . 'Achievements/' . $time . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('Achievements'), $application);
                    $imageName = 'Achievements/' . $time . '.' . $ext;
                } else {
                    $application = $data->image;
                    $imageName = $data->imageName;
                }
                $data->update([
                    'image' => $application,
                    'description' => $request->description,
                    'ar_description' => $request->ar_description,
                    'whatsappNumber' => $request->whatsappNumber,
                    'imageName' => $imageName,
                ]);
                return redirect()->back()->with('success','تم تحديث الإنجازات بنجاح');
            } catch (Exception $e) {
                return redirect()->back()->with('error','هناك خطأ ما');
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    //viewAchievements
    public function viewAchievements()
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try{
                $data = Achievement::select('id', 'image', 'description',
                 'ar_description'
                 )
                ->first();
                $achStatus = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
                $showStatus = $achStatus->achievement;
                return response()->json(["success" => true, "showStatus" => $showStatus, "achievements" => $data]);
            }catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        }else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }
}
