<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    //updateGoal
    public function updateGoal(Request $request)
    {

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
                $data = Goal::find($request->id);
                if ($data == null) {
                    return redirect()->back()->with('error',' مطلوب معرف');
                }
                $data->update([
                    'description' => $request->description,
                    'ar_description' => $request->ar_description,
                    'addedBy' => Auth::user()->role,
                    'status' => 1,
                ]);
                return redirect()->back()->with('success',' تم تحديث الهدف بنجاح ');
            } catch (Exception $e) {
                return redirect()->back()->with('error','هناك خطأ ما');
            }

    }
    //viewGoal
    public function viewGoal()
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try{
                $data = Goal::select('id', 'description',
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
}
