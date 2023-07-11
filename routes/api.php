<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Admin\AppUserController;
use App\Http\Controllers\Admin\FavouriteController;
use App\Http\Controllers\Admin\AddressController;


use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\ResetPasswordController;

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

// Public routes
Route::post('/foody/register', 'AuthController@register');
Route::post('/foody/login', 'AuthController@login');
Route::get('/foody/getAllMedicalCases', 'Admin\MedicalCaseController@getAllMedicalCases');

Route::group(['middleware' => ['auth:api']], function () {

// User Logout
Route::post('/foody/logout', 'AuthController@logout');
Route::post('/foody/changePassword', 'AuthController@changePassword');
Route::post('/foody/updateUser', 'AuthController@update');
Route::get('/foody/getUser', 'AuthController@user');
// Password Reset
// Route::post('password/reset', 'Auth\ForgotPasswordController@sendResetLinkEmail');
// Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');

Route::post('/foody/storeMeal', 'Admin\MealController@store');
Route::get('/foody/getUserMeals', 'Admin\MealController@getUserMeals');
Route::get('/foody/getSuggestedMeals', 'Admin\MealController@getSuggestedMeals');
Route::delete('/foody/deleteMeal/{id}', 'Admin\MealController@deleteMeal');

Route::post('/foody/storeAddress', 'Admin\AddressController@store');
Route::get('/foody/getUserAddresses/{id}', 'Admin\AddressController@getUserAddresses');
Route::put('/foody/updateAddress/{id}', 'Admin\AddressController@update');
Route::delete('/foody/deleteAddress/{id}', 'Admin\AddressController@destroy');

Route::post('/foody/storeContact', 'Admin\ContactController@store');

Route::get('/foody/getAllCoupons', 'Admin\CouponController@getAllCoupons');

Route::get('/foody/getUserFavourites/{id}', 'Admin\FavouriteController@getUserFavourites');
Route::post('/foody/storeFavourite', 'Admin\FavouriteController@store');
Route::delete('/foody/deleteFavourite/{id}', 'Admin\FavouriteController@destroy');

Route::get('/foody/getAllFoodCategories', 'Admin\FoodCategoryController@getAllFoodCategories');

Route::get('/foody/getUserOrders/{id}', 'Admin\OrderController@getUserOrders');
Route::post('/foody/checkout', 'Admin\OrderController@store');

Route::get('/foody/getAllProductCategories', 'Admin\ProductCategoryController@getAllProductCategories');

Route::get('/foody/getAllFoodCategories', 'Admin\FoodCategoryController@getAllFoodCategories');

Route::get('/foody/getAllProducts', 'Admin\ProductController@getAllProducts');
Route::get('/foody/getProductsOfCategory/{id}', 'Admin\ProductController@getProductsOfCategory');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
});