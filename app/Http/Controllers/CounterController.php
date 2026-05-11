<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ShowStatus;

class CounterController extends Controller
{
    //updateCounter
    public function updateCounter(Request $request)
    {
        // dd($request->all());
            try {

                if ($request->id == null) {
                    return redirect()->back()->with('error','مطلوب معرف');
                }
                if ($request->customerTitle == null) {
                    return redirect()->back()->with('error','عنوان العميل مطلوب');

                }
                if ($request->ar_customerTitle == null) {
                    return redirect()->back()->with('error','مطلوب عنوان العميل العربي');

                }
                if ($request->numberofCustomer == null) {
                    return redirect()->back()->with('error','مطلوب عدد العملاء');

                }
                if ($request->visitorTitle == null) {
                    return redirect()->back()->with('error','عنوان الزائر مطلوب');

                }
                if ($request->ar_vistiorTitle == null) {
                    return redirect()->back()->with('error','مطلوب عنوان عنوان الزائر باللغة العربية');

                }
                if ($request->numberofVisitor == null) {
                    return redirect()->back()->with('error','مطلوب عدد الزائرين');

                }
                $data = Counter::find($request->id);
                if ($data == null) {
                    return redirect()->back()->with('error','مطلوب معرف');

                }
                if ($request->file('customerImage')) {
                    if($data->customerImageName != null)
                    {
                        $base_url = getenv("APP_URL");
                        $file_url = $base_url . $data->customerImageName;
                        $file_path = public_path(parse_url($file_url, PHP_URL_PATH));
                        if (file_exists($file_path)) {
                            unlink($file_path);
                        }
                    }
                    $time = time();
                    $image = $request->file('customerImage');
                    $ext = $image->getClientOriginalExtension();
                    $base_url = getenv("APP_URL");
                    $application = $base_url . 'Counter/' . $time . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('Counter'), $application);
                    $imageName = 'Counter/' . $time . '.' . $ext;
                } else {
                    $application = $data->customerImage;
                    $imageName = $data->customerImageName;
                }

                if ($request->file('visitorImage')){
                    if($data->visitorImageName != null)
                    {
                        $base_url = getenv("APP_URL");
                        $file_url = $base_url . $data->visitorImageName;
                        $file_path = public_path(parse_url($file_url, PHP_URL_PATH));
                        if (file_exists($file_path)) {
                            unlink($file_path);
                        }
                    }
                    $timeabout = mt_rand(1000,9999);
                    $imageabout = $request->file('visitorImage');
                    $extabout = $imageabout->getClientOriginalExtension();
                    $base_url = getenv("APP_URL");
                    $aboutImage = $base_url . 'Counter/' . $timeabout . '.' . $imageabout->getClientOriginalExtension();
                    $imageabout->move(public_path('Counter'), $aboutImage);
                    $imageNameAbout = 'Counter/' . $timeabout . '.' . $extabout;
                } else {
                    $aboutImage = $data->visitorImage;
                    $imageNameAbout = $data->visitorImageName;
                }

                $data->update([
                    'customerImage' => $application,
                    'visitorImage' => $aboutImage,
                    'visitorImageName' => $imageNameAbout,
                    'customerImageName' => $imageName,
                    'addedBy' => Auth::user()->id,
                    'customerTitle' => $request->customerTitle,
                    'ar_customerTitle' => $request->ar_customerTitle,
                    'numberofCustomer' => $request->numberofCustomer,
                    'visitorTitle' => $request->visitorTitle,
                    'ar_visitorTitle' => $request->ar_vistiorTitle,
                    'numberofVisitor' => $request->numberofVisitor,
                ]);
                return redirect()->back()->with('success','تم تحديث العداد بنجاح');
            } catch (Exception $e) {
                return redirect()->back()->with('error','هناك خطأ ما');
            }

    }
    //viewCounter
    public function viewCounter()
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try{
                $data = Counter::select('id', 'customerImage', 'customerTitle',
                 'ar_customerTitle','numberofCustomer','visitorImage','visitorTitle',
                 'ar_visitorTitle','numberofVisitor'
                 )
                ->first();
                $counterStatus = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
                $showStatus = $counterStatus->counter;
                return response()->json(["success" => true, "showStatus"=>$showStatus, "counter" => $data]);
            }catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        }else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }
    //updateCounterStatus
    public function updateCounterStatus()
    {
        $status = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
        $status->counter = 1;
        $status->save();
        return redirect()->back()->with('success','تم تحديث الحالة بنجاح');

    }
    //updateCounterStatusHide
    public function updateCounterStatusHide()
    {
        $status = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
        $status->counter = 2;
        $status->save();
        return redirect()->back()->with('success',' تم تحديث الحالة بنجاح ');

    }
    //updateCounterStatusTeam
    public function updateCounterStatusTeam()
    {
        $status = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
        $status->ourTeam = 1;
        $status->save();
        return redirect()->back()->with('success','تم تحديث الحالة بنجاح');

    }
    //updateCounterStatusHideTeam
    public function updateCounterStatusHideTeam()
    {
        $status = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
        $status->ourTeam = 2;
        $status->save();
        return redirect()->back()->with('success','تم تحديث الحالة بنجاح ');

    }
     //updateCounterStatusPartner
     public function updateCounterStatusPartner()
     {
         $status = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
         $status->partner = 1;
         $status->save();
         return redirect()->back()->with('success','تم تحديث الحالة بنجاح');

     }
     //updateCounterStatusHidePartner
     public function updateCounterStatusHidePartner()
     {
         $status = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
         $status->partner = 2;
         $status->save();
         return redirect()->back()->with('success',' تم تحديث الحالة بنجاح ');

     }

     public function updateCounterStatusAch()
    {
        $status = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
        $status->achievement = 1;
        $status->save();
        return redirect()->back()->with('success','تم تحديث الحالة بنجاح');

    }
    //updateCounterStatusHide
    public function updateCounterStatusHideAch()
    {
        $status = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
        $status->achievement = 2;
        $status->save();
        return redirect()->back()->with('success',' تم تحديث الحالة بنجاح');

    }
}
