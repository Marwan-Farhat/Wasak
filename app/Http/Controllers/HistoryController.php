<?php

namespace App\Http\Controllers;

use App\Models\History;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    //updateHistory
    public function updateHistory(Request $request)
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
                $data = History::find($request->id);
                if ($data == null) {
                    return redirect()->back()->with('error',' مطلوب معرف');
                }
                $data->update([
                    'description' => $request->description,
                    'ar_description' => $request->ar_description,
                    'addedBy' => Auth::user()->role,

                ]);
                return redirect()->back()->with('success','تم تحديث التاريخ بنجاح');
            } catch (Exception $e) {
                return redirect()->back()->with('error','هناك خطأ ما');
            }
    }
    //viewHistory
    public function viewHistory()
    {
        if (Auth::guard('api')->user()->role == 'admin') {
            try{
                $data = History::select('id', 'description',
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
    //updateStatus
    public function updateStatus(Request $request)
    {
        // if (Auth::guard('api')->user()->role == 'admin') {
            try {
                if ($request->id == null) {
                    return response()->json((['success' => false, 'message' => 'id field is required']));
                }
                $data = History::find($request->id);
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
        // } else {
        //     return response()->json(["success" => false, "message" => "Not Authorized"], 401);
        // }
    }
}
