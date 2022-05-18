<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;
// use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\RazorpayController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  
Route::get('/', function () {
    return view('welcome');
});
  

  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/home/store',[UserController::class, 'blogPostStore'])->name('blogPostStore');
    Route::get('dashboard',[UserController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('edit_blog/{id}',[UserController::class, 'userEdit'])->name('user.edit.blog');
    Route::post('post/{id}',[UserController::class, 'userBlogPost'])->name('blogPostUpdate');
    Route::get('delete/{id}',[UserController::class, 'delete'])->name('blogPostDelete');
});
 


/*------------------------------------------
--------------------------------------------
All Admin Routes List open
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('edit/{id}',[HomeController::class, 'adminedit'])->name('admin.edit.blog');
    Route::post('edit/update/{id}',[HomeController::class,'update'])->name('admin.update');
    Route::get('delete/{id}',[HomeController::class,'delete'])->name('admin.delete');
    Route::get('statusCheck/{id}',[HomeController::class,'statusCheckBlog'])->name('admin.status');
    Route::get('testing',[HomeController::class,'testing'])->name('testing');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// amit testing 

Route::get('stripe-payment', [StripeController::class, 'handleGet']);
Route::post('/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment');

Route::get('payment', [RazorpayPaymentController::class, 'index']);
Route::post('payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');


// 

Route::get('product', [RazorpayController::class, 'razorpayProduct']);
Route::get('paysuccess', [RazorpayController::class, 'razorPaySuccess']);
Route::get('razor-thank-you', [RazorpayController::class, 'RazorThankYou']);

Route::get('otp-verify',[HomeController::class,'otpVerify'])->name('otp_verify');
Route::get('otp-verification/{validtoken}/{email}',[HomeController::class,'otpVerification'])->name('otp_verification');
Route::post('otp-verification/',[HomeController::class,'otpSubmit'])->name('otp.submit');
Route::get('access-denied',[HomeController::class,'acces_denied'])->name('access.denied');