<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use App\Models\ServiceContent;

class ServiceTypeController extends Controller
{
    //servicestype
    public function servicestype()
    {
        $records = ServiceType::all();
        $data = ServiceContent::first();
        return view('admin.serviceType', ['records' => $records, 'data' => $data]);
    }
    //storeServiceType
    public function storeServiceType(Request $request)
    {
        try {
            if ($request->image == null) {
                return redirect()->back()->with('error', '   الصورة مطلوبة');
            }
            if ($request->title == null) {
                return redirect()->back()->with('error', 'العنوان مطلوب');
            }
            if ($request->ar_title == null) {
                return redirect()->back()->with('error', 'العنوان العربي مطلوب');
            }
            // if ($request->type == null) {
            //     return redirect()->back()->with('error', 'النوع مطلوب');
            // }

            if ($request->file('image')) {
                $time = time();
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $base_url = getenv("APP_URL");
                $application = $base_url . 'ServicesTypeImages/' . $time . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('ServicesTypeImages'), $application);
                $imageName = 'ServicesTypeImages/' . $time . '.' . $ext;
            } else {
                $application = null;
                $imageName = null;
            }
            $data = new ServiceType();
            $data->title = $request->title;
            $data->ar_title = $request->ar_title;
            $data->image = $application;
            $data->imageName = $imageName;
            $data->status = 1;
            $data->type = $request->type;
            $data->save();
            return redirect()->back()->with('success', 'تخزين نوع الخدمة بنجاح');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'هناك خطأ ما');
        }
    }
    //editServiceType
    public function editServiceType($id)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                $data = ServiceType::find($id);
                return response()->json(["success" => true, "data" => $data]);
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    //updateServiceType
    public function updateServiceType(Request $request)
    {
        try {

            if ($request->title == null) {
                return redirect()->back()->with('error', 'العنوان مطلوب');
            }
            if ($request->ar_title == null) {
                return redirect()->back()->with('error', 'العنوان العربي مطلوب');
            }
            // if ($request->type == null) {
            //     return redirect()->back()->with('error', 'النوع مطلوب');
            // }
            $data = ServiceType::find($request->id);
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
                $application = $base_url . 'ServicesTypeImages/' . $time . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('ServicesTypeImages'), $application);
                $imageName = 'ServicesTypeImages/' . $time . '.' . $ext;
            } else {
                $application = $data->image;
                $imageName = $data->imageName;
            }
            $data->title = $request->title;
            $data->ar_title = $request->ar_title;
            $data->image = $application;
            $data->imageName = $imageName;
            $data->type = $request->type;
            $data->save();
            return redirect()->back()->with('success', 'تم تحديث نوع الخدمة بنجاح');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'هناك خطأ ما');
        }
    }
    //updatePinSevicesType
    public function updatePinSevicesType(Request $request)
    {
        try {
            if ($request->id == null) {
                return response()->json((['success' => false, 'message' => 'id field is required']));
            }
            $data = ServiceType::find($request->id);
            if ($data == null) {
                return response()->json((['success' => false, 'message' => 'invalid id']));
            }

            if ($request->status == null) {
                return response()->json((['success' => false, 'message' => 'pinStatus field is required']));
            }
            $data->status = $request->status;
            $data->save();
            return response()->json(["success" => true, "message" => 'pin status updated successfully !!']);
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "internal Server error"], 500);
        }
    }
    //deleteServiceType
    public function deleteServiceType(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                $data = ServiceType::find($request->id);
                if ($data == null) {
                    return redirect()->back()->with('error','هناك خطأ ما');
                } else {
                    if ($data->imageName != null) {
                        $base_url = getenv("APP_URL");
                        $file_url = $base_url . $data->imageName;
                        $file_path = public_path(parse_url($file_url, PHP_URL_PATH));
                        if (file_exists($file_path)) {
                            unlink($file_path);
                        }
                    }
                    $data->delete();
                }
                return redirect()->back()->with('success','تم حذف الخدمة بنجاح');
            } catch (Exception $e) {
                return redirect()->back()->with('error','هناك خطأ ما');
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
}
