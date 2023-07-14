<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FoodCategoryController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\MealController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AlternativeController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\MedicalCaseController;
use App\Http\Controllers\Admin\ProductController;

//بدهم راوتات لسه
use App\Http\Controllers\Admin\AddressController;

// use Nette\Utils\Image;
use App\Http\Controllers\Controller;


// Public routes

Route::post('/login', 'Admin\AuthController@login')->name('login');
Route::get('/login', 'Admin\AuthController@loginForm');

Route::group(['middleware' => ['auth:admin']], function () {

Route::get('/foody/createAdmin', 'Admin\AuthController@registerForm');
Route::post('/foody/register', 'Admin\AuthController@register');

Route::post('/foody/logout', 'Admin\AuthController@logout');
Route::post('/foody/changePassword', 'Admin\AuthController@changePassword');
Route::post('/foody/updateAdmin', 'Admin\AuthController@update');
Route::get('/foody/adminProfile', 'Admin\AdminController@admin');

Route::get('/', 'Admin\AdminController@index');

Route::get('/foody/foodCategories', 'Admin\FoodCategoryController@index');
Route::get('/foody/createFoodCategory', 'Admin\FoodCategoryController@create');
Route::post('/foody/storeFoodCategory', 'Admin\FoodCategoryController@store');
Route::get('/foody/editFoodCategory/{id}', 'Admin\FoodCategoryController@edit');
Route::get('/foody/foodCategoryDetails/{id}', 'Admin\FoodCategoryController@show');
Route::post('/foody/updateFoodCategory', 'Admin\FoodCategoryController@update');
Route::get('/foody/destroyFoodCategory/{id}', 'Admin\FoodCategoryController@destroy');
Route::get('/foody/restoreFoodCategory/{id}', 'Admin\FoodCategoryController@restore');

Route::get('/foody/productCategories', 'Admin\ProductCategoryController@index');
Route::get('/foody/createProductCategory', 'Admin\ProductCategoryController@create');
Route::post('/foody/storeProductCategory', 'Admin\ProductCategoryController@store');
Route::get('/foody/editProductCategory/{id}', 'Admin\ProductCategoryController@edit');
Route::post('/foody/updateProductCategory', 'Admin\ProductCategoryController@update');
Route::get('/foody/destroyProductCategory/{id}', 'Admin\ProductCategoryController@destroy');
Route::get('/foody/restoreProductCategory/{id}', 'Admin\ProductCategoryController@restore');

Route::get('/foody/foods', 'Admin\FoodController@index');
Route::get('/foody/createFood', 'Admin\FoodController@create');
Route::post('/foody/storeFood', 'Admin\FoodController@store');
Route::get('/foody/editFood/{id}', 'Admin\FoodController@edit');
Route::post('/foody/updateFood', 'Admin\FoodController@update');
Route::get('/foody/destroyFood/{id}', 'Admin\FoodController@destroy');
Route::get('/foody/restoreFood/{id}', 'Admin\FoodController@restore');

Route::get('/foody/coupons', 'Admin\CouponController@index');
Route::get('/foody/createCoupon', 'Admin\CouponController@create');
Route::post('/foody/storeCoupon', 'Admin\CouponController@store');
Route::get('/foody/editCoupon/{id}', 'Admin\CouponController@edit');
Route::post('/foody/updateCoupon', 'Admin\CouponController@update');
Route::get('/foody/destroyCoupon/{id}', 'Admin\CouponController@destroy');
Route::get('/foody/restoreCoupon/{id}', 'Admin\CouponController@restore');

Route::get('/foody/meals', 'Admin\MealController@index');
Route::get('/foody/mealDetails/{id}', 'Admin\MealController@show');
Route::get('/foody/destroyMeal/{id}', 'Admin\MealController@destroy');
Route::get('/foody/restoreMeal/{id}', 'Admin\MealController@restore');

Route::get('/foody/messages', 'Admin\ContactController@index');
Route::get('/foody/messageDetails/{id}', 'Admin\ContactController@show');
Route::get('/foody/destroyMessage/{id}', 'Admin\ContactController@destroy');
Route::get('/foody/restoreMessage/{id}', 'Admin\ContactController@restore');

Route::get('/foody/notifications', 'Admin\NotificationController@index');
Route::get('/foody/createNotification', 'Admin\NotificationController@create');
Route::post('/foody/storeNotification', 'Admin\NotificationController@store');
Route::get('/foody/editNotification/{id}', 'Admin\NotificationController@edit');
Route::post('/foody/updateNotification', 'Admin\NotificationController@update');
Route::get('/foody/destroyNotification/{id}', 'Admin\NotificationController@destroy');
Route::get('/foody/restoreNotification/{id}', 'Admin\NotificationController@restore');

Route::get('/foody/orders', 'Admin\OrderController@index');
Route::get('/foody/orderDetails/{id}', 'Admin\OrderController@show');
Route::get('/foody/updateOrderStatus/{id}', 'Admin\OrderController@updateOrderStatus');
Route::get('/foody/destroyOrder/{id}', 'Admin\OrderController@destroy');
Route::get('/foody/restoreOrder/{id}', 'Admin\OrderController@restore');

Route::get('/foody/products', 'Admin\ProductController@index');
Route::get('/foody/productDetails/{id}', 'Admin\ProductController@show');
Route::get('/foody/createProduct', 'Admin\ProductController@create');
Route::post('/foody/storeProduct', 'Admin\ProductController@store');
Route::get('/foody/editProduct/{id}', 'Admin\ProductController@edit');
Route::post('/foody/updateProduct', 'Admin\ProductController@update');
Route::get('/foody/destroyProduct/{id}', 'Admin\ProductController@destroy');
Route::get('/foody/restoreProduct/{id}', 'Admin\ProductController@restore');

Route::get('/foody/diseases', 'Admin\MedicalCaseController@index');
Route::get('/foody/createDisease', 'Admin\MedicalCaseController@create');
Route::post('/foody/storeDisease', 'Admin\MedicalCaseController@store');
Route::get('/foody/editDisease/{id}', 'Admin\MedicalCaseController@edit');
Route::post('/foody/updateDisease', 'Admin\MedicalCaseController@update');
Route::get('/foody/destroyDisease/{id}', 'Admin\MedicalCaseController@destroy');
Route::get('/foody/restoreDisease/{id}', 'Admin\MedicalCaseController@restore');

Route::get('/foody/alternatives', 'Admin\AlternativeController@index');
Route::get('/foody/createAlternative', 'Admin\AlternativeController@create');
Route::post('/foody/storeAlternative', 'Admin\AlternativeController@store');
Route::get('/foody/editAlternative/{id}', 'Admin\AlternativeController@edit');
Route::post('//foody/updateAlternative', 'Admin\AlternativeController@update');
Route::get('//foody/destroyAlternative/{id}', 'Admin\AlternativeController@destroy');
Route::get('//foody/restoreAlternative/{id}', 'Admin\AlternativeController@restore');


// Route::get('/', function () {
//     return view('admin.dashboard');
// })->name('dashboard.index');

});
