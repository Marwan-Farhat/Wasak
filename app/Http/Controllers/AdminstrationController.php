<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Administration;
use Illuminate\Support\Facades\Auth;
use App\Models\ShowStatus;


class AdminstrationController extends Controller
{
    //createAdministration
    public function storeTeam(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                if ($request->image == null) {
                    return redirect()->back()->with('error','الصورة مطلوبة');
                }
                if ($request->title == null) {
                    return redirect()->back()->with('error','العنوان مطلوب');
                }
                if ($request->ar_title == null) {
                    return redirect()->back()->with('error','العنوان العربي مطلوب');
                }
                if ($request->description == null) {
                    return redirect()->back()->with('error','الوصف مطلوب');

                }
                if ($request->ar_description == null) {
                    return redirect()->back()->with('error','الوصف العربي مطلوب');

                }
                if ($request->file('image')) {
                    $time = time();
                    $image = $request->file('image');
                    $ext = $image->getClientOriginalExtension();
                    $base_url = getenv("APP_URL");
                    $application = $base_url . 'Administration/' . $time . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('Administration'), $application);
                    $imageName = 'Administration/' . $time . '.' . $ext;
                } else {
                    $application = null;
                    $imageName = null;
                }
                Administration::create([
                    'image' => $application,
                    'title' => $request->title,
                    'ar_title' => $request->ar_title,
                    'description' => $request->description,
                    'ar_description' => $request->ar_description,
                    'imageName' => $imageName,
                    'addedBy' => Auth::user()->id,
                    'status' => 1,
                    'ar_designation' => $request->ar_designation,
                    'designation' => $request->designation,
                ]);
                return redirect()->back()->with('success',' تم تخزين السجلات بنجاح ');

            } catch (Exception $e) {
                return redirect()->back()->with('error',' هناك خطأ ما ');
            }

    }
    //viewAllAdministration
    public function viewAllAdministration(Request $request)
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try {
                $lang = $request->header('language');
                if ($lang == null) {
                    return response()->json(["success" => false, "message" => "language required !!"]);
                }
                if ($lang == 'ar') {
                    $data = Administration::select('id', 'image', 'ar_title as title','ar_description as description','status','pinStatus')->get();
                   $teamStatus = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
                    $showStatus  = $teamStatus->ourTeam;
                    return response()->json(["success" => true,"showStatus"=>$showStatus, "administrations" => $data]);
                } else {
                    $data = Administration::select('id', 'image', 'title','description','status','pinStatus')->get();
                     $teamStatus = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
                    $showStatus  = $teamStatus->ourTeam;
                    return response()->json(["success" => true,"showStatus"=>$showStatus, "administrations" => $data]);
                }
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        } else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }
    //editAdministration
    public function editAdministration($id)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                $data = Administration::find($id);
                return response()->json(["success" => true, "data" => $data]);
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    //updateTeam
    public function updateTeam(Request $request)
    {
        // dd($request->all());
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                if ($request->id == null) {
                    return redirect()->back()->with('error',' مطلوب معرف');
                }
                $data = Administration::find($request->id);
                if($data == null)
                {
                    return redirect()->back()->with('error',' مطلوب معرف');
                }
                // if ($request->image == null) {
                //     return redirect()->back()->with('error','الصورة مطلوبة');
                // }
                if ($request->title == null) {
                    return redirect()->back()->with('error','العنوان مطلوب');
                }
                if ($request->ar_title == null) {
                    return redirect()->back()->with('error','العنوان العربي مطلوب');
                }
                if ($request->description == null) {
                    return redirect()->back()->with('error','الوصف مطلوب');

                }
                if ($request->ar_description == null) {
                    return redirect()->back()->with('error','الوصف العربي مطلوب');

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
                    $application = $base_url . 'Administration/' . $time . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('Administration'), $application);
                    $imageName = 'Administration/' . $time . '.' . $ext;
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
                    'description' => $request->description,
                    'ar_description' => $request->ar_description,
                    'ar_designation' => $request->ar_designation,
                    'designation' => $request->designation,
                    'status' => 1,
                ]);
                return redirect()->back()->with('success',' تم تحديث الفريق بنجاح ');
            } catch (Exception $e) {
                return redirect()->back()->with('error',' هناك خطأ ما ');
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    //deleteTeam
    public function deleteTeam(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                $data = Administration::find($request->id);
                if($data == null)
                {
                    return redirect()->back()->with('error','لم يتم العثور على السجل');
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
                return redirect()->back()->with('success','تم حذف الإدارة بنجاح');
                return response()->json(["success" => true, "message" => 'administration deleted successfully !!']);
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    //updatePin
    public function updatePin(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                if ($request->id == null) {
                    return response()->json((['success' => false, 'message' => 'id field is required']));
                }
                $data = Administration::find($request->id);
                if($data == null)
                {
                    return response()->json((['success' => false, 'message' => 'invalid id']));
                }
                $count = Administration::where('pinStatus','=',0)->count();
                if($count > 6)
                {
                    return response()->json((['success' => false, 'message' => 'Pin limit completed']));
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
                $data = Administration::find($request->id);
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
}
