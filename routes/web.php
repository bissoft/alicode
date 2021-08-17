<?php

use App\Http\Middleware\frontlogin;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::match(['get', 'post'], '/admin', [App\Http\Controllers\AdminController::class, 'login']);
//Admin Login
Route::match(['get', 'post'], '/admin', [App\Http\Controllers\AdminController::class, 'login']);
//Admin LogOut
Route::match(['get', 'post'], '/admin-logout', [App\Http\Controllers\AdminController::class, 'logout']);
Route::group(['middleware' => ['frontlogin']], function (){
Route::match(['get', 'post'], '/index', [App\Http\Controllers\IndexController::class, 'index']);
// Category Routes
Route::match(['get', 'post'], '/category/add', [App\Http\Controllers\CategoryController::class, 'addCategory']);
Route::match(['get', 'post'], '/category/view', [App\Http\Controllers\CategoryController::class, 'viewCategory']);
Route::match(['get', 'post'], '/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'editCategory']);
Route::match(['get', 'post'], '/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory']);
// Product Routes
Route::match(['get', 'post'], '/product/add', [App\Http\Controllers\ProductController::class, 'addProduct']);
Route::match(['get', 'post'], '/product/view', [App\Http\Controllers\ProductController::class, 'viewProduct']);
Route::match(['get', 'post'], '/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'editProduct']);
Route::match(['get', 'post'], '/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduct']);
Route::match(['get', 'post'], '/product/status', [App\Http\Controllers\ProductController::class, 'productStatus']);
Route::match(['get', 'post'], '/product/attributes/{id}', [App\Http\Controllers\ProductController::class, 'addAttributes']);
Route::match(['get', 'post'], '/product/view-attributes/{id}', [App\Http\Controllers\ProductController::class, 'viewAttributes']);
Route::match(['get', 'post'], '/product/edit-attributes/{id}', [App\Http\Controllers\ProductController::class, 'editAttributes']);
Route::match(['get', 'post'], '/product/delete-attributes/{id}', [App\Http\Controllers\ProductController::class, 'deleteAttributes']);
Route::match(['get', 'post'], '/product/add-images/{id}', [App\Http\Controllers\ProductController::class, 'addImages']);
Route::match(['get', 'post'], '/product/delete-alt-image/{id}', [App\Http\Controllers\ProductController::class, 'deleteImages']);
// Salon Routes
Route::match(['get', 'post'], '/salon/add', [App\Http\Controllers\SalonController::class, 'addSalon']);
Route::match(['get', 'post'], '/salon/view', [App\Http\Controllers\SalonController::class, 'viewSalon']);
Route::match(['get', 'post'], '/salon/edit/{id}', [App\Http\Controllers\SalonController::class, 'editSalon']);
Route::match(['get', 'post'], '/salon/delete/{id}', [App\Http\Controllers\SalonController::class, 'deleteSalon']);
Route::match(['get', 'post'], '/salon/status', [App\Http\Controllers\SalonController::class, 'salonStatus']);
//Deals Routes
Route::match(['get', 'post'], '/deal/add', [App\Http\Controllers\DealController::class, 'addDeal']);
Route::match(['get', 'post'], '/deal/view', [App\Http\Controllers\DealController::class, 'viewDeal']);
Route::match(['get', 'post'], '/deal/edit/{id}', [App\Http\Controllers\DealController::class, 'editDeal']);
Route::match(['get', 'post'], '/deal/delete/{id}', [App\Http\Controllers\DealController::class, 'deleteDeal']);
// Route::match(['get', 'post'], '/salon/status', [App\Http\Controllers\SalonController::class, 'salonStatus']);
//Freelancer Routes
Route::match(['get', 'post'], '/freelancer/add', [App\Http\Controllers\FreelancerController::class, 'addFreelancer']);
Route::match(['get', 'post'], '/freelancer/view', [App\Http\Controllers\FreelancerController::class, 'viewFreelancer']);
Route::match(['get', 'post'], '/freelancer/edit/{id}', [App\Http\Controllers\FreelancerController::class, 'editFreelancer']);
Route::match(['get', 'post'], '/freelancer/delete/{id}', [App\Http\Controllers\FreelancerController::class, 'deleteFreelancer']);
Route::match(['get', 'post'], '/freelancer/status', [App\Http\Controllers\FreelancerController::class, 'freelancerStatus']);
//Banner Routes
Route::match(['get', 'post'], '/banner/add', [App\Http\Controllers\BannerController::class, 'addBanner']);
Route::match(['get', 'post'], '/banner/view', [App\Http\Controllers\BannerController::class, 'viewBanner']);
Route::match(['get', 'post'], '/banner/edit/{id}', [App\Http\Controllers\BannerController::class, 'editBanner']);
Route::match(['get', 'post'], '/banner/delete/{id}', [App\Http\Controllers\BannerController::class, 'deleteBanner']);
// Orders Routes
Route::match(['get', 'post'], '/orders/view', [App\Http\Controllers\ProductController::class, 'viewOrders']);
Route::match(['get', 'post'], '/orders/view/{id}', [App\Http\Controllers\ProductController::class, 'viewOrdersDetail']);
// Pages Routes
Route::match(['get', 'post'], '/page/add', [App\Http\Controllers\PagesController::class, 'addPage']);
Route::match(['get', 'post'], '/page/view', [App\Http\Controllers\PagesController::class, 'pages']);

});
// Front Routes

