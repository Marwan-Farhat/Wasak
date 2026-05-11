<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\RateUs;
use App\Models\AboutUs;
use App\Models\AboutCrud;
use Illuminate\Http\Request;
use App\Models\DistinguishedTeam;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    //updateDistinguished
    public function updateDistinguished(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {

                if ($request->id == null) {
                    return redirect()->back()->with('error',' مطلوب معرف');
                }
                if ($request->description == null) {
                    return redirect()->back()->with('error','الوصف مطلوب');

                }
                if ($request->ar_description == null) {
                    return redirect()->back()->with('error','الوصف العربي مطلوب');

                }
                $data = DistinguishedTeam::find($request->id);
                if ($data == null) {
                    return redirect()->back()->with('error',' مطلوب معرف');
                }
                $data->update([
                    'description' => $request->description,
                    'ar_description' => $request->ar_description,
                    'addedBy' => Auth::user()->id,
                    'status' => 1,
                ]);
                return redirect()->back()->with('success',' تم تحديث الهدف بنجاح ');
            } catch (Exception $e) {
                return redirect()->back()->with('error','هناك خطأ ما');
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    //viewDistinguishedTeam
    public function viewDistinguishedTeam()
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try{
                $data = DistinguishedTeam::select('id', 'description',
                 'ar_description','status'
                 )
                ->first();
                return response()->json(["success" => true, "data" => $data]);
            }catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        }else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }

    //updateRateUs
    public function updateRateUs(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {

                if ($request->id == null) {
                    return redirect()->back()->with('error',' مطلوب معرف');
                }
                if ($request->description == null) {
                    return redirect()->back()->with('error','الوصف مطلوب');

                }
                if ($request->ar_description == null) {
                    return redirect()->back()->with('error','الوصف العربي مطلوب');

                }
                $data = RateUs::find($request->id);
                if ($data == null) {
                    return redirect()->back()->with('error',' مطلوب معرف');
                }
                $data->update([
                    'description' => $request->description,
                    'ar_description' => $request->ar_description,
                    'addedBy' => Auth::user()->role,
                    'status' => 1,
                ]);
                return redirect()->back()->with('success','  قيمنا بالتحديث بنجاح   ');
            } catch (Exception $e) {
                return redirect()->back()->with('error','هناك خطأ ما');
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    //viewRateUs
    public function viewRateUs()
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try{
                $data = RateUs::select('id', 'description',
                 'ar_description','status'
                 )
                ->first();
                return response()->json(["success" => true, "data" => $data]);
            }catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        }else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }
    //updateAboutUs
    public function updateAboutUs(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {

                if ($request->id == null) {
                    return redirect()->back()->with('error',' مطلوب معرف');
                }
                if ($request->description == null) {
                    return redirect()->back()->with('error','الوصف مطلوب');

                }
                if ($request->ar_description == null) {
                    return redirect()->back()->with('error','الوصف العربي مطلوب');
                }
                $data = AboutUs::find($request->id);
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
                    $application = $base_url . 'uploads/' . $time . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads'), $application);
                    $imageName = 'uploads/' . $time . '.' . $ext;
                } else {
                    $application = $data->image;
                    $imageName = $data->imageName;
                }
                $data->update([
                    'description' => $request->description,
                    'ar_description' => $request->ar_description,
                    'addedBy' => Auth::user()->id,
                    'status' => 1,
                    'image' => $application,
                    'imageName' => $imageName
                ]);
                return redirect()->back()->with('success',' عنا تنافس بنجاح    ');
            } catch (Exception $e) {
                return redirect()->back()->with('error','هناك خطأ ما');
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
     //aboutUSPage
     public function aboutUSPage()
     {
         $records = AboutCrud::all();
         return view('admin.aboutUSPage', ['records' => $records]);
     }
    //viewAboutUs
    public function viewAboutUs()
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try{
                $data = AboutUs::select('id', 'description',
                 'ar_description','status'
                 )
                ->first();
                return response()->json(["success" => true, "data" => $data]);
            }catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        }else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }
     //addText
     public function addText(Request $request)
     {
         // if (Auth::guard('api')->user()->role == 'admin') {
         try {
            //  if ($request->image == null) {
            //      return redirect()->back()->with('error', '   الصورة مطلوبة');
            //  }
             if ($request->title == null) {
                 return redirect()->back()->with('error', 'العنوان مطلوب');
             }
             if ($request->ar_title == null) {
                 return redirect()->back()->with('error', 'العنوان العربي مطلوب');
             }
             if ($request->description == null) {
                 return redirect()->back()->with('error', 'الوصف مطلوب');
             }
             if ($request->ar_description == null) {
                 return redirect()->back()->with('error', 'الوصف العربي مطلوب');
             }
             if ($request->file('image')) {
                 $time = time();
                 $image = $request->file('image');
                 $ext = $image->getClientOriginalExtension();
                 $base_url = getenv("APP_URL");
                 $application = $base_url . 'aboutImages/' . $time . '.' . $image->getClientOriginalExtension();
                 $image->move(public_path('aboutImages'), $application);
                 $imageName = 'aboutImages/' . $time . '.' . $ext;
             } else {
                 $application = null;
                 $imageName = null;
             }
             AboutCrud::create([
                 'image' => $application,
                 'title' => $request->title,
                 'ar_title' => $request->ar_title,
                 'description' => $request->description,
                 'ar_description' => $request->ar_description,
                 'imageName' => $imageName,
                 'status' => 1,
             ]);
             return redirect()->back()->with('success', 'متجر الخدمة بنجاح');
         } catch (Exception $e) {
             return redirect()->back()->with('error', 'هناك خطأ ما');
         }
         // } else {
         //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
         // }
     }
     //editText
     public function editText($id)
     {
         try {
             $data = AboutCrud::find($id);
             return response()->json(["success" => true, "data" => $data]);
         } catch (Exception $e) {
             return response()->json(["success" => false, "message" => "internal Server error"], 500);
         }
     }
     //updateText
     public function updateText(Request $request)
     {

         try {
             if ($request->id == null) {
                 return redirect()->back()->with('error', ' مطلوب معرف');
             }
             $data = AboutCrud::find($request->id);
             if ($data == null) {
                 return redirect()->back()->with('error', ' مطلوب معرف');
             }
             if ($request->title == null) {
                 return redirect()->back()->with('error', 'العنوان مطلوب');
             }
             if ($request->ar_title == null) {
                 return redirect()->back()->with('error', 'العنوان العربي مطلوب');
             }
             if ($request->description == null) {
                 return redirect()->back()->with('error', 'الوصف مطلوب');
             }
             if ($request->ar_description == null) {
                 return redirect()->back()->with('error', 'الوصف العربي مطلوب');
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
                 $application = $base_url . 'aboutImages/' . $time . '.' . $image->getClientOriginalExtension();
                 $image->move(public_path('aboutImages'), $application);
                 $imageName = 'aboutImages/' . $time . '.' . $ext;
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
             return redirect()->back()->with('success', ' تم تحديث الخدمة بنجاح');
         } catch (Exception $e) {
             return redirect()->back()->with('error', 'هناك خطأ ما');
         }
     }
     //deleteText
     public function deleteText(Request $request)
     {
         try {
             $data = AboutCrud::find($request->id);
             if ($data == null) {
                 return redirect()->back()->with('error', 'هناك خطأ ما');
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
             return redirect()->back()->with('success', 'تم حذف الخدمة بنجاح');
         } catch (Exception $e) {
             return redirect()->back()->with('error', 'هناك خطأ ما');
         }
     }
     //updatePinText
     public function updatePinText(Request $request)
     {
         try {
             if ($request->id == null) {
                 return response()->json((['success' => false, 'message' => 'id field is required']));
             }
             $data = AboutCrud::find($request->id);
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
}
