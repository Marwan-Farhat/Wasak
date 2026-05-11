<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Models\ShowStatus;
use Illuminate\Support\Facades\Auth;


class PartnerController extends Controller
{
    //createPartner
    public function createPartner(Request $request)
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try {
                if ($request->image == null) {
                    return response()->json((['success' => false, 'message' => 'image field is required']));
                }
                if ($request->title == null) {
                    return response()->json((['success' => false, 'message' => 'title field is required']));
                }
                if ($request->ar_title == null) {
                    return response()->json((['success' => false, 'message' => 'ar_title field is required']));
                }
                if ($request->file('image')) {
                    $time = time();
                    $image = $request->file('image');
                    $ext = $image->getClientOriginalExtension();
                    $base_url = getenv("APP_URL");
                    $application = $base_url . 'partner/' . $time . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('partner'), $application);
                    $imageName = 'partner/' . $time . '.' . $ext;
                } else {
                    $application = null;
                    $imageName = null;
                }
                Partner::create([
                    'image' => $application,
                    'title' => $request->title,
                    'ar_title' => $request->ar_title,
                    'imageName' => $imageName,
                    'addedBy' => Auth::guard('api')->user()->role,
                    'status' => 1,
                ]);
                return response()->json(["success" => true, "message" => "partner created successfully !!"]);
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        } else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }
    //viewAllPartner
    public function viewAllPartner(Request $request)
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try {
                $lang = $request->header('language');
                if ($lang == null) {
                    return response()->json(["success" => false, "message" => "language required !!"]);
                }
                if ($lang == 'ar') {
                    $data = Partner::select('id', 'image', 'ar_title as title','status','pinStatus')->get();
                     $partnerStatus = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
                    $showStatus = $partnerStatus->partner;
                    return response()->json(["success" => true, "showStatus" =>$showStatus, "partners" => $data]);
                } else {
                    $data = Partner::select('id', 'image', 'title','status','pinStatus')->get();
                     $partnerStatus = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
                    $showStatus = $partnerStatus->partner;
                    return response()->json(["success" => true, "showStatus" =>$showStatus, "partners" => $data]);
                }
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        } else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }
    //editPartner
    public function editPartner($id)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                $data = Partner::find($id);
                return response()->json(["success" => true, "partner" => $data]);
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    //updatePartner
    public function updatePartner(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                // if ($request->id == null) {
                //     return response()->json((['success' => false, 'message' => 'id field is required']));
                // }
                
                $data = Partner::find($request->id);
                if($data == null)
                {
                    return redirect()->back()->with('error','بطاقة التعريف غير صالحة');

                }
                if ($request->title == null) {
                    return redirect()->back()->with('error',' العنوان مطلوب  ');

                }
                if ($request->ar_title == null) {
                    return redirect()->back()->with('error','  العنوان العربي مطلوب ');

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
                    $application = $base_url . 'partner/' . $time . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('partner'), $application);
                    $imageName = 'partner/' . $time . '.' . $ext;
                } else {
                    $application = $data->image;
                    $imageName = $data->imageName;
                }
                $data->update([
                    'image' => $application,
                    'title' => $request->title,
                    'ar_title' => $request->ar_title,
                    'imageName' => $imageName,
                    'addedBy' => Auth::user()->id,
                    'status' => 1,
                ]);
                return redirect()->back()->with('success','تم تحديث الشريك بنجاح');
            } catch (Exception $e) {
                return redirect()->back()->with('error','بطاقة التعريف غير صالحة');
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    //deletePartner
    public function deletePartner(Request $request)
    {

            try {
                $data = Partner::find($request->id);
                if($data == null)
                {
                    return redirect()->back()->with('success',' لم يتم العثور على السجل  ');
                }else{
                    if($data->imageName != null)
                    {
                        $base_url = getenv("APP_URL");
                        $file_url = $base_url . $data->imageName;
                        $file_path = public_path(parse_url($file_url, PHP_URL_PATH));
                        if (file_exists($file_path)) {
                            unlink($file_path);
                        }
                    }
                    $data->delete();
                }
                return redirect()->back()->with('success','تم حذف الشريك بنجاح');
            } catch (Exception $e) {
                return redirect()->back()->with('success',' لم يتم العثور على السجل  ');
            }

    }
    //updatePin
    public function updatePin(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                if ($request->id == null) {
                    return response()->json((['success' => false, 'message' => 'id field is required']));
                }
                $data = Partner::find($request->id);
                if($data == null)
                {
                    return response()->json((['success' => false, 'message' => 'invalid id']));
                }
                $data->pinStatus = $request->status;
                $data->save();
                return response()->json(["success" => true, "message" => 'pin status updated successfully !!']);
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    //updatePin
    public function updateStatus(Request $request)
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try {
                if ($request->id == null) {
                    return response()->json((['success' => false, 'message' => 'id field is required']));
                }
                $data = Partner::find($request->id);
                if($data == null)
                {
                    return response()->json((['success' => false, 'message' => 'invalid id']));
                }
                if ($request->status == null) {
                    return response()->json((['success' => false, 'message' => 'status field is required']));
                }
                $data->status = $request->status;
                $data->save();
                return response()->json(["success" => true, "message" => 'status updated successfully !!']);
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        } else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }
     //updateModuleStatus
    public function updateModuleStatus(Request $request)
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try {
                if ($request->id == null) {
                    return response()->json((['success' => false, 'message' => 'id field is required']));
                }
                if ($request->moduleName == null) {
                    return response()->json((['success' => false, 'message' => 'moduleName field is required']));
                }
                if ($request->status == null) {
                    return response()->json((['success' => false, 'message' => 'status field is required']));
                }
                $data =  ShowStatus::find($request->id);
                if($request->moduleName == 'ourTeam')
                {
                    $data->ourTeam = $request->status;
                    $data->save();
                }elseif($request->moduleName == 'partner'){
                     $data->partner = $request->status;
                    $data->save();
                }elseif($request->moduleName == 'achievement'){
                     $data->achievement = $request->status;
                    $data->save();
                }
                elseif($request->moduleName == 'counter'){
                     $data->counter = $request->status;
                    $data->save();
                }else{
                     return response()->json((['success' => false, 'message' => 'moduleName not found']));
                }

                return response()->json(["success" => true, "message" => 'module status updated successfully !!']);
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        } else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }
}
