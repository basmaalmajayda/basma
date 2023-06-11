<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCouponController;
use App\Http\Controllers\Admin\AdminMealController;
use App\Http\Controllers\Admin\AdminMessageController;
use App\Http\Controllers\Admin\AdminNotificationController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminAlternativeController;
use App\Http\Controllers\Admin\AdminForbiddenController;
use App\Http\Controllers\Admin\AdminFoodController;
use App\Http\Controllers\Admin\AdminDiseaseController;
use App\Http\Controllers\Admin\AdminProductController;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;

// use Nette\Utils\Image;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', 'AdminController@index');
Route::get('/foody/profile', 'AdminController@profile');

Route::get('/foody/categories', 'Admin\AdminCategoryController@index');
Route::get('/foody/addCategory', 'Admin\AdminCategoryController@create');
// Route::get('/', 'Admin\AdminCategoryController@store');
Route::get('/foody/editCategory', 'Admin\AdminCategoryController@edit');
// Route::get('/', 'Admin\AdminCategoryController@update');
// Route::get('/', 'Admin\AdminCategoryController@destroy');
// Route::get('/', 'Admin\AdminCategoryController@restore');

Route::get('/foody/challenges', 'Admin\AdminCouponController@index');
Route::get('/foody/addChallenge', 'Admin\AdminCouponController@create');
// Route::get('/', 'Admin\AdminCouponController@store');
Route::get('/foody/editChallenge', 'Admin\AdminCouponController@edit');
// Route::get('/', 'Admin\AdminCouponController@update');
// Route::get('/', 'Admin\AdminCouponController@destroy');
// Route::get('/', 'Admin\AdminCouponController@restore');

Route::get('/foody/meals', 'Admin\AdminMealController@index');
Route::get('/foody/addMeal', 'Admin\AdminMealController@create');
// Route::get('/', 'Admin\AdminMealController@store');
Route::get('/foody/editMeal', 'Admin\AdminMealController@edit');
// Route::get('/', 'Admin\AdminMealController@update');
// Route::get('/', 'Admin\AdminMealController@destroy');
// Route::get('/', 'Admin\AdminMealController@restore');

Route::get('/foody/messages', 'Admin\AdminMessageController@index');
// Route::get('/', 'Admin\AdminMessageController@create');
// Route::get('/', 'Admin\AdminMessageController@store');
// Route::get('/', 'Admin\AdminMessageController@edit');
// Route::get('/', 'Admin\AdminMessageController@update');
// Route::get('/', 'Admin\AdminMessageController@destroy');
// Route::get('/', 'Admin\AdminMessageController@restore');

// Route::get('/', 'Admin\AdminNotificationController@index');
// Route::get('/', 'Admin\AdminNotificationController@create');
// Route::get('/', 'Admin\AdminNotificationController@store');
// Route::get('/', 'Admin\AdminNotificationController@edit');
// Route::get('/', 'Admin\AdminNotificationController@update');
// Route::get('/', 'Admin\AdminNotificationController@destroy');
// Route::get('/', 'Admin\AdminNotificationController@restore');

Route::get('/foody/orders', 'Admin\AdminOrderController@index');
Route::get('/foody/orderDetails', 'Admin\AdminOrderController@orderDetails');
// Route::get('/', 'Admin\AdminOrderController@create');
// Route::get('/', 'Admin\AdminOrderController@store');
// Route::get('/', 'Admin\AdminOrderController@edit');
// Route::get('/', 'Admin\AdminOrderController@update');
// Route::get('/', 'Admin\AdminOrderController@destroy');
// Route::get('/', 'Admin\AdminOrderController@restore');

Route::get('/foody/products', 'Admin\AdminProductController@index');
Route::get('/foody/addProduct', 'Admin\AdminProductController@create');
// Route::get('/', 'Admin\AdminProductController@store');
Route::get('/foody/editProduct', 'Admin\AdminProductController@edit');
// Route::get('/', 'Admin\AdminProductController@update');
// Route::get('/', 'Admin\AdminProductController@destroy');
// Route::get('/', 'Admin\AdminProductController@restore');

Route::get('/foody/diseases', 'Admin\AdminDiseaseController@index');
Route::get('/foody/addDisease', 'Admin\AdminDiseaseController@create');
// Route::get('/', 'Admin\AdminDiseaseController@store');
Route::get('/foody/editDisease', 'Admin\AdminDiseaseController@edit');
// Route::get('/', 'Admin\AdminDiseaseController@update');
// Route::get('/', 'Admin\AdminDiseaseController@destroy');
// Route::get('/', 'Admin\AdminDiseaseController@restore');

Route::get('/foody/alternatives', 'Admin\AdminAlternativeController@index');
Route::get('/foody/addAlternative', 'Admin\AdminAlternativeController@create');
// Route::get('/', 'Admin\AdminAlternativeController@store');
Route::get('/foody/editAlternative', 'Admin\AdminAlternativeController@edit');
// Route::get('/', 'Admin\AdminAlternativeController@update');
// Route::get('/', 'Admin\AdminAlternativeController@destroy');
// Route::get('/', 'Admin\AdminAlternativeController@restore');

Route::get('/foody/forbidden', 'Admin\AdminForbiddenController@index');
Route::get('/foody/addForbidden', 'Admin\AdminForbiddenController@create');
// Route::get('/', 'Admin\AdminForbiddenController@store');
Route::get('/foody/editForbidden', 'Admin\AdminForbiddenController@edit');
// Route::get('/', 'Admin\AdminForbiddenController@update');
// Route::get('/', 'Admin\AdminForbiddenController@destroy');
// Route::get('/', 'Admin\AdminForbiddenController@restore');


// Route::get('/', function () {
//     return view('admin.dashboard');
// })->name('dashboard.index');

