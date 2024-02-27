<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerListController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariationsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Auth::routes();

// frontend routes
Route::get('/',[App\Http\Controllers\FrontendController::class,'index'])->name('index');
Route::get('/about',[App\Http\Controllers\AboutPageController::class,'about'])->name('about');
Route::get('/user/register',[App\Http\Controllers\UserRegisterController::class,'user_register'])->name('user_register');
Route::post('/user/account/register',[App\Http\Controllers\UserRegisterController::class,'user_account_register'])->name('user_account_register');
Route::post('/user/account/verify',[App\Http\Controllers\UserRegisterController::class,'user_account_verify'])->name('user_account_verify');
Route::get('/user/otp/verify',[App\Http\Controllers\FrontendController::class,'user_otp_verify'])->name('user_otp_verify');
Route::post('/user/login',[App\Http\Controllers\UserRegisterController::class,'user_login'])->name('user_login');
Route::get('/user/dashboard',[App\Http\Controllers\UserDashboardController::class,'user_dashboard'])->name('user_dashboard');
Route::get('/contact/page',[App\Http\Controllers\ContactPageController::class,'contact_page'])->name('contact');
Route::post('/contact/page/form',[App\Http\Controllers\ContactPageController::class,'contact_page_form'])->name('contact_form');
Route::get('/product/view/{id}',[\App\Http\Controllers\ProductDetailsPageController::class,'product_view'])->name('product_view');
Route::get('/cart/view',[\App\Http\Controllers\CartController::class,'cart_view'])->name('cart_view');
Route::get('user/verify/page',[\App\Http\Controllers\UserDashboardController::class,"verify_page"])->name('verify_page');
Route::post('user/verify/',[\App\Http\Controllers\UserDashboardController::class,"verify_user"])->name('verify_user');
Route::post('user/account/details/update',[\App\Http\Controllers\UserDashboardController::class,"update_details"])->name('update_details');
Route::post('user/account/details/update/verify',[\App\Http\Controllers\UserDashboardController::class,"update_verify"])->name('update_verify');
Route::post('user/account/password/change',[\App\Http\Controllers\UserDashboardController::class,"password_change"])->name('password_change');
Route::post('user/account/address',[\App\Http\Controllers\UserDashboardController::class,"address_update"])->name('address_update');
Route::post('add/review/{product_id}',[\App\Http\Controllers\ProductDetailsPageController::class,"add_review"])->name('add_review');

// dashboard routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile_page'])->name('profile_page');
Route::post('/profile/photo/upload',[App\Http\Controllers\ProfileController::class, 'profile_photo_upload']);
Route::post('/password/update',[App\Http\Controllers\ProfileController::class, 'password_update']);
Route::post('/add/phone/number',[App\Http\Controllers\ProfileController::class, 'phone_number_add']);
Route::get('/verify/phone/number',[App\Http\Controllers\ProfileController::class, 'phone_number_verify']);
Route::post('/verify/otp',[App\Http\Controllers\ProfileController::class, 'otp_verify']);
Route::get('/update/phone/number',[App\Http\Controllers\ProfileController::class, 'update_phone_number']);
Route::post('/products',[App\Http\Controllers\ProductController::class, 'products_page'])->name('products');
Route::get('/variation/select',[App\Http\Controllers\VariationsController::class, 'variation_select'])->name('variation_select');
Route::get('/variation/product/{id}',[App\Http\Controllers\VariationsController::class, 'variation_select_view'])->name('variation_select_view');
Route::get('/variations/{id}',[App\Http\Controllers\VariationsController::class, 'variations'])->name('variations');
Route::get('/cupons',[App\Http\Controllers\CuponsController::class, 'index'])->name('cupons');
Route::get('/about/us/',[App\Http\Controllers\AboutUsController::class, 'company_history_view'])->name('company_history_view');
Route::post('/add/company/history',[App\Http\Controllers\AboutUsController::class, 'add_history'])->name('add_history');
// Route::post('/add/cupons',[App\Http\Controllers\CuponsController::class, 'add_cupons'])->name('add_cupons');


// category route package
Route::resource('category', CategoryController::class);
Route::resource('admins', UserController::class);
Route::resource('customers', CustomerListController::class);
Route::resource('products', ProductsController::class);
Route::resource('services', ServicesController::class);
// Route::resource('variation', VariationsController::class);
