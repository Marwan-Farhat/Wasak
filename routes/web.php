<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UiController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CallController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\VisionController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\AboutCompanyController;
use App\Http\Controllers\AdminstrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/',[UiController::class,'index']);



Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[AdminController::class,'dashboard']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/partners',[AdminController::class,'partners']);
    Route::post('/storePartners',[AdminController::class,'storePartners']);
    Route::post('/updateBanner',[BannerController::class,'updateBanner']);
    Route::get('/aboutCompany',[AdminController::class,'aboutCompany']);
    Route::post('/updateAboutCompany',[AboutCompanyController::class,'updateAboutCompany']);
    Route::get('/ourPartners',[AdminController::class,'ourPartners']);
    Route::post('/deletePartner',[PartnerController::class,'deletePartner']);
    Route::post('/updatePartner',[PartnerController::class,'updatePartner']);
    Route::get('/management',[AdminController::class,'management']);
    Route::Post('/storeTeam',[AdminstrationController::class,'storeTeam']);
    Route::Post('/deleteTeam',[AdminstrationController::class,'deleteTeam']);
    Route::Post('/updateTeam',[AdminstrationController::class,'updateTeam']);
    Route::get('/achievements-page',[AdminController::class,'achievements']);
    Route::post('/updateachievements',[AchievementController::class,'updateachievements']);
    Route::get('/counter-page',[AdminController::class,'counter']);
    Route::Post('/updateCounter',[CounterController::class,'updateCounter']);
    Route::get('/updateCounterStatus',[CounterController::class,'updateCounterStatus']);
    Route::get('/updateCounterStatusHide',[CounterController::class,'updateCounterStatusHide']);
    Route::get('/updateCounterStatusTeam',[CounterController::class,'updateCounterStatusTeam']);
    Route::get('/updateCounterStatusHideTeam',[CounterController::class,'updateCounterStatusHideTeam']);
    Route::get('/updateCounterStatusPartner',[CounterController::class,'updateCounterStatusPartner']);
    Route::get('/updateCounterStatusHidePartner',[CounterController::class,'updateCounterStatusHidePartner']);
    Route::get('/updateCounterStatusAch',[CounterController::class,'updateCounterStatusAch']);
    Route::get('/updateCounterStatusHideAch',[CounterController::class,'updateCounterStatusHideAch']);
    Route::get('/history',[AdminController::class,'history']);
    Route::post('/updateHistory',[HistoryController::class,'updateHistory']);
    Route::get('/vision',[AdminController::class,'vision']);
    Route::post('/updateVision',[VisionController::class,'updateVision']);
    Route::get('/goal',[AdminController::class,'goal']);
    Route::post('/updateGoal',[GoalController::class,'updateGoal']);
    Route::get('/rate-us',[AdminController::class,'rateus']);
    Route::post('/updateRateUs',[AboutController::class,'updateRateUs']);
    Route::get('/aboutus',[AdminController::class,'aboutus']);
    Route::post('/updateAboutUs',[AboutController::class,'updateAboutUs']);
    Route::get('/distinguished-team',[AdminController::class,'distinguishedteam']);
    Route::post('/updateDistinguishedTeam',[AboutController::class,'updateDistinguished']);
    Route::get('/services-req',[AdminController::class,'servicesreq']);
    Route::get('/editServiceRequest/{id}',[ServiceController::class,'viewServiceRequest']);
    Route::get('/recruitment',[AdminController::class,'recruitment']);
    Route::get('/contact',[AdminController::class,'contact']);
    Route::post('/updateCallUs',[CallController::class,'updateCallUs']);
    Route::get('/social-acc',[AdminController::class,'socialacc']);
    Route::post('/updateSocialAccount',[SocialController::class,'updateSocialAccount']);
    Route::get('/blog-page',[AdminController::class,'blogpage']);
    Route::post('/deleteBlog',[BlogController::class,'deleteBlog']);
    Route::post('/createBlog',[BlogController::class,'createBlog']);
    Route::post('/updateBlog',[BlogController::class,'updateBlog']);
    Route::get('/services-page',[AdminController::class,'servicespage']);
    Route::post('/updateServiceContent',[BannerController::class,'updateServiceContent']);
    Route::post('/deleteService',[ServiceController::class,'deleteService']);
    Route::post('/createService',[ServiceController::class,'createService']);
    Route::post('/updateService',[ServiceController::class,'updateService']);
    Route::Get('/logout',[LoginController::class,'logout']);
     //aboutUSPage
     Route::get('/aboutUSPage',[AboutController::class,'aboutUSPage']);
     Route::post('/addText',[AboutController::class,'addText']);
     Route::post('/updateText',[AboutController::class,'updateText']);
     Route::post('/deleteText',[AboutController::class,'deleteText']);
     //services-type
    Route::get('/services-type',[ServiceTypeController::class,'servicestype']);
    Route::post('/storeServiceType',[ServiceTypeController::class,'storeServiceType']);
    Route::post('/updateServiceType',[ServiceTypeController::class,'updateServiceType']);
   Route::post('/deleteServiceType',[ServiceTypeController::class,'deleteServiceType']);
   Route::get('/services-page/{id}',[AdminController::class,'servicespage']);
   //titles
   Route::get('/titles',[AdminController::class,'titles']);
   Route::post('/updateTitle',[AdminController::class,'updateTitle']);


});
Route::get('lang/{lang}',[LanguageController::class,'switchLang'])->name('lang.switch');
Route::get('/about-us',[UiController::class,'aboutus']);
Route::get('/our-services',[UiController::class,'ourservices']);
Route::get('/our-team',[UiController::class,'ourteam']);
Route::get('/contact-us',[UiController::class,'contactus']);
Route::get('/recruitment-page',[UiController::class,'recruitmentpage']);
Route::get('/service-req',[UiController::class,'servicereq']);
Route::get('/blog-home',[UiController::class,'bloghome']);
Route::get('/blog-details/{id}',[UiController::class,'blogdetails']);
Route::get('/our-quality',[UiController::class,'ourquality']);
Route::get('/our-partner',[UiController::class,'ourpartner']);
//storeTraining
Route::post('/storeTraining',[ServiceController::class,'storeTraining']);
//storeServiceReq
Route::post('/storeServiceReq',[ServiceController::class,'storeServiceReq']);
Route::get('/editService/{id}',[ServiceController::class,'editService']);
Route::get('/our-services-page/{id}',[UiController::class,'ourservicespage']);
//service-req-details
Route::get('/service-req-details/{id}',[UiController::class,'servicereqdetails']);
Route::get('/service-req-page/{id}',[UiController::class,'servicereqpage']);
require __DIR__.'/auth.php';