//Route for Login Registration
// Route::get('/login-register',[App\Http\Controllers\UserController::class, 'userLoginRegister']);
Route::match(['get', 'post'], '/login-register', [App\Http\Controllers\UserController::class, 'userLoginRegister']);
//Route for add users registration
Route::match(['get', 'post'], '/user-register', [App\Http\Controllers\UserController::class, 'register']);
// Route::post('/user-register',[App\Http\Controllers\UserController::class, 'register']);
//Route for users login
Route::match(['get','post'],'/user-login',[App\Http\Controllers\UserController::class, 'login']);


    // Route::get('/user/{name}',[App\Http\Controllers\UserController::class, 'viewProfile']);


//Route for users logout
Route::get('/user-logout',[App\Http\Controllers\UserController::class, 'logout']);
Route::match(['get', 'post'], '/', [App\Http\Controllers\FrontController::class, 'index']);
// Front Products Route
Route::match(['get', 'post'], '/products/{id}', [App\Http\Controllers\ProductController::class, 'productDetail']);
//About Us
Route::match(['get', 'post'], '/about-us', [App\Http\Controllers\PagesController::class, 'aboutUs']);
// Route::domain('{subdomain}.'.config('app.short_url'))->group(function () {

Route::match(['get', 'post'], '/cart/add', [App\Http\Controllers\ProductController::class, 'addCart']);
Route::match(['get', 'post'], '/cart/view', [App\Http\Controllers\ProductController::class, 'viewCart']);
Route::match(['get', 'post'], '/cart/delete/{id}', [App\Http\Controllers\ProductController::class, 'deleteCart']);
//Rout For Cart Quantity
Route::match(['get', 'post'], '/cart/update-quantity/{id}/{quantity}', [App\Http\Controllers\ProductController::class, 'updateCartQuantity']);
Route::match(['get', 'post'], '/user/account', [App\Http\Controllers\UserController::class, 'accounts']);
Route::match(['get', 'post'], '/user/change-address/{id}', [App\Http\Controllers\UserController::class, 'changeAddress']);
Route::match(['get', 'post'], '/user/change-password', [App\Http\Controllers\UserController::class, 'changePassword']);
//Route For CheckOut
Route::match(['get', 'post'], '/cart/checkout/', [App\Http\Controllers\ProductController::class, 'checkOut']);
Route::match(['get', 'post'], '/thanks', [App\Http\Controllers\ProductController::class, 'thanks']);
// });
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
