<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\FoodCategoryController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\MealController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AlternativeController;
use App\Http\Controllers\Admin\ForbiddenController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\MedicalCaseController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;

// use Nette\Utils\Image;
use App\Http\Controllers\Controller;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'AdminController@index');
Route::get('/foody/adminProfile', 'AdminController@profile');

Route::get('/foody/foodCategories', 'Admin\FoodCategoryController@index');
Route::get('/foody/createFoodCategory', 'Admin\FoodCategoryController@create');
Route::post('/foody/storeFoodCategory', 'Admin\FoodCategoryController@store');
Route::get('/foody/editFoodCategory/{id}', 'Admin\FoodCategoryController@edit');
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
Route::get('/foody/deleteFood/{id}', 'Admin\FoodController@destroy');
Route::get('/foody/restoreFood/{id}', 'Admin\FoodController@restore');

Route::get('/foody/challenges', 'Admin\CouponController@index');
Route::get('/foody/createChallenge', 'Admin\CouponController@create');
Route::post('/foody/storeChallenge', 'Admin\CouponController@store');
Route::get('/foody/editChallenge/{id}', 'Admin\CouponController@edit');
Route::post('/foody/updateChallenge', 'Admin\CouponController@update');
Route::get('/foody/destroyChallenge/{id}', 'Admin\CouponController@destroy');
Route::get('/foody/restoreChallenge/{id}', 'Admin\CouponController@restore');

Route::get('/foody/meals', 'Admin\MealController@index');
Route::get('/foody/createMeal', 'Admin\MealController@create');
Route::post('/foody/storeMeal', 'Admin\MealController@store');
Route::get('/foody/editMeal/{id}', 'Admin\MealController@edit');
Route::post('/foody/updateMeal', 'Admin\MealController@update');
Route::get('/foody/destroyMeal/{id}', 'Admin\MealController@destroy');
Route::get('/foody/restoreMeal/{id}', 'Admin\MealController@restore');

Route::get('/foody/messages', 'Admin\MessageController@index');
// Route::get('/', 'Admin\MessageController@create');
// Route::post('/', 'Admin\MessageController@store');
// Route::get('/', 'Admin\MessageController@edit');
// Route::post('/', 'Admin\MessageController@update');
Route::get('/foody/destroyMessage/{id}', 'Admin\MessageController@destroy');
Route::get('/foody/restoreMessage/{id}', 'Admin\MessageController@restore');

Route::get('/foody/notifications', 'Admin\NotificationController@index');
Route::get('/foody/createNotification', 'Admin\NotificationController@create');
Route::post('/foody/storeNotification', 'Admin\NotificationController@store');
Route::get('/foody/editNotification/{id}', 'Admin\NotificationController@edit');
Route::post('/foody/updateNotification', 'Admin\NotificationController@update');
Route::get('/foody/destroyNotification/{id}', 'Admin\NotificationController@destroy');
Route::get('/foody/restoreNotification/{id}', 'Admin\NotificationController@restore');

Route::get('/foody/orders', 'Admin\OrderController@index');
Route::get('/foody/orderDetails/{id}', 'Admin\OrderController@orderDetails');
// Route::get('/', 'Admin\OrderController@create');
// Route::post('/', 'Admin\OrderController@store');
// Route::get('/', 'Admin\OrderController@edit');
// Route::post('/', 'Admin\OrderController@update');
Route::get('/foody/destroyOrder/{id}', 'Admin\OrderController@destroy');
Route::get('/foody/restoreOrder/{id}', 'Admin\OrderController@restore');

Route::get('/foody/products', 'Admin\ProductController@index');
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
Route::get('//foody/updateAlternative/{id}', 'Admin\AlternativeController@destroy');
Route::get('//foody/restoreAlternative/{id}', 'Admin\AlternativeController@restore');

Route::get('/foody/forbiddens', 'Admin\ForbiddenController@index');
Route::get('/foody/createForbidden', 'Admin\ForbiddenController@create');
Route::post('/foody/storeForbidden', 'Admin\ForbiddenController@store');
Route::get('/foody/editForbidden/{id}', 'Admin\ForbiddenController@edit');
Route::post('//foody/updateForbidden', 'Admin\ForbiddenController@update');
Route::get('//foody/updateForbidden/{id}', 'Admin\ForbiddenController@destroy');
Route::get('//foody/restoreForbidden/{id}', 'Admin\ForbiddenController@restore');


// Route::get('/', function () {
//     return view('admin.dashboard');
// })->name('dashboard.index');


