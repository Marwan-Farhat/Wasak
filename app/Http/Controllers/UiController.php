<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Blog;
use App\Models\Goal;
use App\Models\Banner;
use App\Models\CallUs;
use App\Models\RateUs;
use App\Models\Social;
use App\Models\Vision;
use App\Models\Vistor;
use App\Models\AboutUs;
use App\Models\Counter;
use App\Models\History;
use App\Models\Partner;
use App\Models\Service;
use App\Models\AboutCrud;
use App\Models\ShowStatus;
use App\Models\Achievement;
use App\Models\ServiceType;
use App\Models\AboutCompany;
use Illuminate\Http\Request;
use App\Models\Administration;
use App\Models\ServiceContent;
use App\Models\DistinguishedTeam;

class UiController extends Controller
{
    //getAboutCompany
    public function getAboutCompany(Request $request)
    {
        try {
            $lang = $request->header('language');
            if ($lang == null) {
                return response()->json(["success" => false, "message" => "language required !!"]);
            }
            if ($lang == 'ar') {
                $data = AboutCompany::select('id', 'image',
                    'ar_description as description', 'whatsappNumber'
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            } else {
                $data = AboutCompany::select('id', 'image',
                    'description', 'whatsappNumber'
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            }
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "internal Server error"], 500);
        }
    }
    //getAchievements
    public function getAchievements(Request $request)
    {
        try {
            $lang = $request->header('language');
            if ($lang == null) {
                return response()->json(["success" => false, "message" => "language required !!"]);
            }
            if ($lang == 'ar') {
                $data = Achievement::select('id', 'image', 'description',
                    'ar_description as description'
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            } else {
                $data = Achievement::select('id', 'image', 'description',
                    'description'
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            }
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "internal Server error"], 500);
        }
    }
    //getCustomerAndVisitor
    public function getCustomerAndVisitor(Request $request)
    {
        try {
            $lang = $request->header('language');
            if ($lang == null) {
                return response()->json(["success" => false, "message" => "language required !!"]);
            }
            if ($lang == 'ar') {
                $data = Counter::select('id', 'customerImage',
                    'ar_customerTitle as customerTitle', 'numberofCustomer', 'visitorImage',
                    'ar_visitorTitle as visitorTitle', 'numberofVisitor'
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            } else {
                $data = Counter::select('id', 'customerImage',
                    'customerTitle', 'numberofCustomer', 'visitorImage',
                    'visitorTitle', 'numberofVisitor'
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            }
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "internal Server error"], 500);
        }
    }
    //getAllServices
    public function getAllServices(Request $request)
    {
        try {
            $lang = $request->header('language');
            if ($lang == null) {
                return response()->json(["success" => false, "message" => "language required !!"]);
            }
            if ($lang == 'ar') {
                $data = Service::select('id', 'image', 'ar_title as title', 'ar_description as description')

                    ->get();
                return response()->json(["success" => true, "services" => $data]);
            } else {
                $data = Service::select('id', 'image', 'title', 'description')

                    ->get();
                return response()->json(["success" => true, "services" => $data]);
            }
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "internal Server error"], 500);
        }
    }
    //getPartners
    public function getPartners(Request $request)
    {
        try {
            $lang = $request->header('language');
            if ($lang == null) {
                return response()->json(["success" => false, "message" => "language required !!"]);
            }
            if ($lang == 'ar') {
                $data = Partner::select('id', 'image', 'ar_title as title')

                    ->get();
                return response()->json(["success" => true, "partners" => $data]);
            } else {
                $data = Partner::select('id', 'image', 'title')

                    ->get();
                return response()->json(["success" => true, "partners" => $data]);
            }
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "internal Server error"], 500);
        }
    }
    //getCallUs
    public function getCallUs()
    {
        try {
            $data = CallUs::select('id', 'email', 'phone',
                'workDays', 'workHours'
            )
                ->first();
            return response()->json(["success" => true, "CallUs" => $data]);
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "internal Server error"], 500);
        }
    }
    //getAllBlogs
    public function getAllBlogs(Request $request)
    {
        try {
            $lang = $request->header('language');
            if ($lang == null) {
                return response()->json(["success" => false, "message" => "language required !!"]);
            }
            if ($lang == 'ar') {
                $data = Blog::select('id', 'image', 'ar_title as title', 'ar_description as description', 'date')->get();
                return response()->json(["success" => true, "blogs" => $data]);
            } else {
                $data = Blog::select('id', 'image', 'title', 'description', 'date')->get();
                return response()->json(["success" => true, "blogs" => $data]);
            }
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "internal Server error"], 500);
        }
    }
    //getVision
    public function getVision(Request $request)
    {
        try {
            $lang = $request->header('language');
            if ($lang == null) {
                return response()->json(["success" => false, "message" => "language required !!"]);
            }
            if ($lang == 'ar') {
                $data = Vision::select('id',
                    'ar_description as description'
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            } else {
                $data = Vision::select('id',
                    'description'
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            }
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "internal Server error"], 500);
        }
    }
    //getGoals
    public function getGoals(Request $request)
    {
        try {
            $lang = $request->header('language');
            if ($lang == null) {
                return response()->json(["success" => false, "message" => "language required !!"]);
            }
            if ($lang == 'ar') {
                $data = Goal::select('id',
                    'ar_description as description'
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            } else {
                $data = Goal::select('id',
                    'description'
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            }
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "internal Server error"], 500);
        }
    }
    //getOurHistory
    public function getOurHistory(Request $request)
    {
        try {
            $lang = $request->header('language');
            if ($lang == null) {
                return response()->json(["success" => false, "message" => "language required !!"]);
            }
            if ($lang == 'ar') {
                $data = History::select('id',
                    'ar_description as description','status'
                )
                ->where('status','=',1)
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            } else {
                $data = History::select('id',
                    'description','status'
                )
                ->where('status','=',1)
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            }
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "internal Server error"], 500);
        }
    }
    //getBanner
    public function getBanner(Request $request)
    {
        try {
            $lang = $request->header('language');
            if ($lang == null) {
                return response()->json(["success" => false, "message" => "language required !!"]);
            }
            if ($lang == 'ar') {
                $data = Banner::select('id',
                    'ar_title as title',
                    'ar_subtitle as subTitle',
                    'image',
                    'ar_help as help'
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            } else {
                $data = Banner::select('id',
                    'title',
                    'subTitle',
                    'image',
                    'help'
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            }
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "internal Server error"], 500);
        }
    }
    //getAboutUs
    public function getAboutUs(Request $request)
    {
        try {
            $lang = $request->header('language');
            if ($lang == null) {
                return response()->json(["success" => false, "message" => "language required !!"]);
            }
            if ($lang == 'ar') {
                $data = AboutUs::select('id',
                    'ar_description as description'
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            } else {
                $data = AboutUs::select('id',
                    'description'
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            }
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "internal Server error"], 500);
        }
    }
    //getRateUs
    public function getRateUs(Request $request)
    {
        try {
            $lang = $request->header('language');
            if ($lang == null) {
                return response()->json(["success" => false, "message" => "language required !!"]);
            }
            if ($lang == 'ar') {
                $data = RateUs::select('id',
                    'ar_description as description'
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            } else {
                $data = RateUs::select('id',
                    'description'
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            }
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "internal Server error"], 500);
        }
    }
    //getDistinguishedTeam
    public function getDistinguishedTeam(Request $request)
    {
        try {
            $lang = $request->header('language');
            if ($lang == null) {
                return response()->json(["success" => false, "message" => "language required !!"]);
            }
            if ($lang == 'ar') {
                $data = DistinguishedTeam::select('id',
                    'ar_description as description'
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            } else {
                $data = DistinguishedTeam::select('id',
                    'description'
                )
                    ->first();
                return response()->json(["success" => true, "data" => $data]);
            }
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "internal Server error"], 500);
        }
    }
    //getAllAdministration
    public function getAllAdministration(Request $request)
    {
        try {
            $lang = $request->header('language');
            if ($lang == null) {
                return response()->json(["success" => false, "message" => "language required !!"]);
            }
            if ($lang == 'ar') {
                $data = Administration::select('id', 'image', 'ar_title as title', 'ar_description as description')

                    ->get();
                return response()->json(["success" => true, "administrations" => $data]);
            } else {
                $data = Administration::select('id', 'image', 'title', 'description')

                    ->get();
                return response()->json(["success" => true, "administrations" => $data]);
            }
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "internal Server error"], 500);
        }
    }
    //getBlog
    public function getBlog(Request $request, $id)
    {
        try {
            $lang = $request->header('language');
            if ($lang == null) {
                return response()->json(["success" => false, "message" => "language required !!"]);
            }
            if ($lang == 'ar') {
                $data = Blog::select('id', 'image', 'ar_title as title', 'ar_description as description', 'date')->where('id', '=', $id)->first();
                return response()->json(["success" => true, "blog" => $data]);
            } else {
                $data = Blog::select('id', 'image', 'title', 'description', 'date')->where('id', '=', $id)->first();
                return response()->json(["success" => true, "blog" => $data]);
            }
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "internal Server error"], 500);
        }
    }
    //getHomePage
    public function getHomePage(Request $request)
    {
        $lang = $request->header('language');
        if ($lang == null) {
            return response()->json(["success" => false, "message" => "language required !!"]);
        }
        if ($lang == 'ar') {
            $banner = Banner::select('id',
                'ar_title as title',
                'ar_subtitle as subTitle',
                'image',
                'ar_help as help'
            )
                ->first();
            $aboutCompany = AboutCompany::select('id', 'image',
                'ar_description as description', 'whatsappNumber'
            )
                ->first();
            $services = Service::select('id', 'image', 'ar_title as title', 'ar_description as description')
                ->where('pinStatus', '=', 1)

                ->get();
            $partners = Partner::select('id', 'image', 'ar_title as title')
                ->where('pinStatus', '=', 1)

                ->get();
            $teams = Administration::select('id', 'image', 'ar_title as title', 'ar_description as description')
                ->where('pinStatus', '=', 1)

                ->get();
            $Achievement = Achievement::select('id', 'image', 'description',
                'ar_description as description'
            )->first();
            $counter = Counter::select('id', 'customerImage',
                'ar_customerTitle as customerTitle', 'numberofCustomer', 'visitorImage',
                'ar_visitorTitle as visitorTitle', 'numberofVisitor'
            )
                ->first();
                $counterStatus = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
                if($counterStatus->counter == 1)
                {
                    $cStatus = $counter;
                }else{
                    $cStatus = null;
                }
                $teamStatus = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
                if($teamStatus->ourTeam == 1)
                {
                    $tStatus = $teams;
                }else{
                    $tStatus = null;
                }
                $achStatus = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
                if($achStatus->achievement == 1)
                {
                    $aStatus = $Achievement;
                }else{
                    $aStatus = null;
                }
                $partnerStatus = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
                if($partnerStatus->partner == 1)
                {
                    $pStatus = $partners;
                }else{
                    $pStatus = null;
                }
            $serviceContent = ServiceContent::select('id', 'image', 'ar_description as description')->first();
            return response()->json(["success" => true,
                "banner" => $banner,
                'aboutCompany' => $aboutCompany,
                'services' => $services,
                'partners' => $pStatus,
                'teams' => $tStatus,
                'achievement' => $aStatus,
                'counter' => $cStatus,
                'serviceContent' => $serviceContent,
            ]);


        } else {
            $banner = Banner::select('id',
                'title',
                'subTitle',
                'image',
                'help'
            )
                ->first();
            $aboutCompany = AboutCompany::select('id', 'image',
                'description', 'whatsappNumber'
            )
                ->first();
            $services = Service::select('id', 'image', 'title', 'description')
                ->where('pinStatus', '=', 1)

                ->get();
            $partners = Partner::select('id', 'image', 'title')
                ->where('pinStatus', '=', 1)

                ->get();
            $teams = Administration::select('id', 'image', 'title', 'description')
                ->where('pinStatus', '=', 1)

                ->get();
            $Achievement = Achievement::select('id', 'image', 'description',
                'description'
            )
                ->first();
            $counter = Counter::select('id', 'customerImage',
                'customerTitle', 'numberofCustomer', 'visitorImage',
                'visitorTitle', 'numberofVisitor'
            )
                ->first();
            $serviceContent = ServiceContent::select('id', 'image', 'description')->first();
            $counterStatus = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
                if($counterStatus->counter == 1)
                {
                    $cStatus = $counter;
                }else{
                    $cStatus = null;
                }
                $teamStatus = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
                if($teamStatus->ourTeam == 1)
                {
                    $tStatus = $teams;
                }else{
                    $tStatus = null;
                }
                $achStatus = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
                if($achStatus->achievement == 1)
                {
                    $aStatus = $Achievement;
                }else{
                    $aStatus = null;
                }
                $partnerStatus = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
                if($partnerStatus->partner == 1)
                {
                    $pStatus = $partners;
                }else{
                    $pStatus = null;
                }
            $serviceContent = ServiceContent::select('id', 'image', 'ar_description as description')->first();
            return response()->json(["success" => true,
                "banner" => $banner,
                'aboutCompany' => $aboutCompany,
                'services' => $services,
                'partners' => $pStatus,
                'teams' => $tStatus,
                'achievement' => $aStatus,
                'counter' => $cStatus,
                'serviceContent' => $serviceContent,
            ]);

        }
    }
    //getServiceDetails
    public function getServiceDetails(Request $request, $id)
    {
        try {
            $lang = $request->header('language');
            if ($lang == null) {
                return response()->json(["success" => false, "message" => "language required !!"]);
            }
            if ($lang == 'ar') {
                $data = Service::select('id', 'image', 'ar_title as title', 'ar_description as description')->where('id', '=', $id)->first();
                return response()->json(["success" => true, "blog" => $data]);
            } else {
                $data = Service::select('id', 'image', 'title', 'description')->where('id', '=', $id)->first();
                return response()->json(["success" => true, "service" => $data]);
            }
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "internal Server error"], 500);
        }
    }
    //getSocialLink
    public function getSocialLink()
    {
        $data = Social::first();
        $callUs = CallUs::first();
        return response()->json(["success" => true, "socialLinks" => $data,'callUs'=>$callUs]);

    }
    //getAboutPage
    public function getAboutPage(Request $request)
    {
        $lang = $request->header('language');
        if ($lang == null) {
            return response()->json(["success" => false, "message" => "language required !!"]);
        }
        if ($lang == 'ar') {
            $aboutUs = AboutUs::select('id',
                'ar_description as description'
            )->first();
            $vission = Vision::select('id',
                'ar_description as description'
            )
                ->first();
            $goal = Goal::select('id',
                'ar_description as description'
            )
                ->first();
            $rateUs = RateUs::select('id',
                'ar_description as description'
            )
                ->first();
            $history = History::select('id',
                'ar_description as description','status'
            )
            ->where('status','=',1)
                ->first();
            $DistinguishedTeam = DistinguishedTeam::select('id',
                'ar_description as description'
            )
                ->first();
            $banner = Banner::select('id',
                'ar_title as title',
                'ar_subtitle as subTitle',
                'image',
                'ar_help as help'
            )
                ->first();

            return response()->json(["success" => true,
                "aboutUs" => $aboutUs,
                'vision' => $vission,
                'goal' => $goal,
                'rateUs' => $rateUs,
                'history' => $history,
                'DistinguishedTeam' => $DistinguishedTeam,
                'banner' => $banner,
            ]);

        } else {
            $aboutUs = AboutUs::select('id',
                'description'
            )->first();
            $vission = Vision::select('id',
                'description'
            )
                ->first();
            $goal = Goal::select('id',
                'description'
            )
                ->first();
            $rateUs = RateUs::select('id',
                'description'
            )
                ->first();
            $history = History::select('id',
                'ar_description as description','status'
            )
            ->where('status','=',1)
                ->first();
            $DistinguishedTeam = DistinguishedTeam::select('id',
                'description'
            )
                ->first();
            $banner = Banner::select('id',
                'title',
                'subTitle',
                'image',
                'help'
            )
                ->first();

            return response()->json(["success" => true,
                "aboutUs" => $aboutUs,
                'vision' => $vission,
                'goal' => $goal,
                'rateUs' => $rateUs,
                'history' => $history,
                'DistinguishedTeam' => $DistinguishedTeam,
                'banner' => $banner,
            ]);

        }
    }
    //index
    public function index(Request $request)
    {
        $services = ServiceType::where('status','=',0)->get();
        $partners = Partner::where('pinStatus','=',0)->get();
        $count = count($partners);
        $teams = Administration::where('pinStatus','=',0)->get();
        $check = Vistor::where('ipAddress','=',$request->ip())->first();
        // if($check == null)
        // {
            $data = new Vistor();
            $data->ipAddress = $request->ip();
            $data->save();
        // }
        $status = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
        $visitorCount = Vistor::all()->count();
        return view('welcome',
        [
        'services'=>$services,
        'partners' => $partners,
        'count'=>$count,
        'teams'=>$teams,
        'status' => $status,
        'visitorCount' => $visitorCount,
        ]);
    }
    //aboutus
    public function aboutus()
    {
        $records = AboutCrud::where('status',1)->get();
        return view('website.aboutus',['records',$records]);
    }
    //ourservices
    public function ourservices()
    {
        $services = ServiceType::all();
        return view('website.ourservices',['services'=>$services]);
    }
    public function ourservicespage($id)
    {
        $services = Service::where('typeID','=',$id)->get();
        return view('website.ourservicespage',['services'=>$services]);
    }
    //ourteam
    public function ourteam()
    {
        $teams = Administration::all();
        return view('website.ourteam',['teams'=>$teams]);
    }
    //contactus
    public function contactus()
    {
        return view('website.contactus');
    }
    //recruitmentpage
    public function recruitmentpage()
    {
        return view('website.recruitmentpage');
    }
    //servicereqpage
    public function servicereqpage($id)
    {
        $service = Service::with('serviceType')->find($id);
        return view('website.servicereqpage',['id'=>$id,'service'=>$service]);
    }
    //servicereq
    public function servicereq()
    {
        $services = Service::all();
        return view('website.servicereq',['services'=>$services]);
    }
     //servicereqdetails
     public function servicereqdetails($id)
     {
         $services = Service::find($id);
         return view('website.servicereqdetails',['services'=>$services]);
     }
    //bloghome
    public function bloghome()
    {
        $blogs = Blog::all();
        return view('website.bloghome',['blogs'=>$blogs]);
    }
    //blogdetails
    public function blogdetails($id)
    {
        $blogs = Blog::where('id','!=',$id)->get();
        $blog = Blog::find($id);
        return view('website.blogdetails',['blogs'=>$blogs,'blog'=>$blog]);
    }
    //ourquality
    public function ourquality()
    {
        return view('website.ourquality');
    }
    //ourpartner
    public function ourpartner()
    {
        $partners = Partner::all();
        return view('website.ourpartner',['partners'=>$partners]);
    }








}
