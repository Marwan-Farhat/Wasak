<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UiController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CallController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\VisionController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\AboutCompanyController;
use App\Http\Controllers\AdminstrationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);
// Route::middleware('check.api.auth')->group(function () {
Route::post('/refreshToken', [LoginController::class, 'refreshToken']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/updateProfile', [LoginController::class, 'updateProfile']);
Route::post('/changePassword', [LoginController::class, 'changePassword']);
Route::get('/loginCheck', [LoginController::class, 'loginCheck']);
//AboutCompany
Route::post('/updateAboutCompany',[AboutCompanyController::class,'updateAboutCompany']);
Route::get('/viewAboutCompany',[AboutCompanyController::class,'viewAboutCompany']);
//History

Route::get('/viewHistory',[HistoryController::class,'viewHistory']);
Route::post('/updateHistoryStatus',[HistoryController::class,'updateStatus']);
//vision

Route::get('/viewVision',[VisionController::class,'viewVision']);
//goal

Route::get('/viewGoal',[GoalController::class,'viewGoal']);
//Partner
Route::post('/createPartner',[PartnerController::class,'createPartner']);
Route::get('/viewAllPartner',[PartnerController::class,'viewAllPartner']);
Route::get('/editPartner/{id}',[PartnerController::class,'editPartner']);
Route::post('/updatePartner',[PartnerController::class,'updatePartner']);
Route::delete('/deletePartner/{id}',[PartnerController::class,'deletePartner']);
Route::post('/updatePinPartner',[PartnerController::class,'updatePin']);


//Administration
Route::post('/createAdministration',[AdminstrationController::class,'createAdministration']);
Route::get('/viewAllAdministration',[AdminstrationController::class,'viewAllAdministration']);
Route::get('/editAdministration/{id}',[AdminstrationController::class,'editAdministration']);
Route::post('/updateAdministration',[AdminstrationController::class,'updateAdministration']);
Route::delete('/deleteAdministration/{id}',[AdminstrationController::class,'deleteAdministration']);
Route::post('/updatePinTeam',[AdminstrationController::class,'updatePin']);
Route::post('/updateStatusTeam',[AdminstrationController::class,'updateStatus']);

//Achievements
Route::post('/updateAchievement',[AchievementController::class,'updateAchievement']);
Route::get('/viewAchievements',[AchievementController::class,'viewAchievements']);
//Counter
Route::post('/updateCounter',[CounterController::class,'updateCounter']);
Route::get('/viewCounter',[CounterController::class,'viewCounter']);
//Blog

Route::get('/viewAllBlogs',[BlogController::class,'viewAllBlogs']);
Route::get('/editBlog/{id}',[BlogController::class,'editBlog']);


Route::post('/updateBlogPin',[BlogController::class,'updatePin']);

//Service

Route::get('/viewAllServices',[ServiceController::class,'viewAllServices']);



Route::post('/updatePinSevices',[ServiceController::class,'updatePin']);
Route::post('/updateStatusSevices',[ServiceController::class,'updateStatus']);

//Service Requests
Route::get('/viewAllServiceRequests',[ServiceController::class,'viewAllServiceRequests']);

//Employment And Training Applications
Route::get('/viewAllEmploymentAndTrainingApplications',[ServiceController::class,'viewAllEmploymentAndTrainingApplications']);
Route::get('/viewEmploymentAndTrainingApplications/{id}',[ServiceController::class,'viewEmploymentAndTrainingApplications']);
//Social

Route::get('/viewSocialAccount',[SocialController::class,'viewSocialAccount']);
//Call us

Route::get('/viewCallUs',[CallController::class,'viewCallUs']);
//Banner Image
Route::post('/updateBanner',[BannerController::class,'updateBanner']);
Route::get('/viewBanner',[BannerController::class,'viewBanner']);
//About us

Route::get('/viewAboutUs',[AboutController::class,'viewAboutUs']);
//Rate us

Route::get('/viewRateUs',[AboutController::class,'viewRateUs']);
//Distinguished Team

Route::get('/viewDistinguishedTeam',[AboutController::class,'viewDistinguishedTeam']);
//serviceContent

Route::get('/viewServiceContent',[BannerController::class,'viewServiceContent']);
Route::post('/updateModuleStatus',[PartnerController::class,'updateModuleStatus']);


// });
//sendServiceRequest
Route::post('/sendServiceRequest',[ServiceController::class,'sendServiceRequest']);
//sendEmploymentTrainingApp
Route::post('/sendEmploymentTrainingApp',[ServiceController::class,'sendEmploymentTrainingApp']);
//getAboutCompany
Route::get('/getAboutCompany',[UiController::class,'getAboutCompany']);
//Achievements
Route::get('/getAchievements',[UiController::class,'getAchievements']);
//getCustomerAndVisitor
Route::get('/getCustomerAndVisitor',[UiController::class,'getCustomerAndVisitor']);
//getAllServices
Route::get('/getAllServices',[UiController::class,'getAllServices']);
//getPartners
Route::get('/getPartners',[UiController::class,'getPartners']);
//getCallUs
Route::get('/getCallUs',[UiController::class,'getCallUs']);
//getAllBlogs
Route::get('/getAllBlogs',[UiController::class,'getAllBlogs']);
//getVision
Route::get('/getVision',[UiController::class,'getVision']);
//getGoals
Route::get('/getGoal',[UiController::class,'getGoals']);
//getOurHistory
Route::get('/getOurHistory',[UiController::class,'getOurHistory']);
//getBanner
Route::get('/getBanner',[UiController::class,'getBanner']);
//getAboutUs
Route::get('/getAboutUs',[UiController::class,'getAboutUs']);
//getDistinguishedTeam
Route::get('/getDistinguishedTeam',[UiController::class,'getDistinguishedTeam']);
//getRateUs
Route::get('/getRateUs',[UiController::class,'getRateUs']);
//getAllAdministration
Route::get('/getAllAdministration',[UiController::class,'getAllAdministration']);
//getBlog
Route::get('/getBlog/{id}',[UiController::class,'getBlog']);
//getHomePage
Route::get('/getHomePage',[UiController::class,'getHomePage']);
//getServiceDetails
Route::get('/getServiceDetails/{id}',[UiController::class,'getServiceDetails']);
//getServiceDetails
Route::get('/getSocialLink',[UiController::class,'getSocialLink']);
//getAboutPage
Route::get('/getAboutPage',[UiController::class,'getAboutPage']);

Route::post('/updateStatusPartner',[PartnerController::class,'updatePin']);

//editText
Route::get('/editText/{id}',[AboutController::class,'editText']);
//updatePinText
Route::post('/updatePinText',[AboutController::class,'updatePinText']);
//updatePinSevicesType
Route::post('/updatePinSevicesType',[ServiceTypeController::class,'updatePinSevicesType']);
//editServiceType
//editServiceType
Route::Get('/editServiceType/{id}',[ServiceTypeController::class,'editServiceType']);
Route::post('/updatePinSevicesType',[ServiceTypeController::class,'updatePinSevicesType']);









