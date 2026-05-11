<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Training;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class ServiceController extends Controller
{
    //createService
    public function createService(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            // try {
                // if ($request->image == null) {
                //     return redirect()->back()->with('error','   الصورة مطلوبة');
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
                    $time = time();
                    $image = $request->file('image');
                    $ext = $image->getClientOriginalExtension();
                    $base_url = getenv("APP_URL");
                    $application = $base_url . 'ServicesImages/' . $time . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('ServicesImages'), $application);
                    $imageName = 'ServicesImages/' . $time . '.' . $ext;
                } else {
                    $application = null;
                    $imageName = null;
                }
                Service::create([
                    'image' => $application,
                    'title' => $request->title,
                    'ar_title' => $request->ar_title,
                    'description' => $request->description,
                    'ar_description' => $request->ar_description,
                    'imageName' => $imageName,
                    'addedBy' => Auth::user()->id,
                    'status' => 1,
                    "typeID" => $request->typeID
                ]);
                return redirect()->back()->with('success','متجر الخدمة بنجاح');
            // } catch (Exception $e) {
            //     return redirect()->back()->with('error','هناك خطأ ما');
            // }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    //viewAllServices
    public function viewAllServices(Request $request)
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try {
                $lang = $request->header('language');
                if ($lang == null) {
                    return response()->json(["success" => false, "message" => "language required !!"]);
                }
                if ($lang == 'ar') {
                    $data = Service::select('id', 'image', 'ar_title as title', 'ar_description as description','status','pinStatus')->get();
                    return response()->json(["success" => true, "services" => $data]);
                } else {
                    $data = Service::select('id', 'image', 'title', 'description','status','pinStatus')->get();
                    return response()->json(["success" => true, "services" => $data]);
                }
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        } else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }
    //editService
    public function editService($id)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                $data = Service::find($id);
                return response()->json(["success" => true, "data" => $data]);
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    //updateService
    public function updateService(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {

            try {
                if ($request->id == null) {
                    return redirect()->back()->with('error',' مطلوب معرف');
                }
                $data = Service::find($request->id);
                if ($data == null) {
                    return redirect()->back()->with('error',' مطلوب معرف');
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
                    $application = $base_url . 'ServicesImages/' . $time . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('ServicesImages'), $application);
                    $imageName = 'ServicesImages/' . $time . '.' . $ext;
                } else {
                    $application = $data->image;
                    $imageName = $data->imageName;
                }
                $data->update([
                    'image' => $application,
                    'title' => $request->title,
                    'ar_title' => $request->ar_title,
                    'imageName' => $imageName,
                    'description' => $request->description,
                    'ar_description' => $request->ar_description,

                ]);
                return redirect()->back()->with('success',' تم تحديث الخدمة بنجاح');
            } catch (Exception $e) {
                return redirect()->back()->with('error','هناك خطأ ما');
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    //deleteService
    public function deleteService(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                $data = Service::find($request->id);
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
    //storeServiceReq
    public function storeServiceReq(Request $request)
    {
            // dd($request->all());
            if (App::isLocale('ar'))
            {
                $customMessages = [
                    // 'name.required' => 'حقل الاسم مطلوب.',
                    'email.required' => 'حقل البريد الإلكتروني مطلوب.',
                    'number.required' => 'حقل الجوال مطلوب.',
                    'serviceType.required' => '  نوع الخدمة مطلوب   .',

                ];
            }else{
                $customMessages = [
                    // 'name.required' => 'Name is required.',
                    'email.required' => 'Email is required.',
                    'number.required' => 'number is required.',
                    'serviceType.required' => 'serviceType is required.',
                ];
            }
            $this->validate($request, [
                // 'name' => 'required|string|max:255',
                'email' => 'required|email',
                'number' => 'required',
                'serviceType' => 'required',
            ], $customMessages);

            // $check = Service::find($request->serviceType);
            // if ($check == null) {
            //     return redirect()->back()->with('error','معرف خدمة غير صالح');

            // }
            ServiceRequest::create([
                'ar_name' => $request->name,
                'name' => $request->name,
                'phone' => $request->number,
                'email' => $request->email,
                'nb' => $request->nb,
                'ar_nb' => $request->nb,
                'status' => 1,
                'serviceID' => $request->serviceType,
            ]);
            return redirect()->back()->with('success',' تم إرسال طلب الخدمة بنجاح  ');


    }

    //viewAllServiceRequests
    public function viewAllServiceRequests(Request $request)
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try {

                $data = ServiceRequest::join('services', 'services.id', '=', 'service_requests.serviceID')
                    ->select(
                        'services.id as serviceID',
                        'services.ar_title as title',
                        'service_requests.id as requestID',
                        'service_requests.ar_name',
                        'service_requests.name',
                        'service_requests.ar_nb',
                        'service_requests.nb',
                        'service_requests.phone',
                        'service_requests.email',
                    )
                    ->get();
                return response()->json(["success" => true, "serviceRequests" => $data]);
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        } else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }
    //viewServiceRequest
    public function viewServiceRequest($id)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                $data = ServiceRequest::with('services')->find($id);

                return response()->json(["success" => true, "data" => $data]);

            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }

    //sendEmploymentTrainingApp
    public function storeTraining(Request $request)
    {
    //    dd($request->all());
       if (App::isLocale('ar'))
        {
            $customMessages = [
                'name.required' => 'حقل الاسم مطلوب.',
                'email.required' => 'حقل البريد الإلكتروني مطلوب.',
                'number.required' => 'حقل الجوال مطلوب.',
                'qualification.required' => 'مطلوب المؤهل ',
                'specialization.required' => ' التخصص مطلوب.'
            ];
        }else{
            $customMessages = [
                'name.required' => 'Name is required.',
                'email.required' => 'Email is required.',
                'number.required' => 'number is required.',
                'qualification.required' => 'qualification is required.',
                'specialization.required' => 'specialization password is required.',


            ];
        }
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'number' => 'required',
            'qualification' => 'required',
            'specialization' => 'required'
        ], $customMessages);

            if ($request->file('image')) {
                $time = time();
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $base_url = getenv("APP_URL");
                $application = $base_url . 'BlogImages/' . $time . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('BlogImages'), $application);
                $imageName = 'BlogImages/' . $time . '.' . $ext;
            } else {
                $application = null;
                $imageName = null;
            }
            Training::create([
                'ar_name' => $request->name,
                'name' => $request->name,
                'image' => $application,
                'imageName' => $imageName,
                'phone' => $request->number,
                'email' => $request->email,
                'qualification' => $request->qualification,
                'specialization' => $request->specialization,
                'status' => 1,
                'orderType' => $request->nb,
                'ar_orderType' => $request->nb,
            ]);
            if (App::isLocale('ar'))
            {
                return redirect()->back()->with('success','تم إرسال السجل بنجاح');
            }else{
                return redirect()->back()->with('success','Record Submited Successfully');
            }
    }
    //viewAllEmploymentAndTrainingApplications
    public function viewAllEmploymentAndTrainingApplications(Request $request)
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try {
                $data = Training::select(
                    'id',
                    'image',
                    'name',
                    'ar_name',
                    'qualification',
                    'specialization',
                    'phone',
                    'email',
                    'ar_orderType as orderType',
                )
                    ->get();
                return response()->json(["success" => true, "EmpRequests" => $data]);
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        } else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }
    //viewEmploymentAndTrainingApplications
    public function viewEmploymentAndTrainingApplications($id)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                $data = Training::select(
                    'id',
                    'image',
                    'ar_name as name',
                    'specialization',
                    'qualification',
                    'phone',
                    'email',
                    'ar_orderType',
                    'orderType',
                )
                    ->where('id', '=', $id)
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    public function updatePin(Request $request)
    {

            try {
                if ($request->id == null) {
                    return response()->json((['success' => false, 'message' => 'id field is required']));
                }
                $data = Service::find($request->id);
                if($data == null)
                {
                    return response()->json((['success' => false, 'message' => 'invalid id']));
                }
                $count = Service::where('pinStatus','=',0)->count();
                if($count > 6)
                {
                    return response()->json((['success' => false, 'message' => 'Pin limit completed']));
                }
                if ($request->status == null) {
                    return response()->json((['success' => false, 'message' => 'pinStatus field is required']));
                }
                $data->pinStatus = $request->status;
                $data->save();
                return response()->json(["success" => true, "message" => 'pin status updated successfully !!']);
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }

    }
    //updatePin
    public function updateStatus(Request $request)
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try {
                if ($request->id == null) {
                    return response()->json((['success' => false, 'message' => 'id field is required']));
                }
                $data = Service::find($request->id);
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
