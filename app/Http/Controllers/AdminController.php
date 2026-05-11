<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Goal;
use App\Models\Banner;
use App\Models\CallUs;
use App\Models\RateUs;
use App\Models\Social;
use App\Models\Vision;
use App\Models\AboutUs;
use App\Models\Counter;
use App\Models\History;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Training;
use App\Models\ShowStatus;
use App\Models\Achievement;
use App\Models\ServiceType;
use App\Models\AboutCompany;
use Illuminate\Http\Request;
use App\Models\Administration;
use App\Models\ServiceContent;
use App\Models\ServiceRequest;
use App\Models\DistinguishedTeam;
use App\Models\Title;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //partners
    public function partners()
    {
        $partners = Partner::all();
        return view('admin.partners',['partners'=>$partners]);
    }
    //storePartners
    public function storePartners(Request $request)
    {
        $this->validate($request,[
            'image' => 'required',
            'ar_title' => 'required',
            'title' => 'required',
        ]);
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
            'addedBy' => Auth::user()->id,
            'status' => 1,
            'pinStatus' => 1,
        ]);
        return redirect()->back()->with('success','Partner Store Successfully !!');

    }
    //updateStatusPartner
    public function updateStatusPartner(Request $request)
    {
        $partnerId = $request->input('id');
        $status = $request->input('status');
        $partner = Partner::findOrFail($partnerId);
        $partner->update(['status' => $status]);
        return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    }
    //dashbord
    public function dashboard()
    {

        $data = Banner::first();
        return view('dashboard',['data'=>$data]);
    }
    //aboutCompany
    public function aboutCompany()
    {
        if (Auth::user()->role == 'admin') {
        $data = AboutCompany::first();
        if($data == null)
        {
            return view('/error');
        }else{

            return view('admin.AboutCompany',['data'=>$data]);
        }
        } else {
            return redirect('sign-in');
        }
    }
    //ourPartners
    public function ourPartners()
    {
        if (Auth::user()->role == 'admin') {
        $records = Partner::all();
        $status = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
        return view('admin.partners',['partners'=>$records,'status'=>$status]);
        } else {
            return redirect('sign-in');
        }
    }
    //management
    public function management()
    {
        if (Auth::user()->role == 'admin') {
        $records = Administration::all();
        $status = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
        return view('admin.management',['records'=>$records,'status'=>$status]);
        } else {
            return redirect('sign-in');
        }
    }
    //achievements
    public function achievements()
    {
        if (Auth::user()->role == 'admin') {
        $data = Achievement::first();
        $status = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
        if($data == null)
        {
            return view('/error');
        }else{

            return view('admin.achievements',['data'=>$data,'status'=>$status]);
        }
        } else {
            return redirect('sign-in');
        }
    }
    //counter
    public function counter()
    {
        if (Auth::user()->role == 'admin') {
        $data = Counter::first();
        $status = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
        if($data == null)
        {
            return view('/error');
        }else{

            return view('admin.counter',['data'=>$data,'status' => $status]);
        }
        } else {
            return redirect('sign-in');
        }
    }
    //history
    public function history()
    {
        if (Auth::user()->role == 'admin') {
        $data = History::first();
        if($data == null)
        {
            return view('/error');
        }else{

            return view('admin.history',['data'=>$data]);
        }
        } else {
            return redirect('sign-in');
        }
    }
    //vision
    public function vision()
    {
        if (Auth::user()->role == 'admin') {
        $data = Vision::first();
        if($data == null)
        {
            return view('/error');
        }else{

            return view('admin.vision',['data'=>$data]);
        }
        } else {
            return redirect('sign-in');
        }
    }
    //goal
    public function goal()
    {
        if (Auth::user()->role == 'admin') {
        $data = Goal::first();
        if($data == null)
        {
            return view('/error');
        }else{

            return view('admin.goal',['data'=>$data]);
        }
        } else {
            return redirect('sign-in');
        }
    }
    //rateus
    public function rateus()
    {
        if (Auth::user()->role == 'admin') {
        $data = RateUs::first();
        if($data == null)
        {
            return view('/error');
        }else{

            return view('admin.rateus',['data'=>$data]);
        }
        } else {
            return redirect('sign-in');
        }
    }
    //aboutus
    public function aboutus()
    {
        if (Auth::user()->role == 'admin') {
        $data = AboutUs::first();
        if($data == null)
        {
            return view('/error');
        }else{

            return view('admin.aboutus',['data'=>$data]);
        }
        } else {
            return redirect('sign-in');
        }
    }
    //distinguishedteam
    public function distinguishedteam()
    {
        if (Auth::user()->role == 'admin') {
        $data = DistinguishedTeam::first();
        if($data == null)
        {
            return view('/error');
        }else{

            return view('admin.distinguishedteam',['data'=>$data]);
        }
        } else {
            return redirect('sign-in');
        }
    }
    //servicesreq
    public function servicesreq()
    {
        if (Auth::user()->role == 'admin') {
            $records = ServiceRequest::with('services')->orderBy('created_at','desc')->get();
        return view('admin.servicesreq',['records'=>$records]);
        } else {
            return redirect('sign-in');
        }
    }
    //recruitment
    public function recruitment()
    {
        if (Auth::user()->role == 'admin') {
        $records = Training::orderBy('created_at','desc')->get();

        return view('admin.recruitment',['records'=>$records]);
        } else {
            return redirect('sign-in');
        }
    }
    //contact
    public function contact()
    {
        if (Auth::user()->role == 'admin') {
        $data = CallUs::first();
        if($data == null)
        {
            return view('/error');
        }else{

            return view('admin.contact',['data'=>$data]);
        }
        } else {
            return redirect('sign-in');
        }
    }
    //socialacc
    public function socialacc()
    {
        if (Auth::user()->role == 'admin') {
        $data = Social::first();
        if($data == null)
        {
            return view('/error');
        }else{

            return view('admin.socialacc',['data'=>$data]);
        }
        } else {
            return redirect('sign-in');
        }
    }
    //blogpage
    public function blogpage()
    {
        if (Auth::user()->role == 'admin') {
        $records = Blog::all();

        return view('admin.blogpage',['records'=>$records]);
        } else {
            return redirect('sign-in');
        }
    }
    //servicespage
    public function servicespage($id)
    {
        if (Auth::user()->role == 'admin') {
        $records = Service::where('typeID',$id)->get();
        $data = ServiceContent::first();
        $servicetype = ServiceType::find($id);

        return view('admin.servicespage',['records'=>$records,'data'=>$data,'servicetype'=>$servicetype,'typeID' => $id]);
        } else {
            return redirect('sign-in');
        }
    }
    //titles
    public function titles()
    {
        $data = Title::find('737a2259-49a9-4f79-b924-5e59ba548901');
        if($data == null)
        {
            return redirect()->back();
        }
        return view('admin.titles',['data'=>$data]);
    }
    //updateTitle
    public function updateTitle(Request $request)
    {


        // try {
            $data = Title::find($request->id);
            if ($data == null) {

                return redirect()->back()->with('error', 'لم يتم العثور على السجل');
            }
            $data->title = $request->title;
            $data->ar_title = $request->ar_title;
            $data->text = $request->text;
            $data->ar_text = $request->ar_text;
            $data->save();
            return redirect()->back()->with('success', 'تم تحديث السجل بنجاح ');
        // } catch (Exception $e) {
        //     return redirect()->back()->with('error', 'لم يتم العثور على السجل');
        // }
    }





}
