<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\AboutCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutCompanyController extends Controller
{
    //updateAboutCompany
    public function updateAboutCompany(Request $request)
    {

            try {
                $data = AboutCompany::find($request->id);
                if ($data == null) {

                    return redirect()->back()->with('error','لم يتم العثور على السجل');
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
                    $application = $base_url . 'about/' . $time . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('about'), $application);
                    $imageName = 'about/' . $time . '.' . $ext;
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
                    'addedBy' => Auth::user()->id,
                    'status' => 1,
                ]);
                return redirect()->back()->with('success','تم تحديث السجل بنجاح ');
            } catch (Exception $e) {
                return redirect()->back()->with('error','لم يتم العثور على السجل');
            }

    }
    //viewAboutCompany
    public function viewAboutCompany()
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try{
                $data = AboutCompany::select('id', 'image', 'description',
                 'ar_description','whatsappNumber'
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
}
