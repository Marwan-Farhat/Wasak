<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Banner;
use App\Models\ServiceContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    //updateBanner
    public function updateBanner(Request $request)
    {

            try {

                $data = Banner::find($request->id);
                if ($data == null) {
                    return redirect()->back()->with('error','هناك خطأ ما');
                }
                if ($request->file('image')) {
                    if ($data->imageName != null) {
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
                    $application = $base_url . 'banners/' . $time . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('banners'), $application);
                    $imageName = 'banners/' . $time . '.' . $ext;
                } else {
                    $application = $data->image;
                    $imageName = $data->imageName;
                }
               $data->update([
                    'addedBy' => Auth::user()->id,
                    'image' => $application,
                    'title' => $request->title,
                    'subTitle' => $request->subTitle,
                    'ar_title' => $request->ar_title,
                    'ar_subTitle' => $request->ar_subTitle,
                    'imageName' => $imageName,
                    'help' => $request->help,
                    'ar_help' => $request->ar_help,
                ]);
                return redirect()->back()->with('success','تم تحديث البانر بنجاح');
            } catch (Exception $e) {
                return redirect()->back()->with('error','هناك خطأ ما');
            }

    }
    //viewBanner
    public function viewBanner()
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try {
                $data = Banner::select('id', 'image', 'title',
                    'subTitle', 'ar_title', 'ar_subTitle','ar_help','help',
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        } else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }
    //updateServiceContent
    public function updateServiceContent(Request $request)
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
                $data = ServiceContent::find($request->id);
                if ($data == null) {
                    return redirect()->back()->with('error',' مطلوب معرف');
                }
                if ($request->file('image')) {
                    if ($data->imageName != null) {
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
                    $application = $base_url . 'banners/' . $time . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('banners'), $application);
                    $imageName = 'banners/' . $time . '.' . $ext;
                } else {
                    $application = $data->image;
                    $imageName = $data->imageName;
                }
               $data->update([
                    'addedBy' => Auth::user()->id,
                    'image' => $application,
                    'description' => $request->description,
                    'ar_description' => $request->ar_description,
                    'ar_subTitle' => $request->ar_subTitle,
                    'imageName' => $imageName,
                    'status' => 1,
                ]);
                return redirect()->back()->with('success','تم تحديث محتوى الخدمة بنجاح');
            } catch (Exception $e) {
                return redirect()->back()->with('error','هناك خطأ ما');
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    //viewServiceContent
    public function viewServiceContent()
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try {
                $data = ServiceContent::first();
                return response()->json(["success" => true, "data" => $data]);
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        } else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }

}
