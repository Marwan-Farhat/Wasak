<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    //createBlog
    public function createBlog(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                if ($request->image == null) {
                    return redirect()->back()->with('error','   الصورة مطلوبة');
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
                if ($request->date == null) {
                    return redirect()->back()->with('error','  التاريخ مطلوب');
                }
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
                Blog::create([
                    'image' => $application,
                    'title' => $request->title,
                    'ar_title' => $request->ar_title,
                    'description' => $request->description,
                    'ar_description' => $request->ar_description,
                    'imageName' => $imageName,
                    'date'=>$request->date,
                    'addedBy' => Auth::user()->role,
                    'status' => 1,
                ]);
                return redirect()->back()->with('success',' تم إنشاء المدونة بنجاح');
            } catch (Exception $e) {
                return redirect()->back()->with('error','هناك خطأ ما');
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    //viewAllBlogs
    public function viewAllBlogs(Request $request)
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try {
                $lang = $request->header('language');
                if ($lang == null) {
                    return response()->json(["success" => false, "message" => "language required !!"]);
                }
                if ($lang == 'ar') {
                    $data = Blog::select('id', 'image','pinStatus', 'ar_title as title','ar_description as description','date')->get();
                    return response()->json(["success" => true, "blogs" => $data]);
                } else {
                    $data = Blog::select('id', 'image', 'pinStatus','title','description','date')->get();
                    return response()->json(["success" => true, "blogs" => $data]);
                }
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        } else {
            return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        }
    }
    //editBlog
    public function editBlog($id)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                $data = Blog::find($id);
                return response()->json(["success" => true, "data" => $data]);
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => "internal Server error"], 500);
            }
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
    //updateBlog
    public function updateBlog(Request $request)
    {

            try {
                if ($request->id == null) {
                    return redirect()->back()->with('error','هناك خطأ ما');
                }
                $data = Blog::find($request->id);
                if($data == null)
                {
                    return redirect()->back()->with('error','هناك خطأ ما');
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
                if ($request->date == null) {
                    return redirect()->back()->with('error','  التاريخ مطلوب');
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
                    $application = $base_url . 'BlogImages/' . $time . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('BlogImages'), $application);
                    $imageName = 'BlogImages/' . $time . '.' . $ext;
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
                    'date' => $request->date,

                ]);
                return redirect()->back()->with('success',' تم تحديث المدونة بنجاح');
            } catch (Exception $e) {
                return redirect()->back()->with('error','هناك خطأ ما');
            }

    }
    //deleteBlog
    public function deleteBlog(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                $data = Blog::find($request->id);
                if($data == null)
                {
                    return redirect()->back()->with('error',' مطلوب معرف');
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
                return redirect()->back()->with('success',' تم حذف المدونة بنجاح');
            } catch (Exception $e) {
                return redirect()->back()->with('error','هناك خطأ ما');
            }

    }
      //updatePin
      public function updatePin(Request $request)
      {
        //   if (Auth::user()->role == 'admin') {
              try {
                  if ($request->id == null) {
                      return response()->json((['success' => false, 'message' => 'id field is required']));
                  }
                  $data = Blog::find($request->id);
                  if($data == null)
                  {
                      return response()->json((['success' => false, 'message' => 'invalid id']));
                  }
                  $count = Blog::where('pinStatus','=',1)->count();
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
        //   } else {
        //       return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        //   }
      }
      //updatePin
      public function updateStatus(Request $request)
      {
          if (Auth::guard('api')->user()->role == 'admin') {
              try {
                  if ($request->id == null) {
                      return response()->json((['success' => false, 'message' => 'id field is required']));
                  }
                  $data = Blog::find($request->id);
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
