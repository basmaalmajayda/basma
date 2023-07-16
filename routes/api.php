<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FavouriteController;
use App\Http\Controllers\Admin\AddressController;

use App\Http\Controllers\AuthController;

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

Route::middleware('auth:api')->group(function () {

Route::post('/foody/logout', 'AuthController@logout');
Route::post('/foody/changePassword', 'AuthController@changePassword');
Route::post('/foody/updateUser', 'AuthController@update');
Route::get('/foody/getUser', 'AuthController@user');

Route::post('/foody/storeMeal', 'Admin\MealController@store');
Route::get('/foody/getUserMeals', 'Admin\MealController@getUserMeals');
Route::get('/foody/getSuggestedMeals', 'Admin\MealController@getSuggestedMeals');
Route::delete('/foody/deleteMeal/{id}', 'Admin\MealController@deleteMeal');

Route::post('/foody/storeAddress', 'Admin\AddressController@store');
Route::get('/foody/getUserAddresses', 'Admin\AddressController@getUserAddresses');
Route::post('/foody/updateAddress/{id}', 'Admin\AddressController@update');
Route::delete('/foody/deleteAddress/{id}', 'Admin\AddressController@destroy');

Route::post('/foody/storeContact', 'Admin\ContactController@store');

Route::get('/foody/getAllCoupons', 'Admin\CouponController@getAllCoupons');

Route::get('/foody/getUserFavourites', 'Admin\FavouriteController@getUserFavourites');
Route::get('/foody/getUserFavouritesCustom', 'Admin\FavouriteController@getUserFavouritesCustom');
Route::post('/foody/storeFavourite', 'Admin\FavouriteController@store');
Route::delete('/foody/deleteFavourite/{id}', 'Admin\FavouriteController@destroy');

Route::get('/foody/getAllFoodCategories', 'Admin\FoodCategoryController@getAllFoodCategories');
Route::get('/foody/getAllFoods', 'Admin\FoodController@getAllFoods');

Route::get('/foody/getUserForbiddensAndAlternatives', 'Admin\AlternativeController@getUserForbiddensAndAlternatives');
Route::get('/foody/getAllFoods', 'Admin\FoodController@getAllFoods');

Route::get('/foody/getUserOrders', 'Admin\OrderController@getUserOrders');
Route::post('/foody/checkout', 'Admin\OrderController@store');
Route::delete('/foody/deleteOrder/{id}', 'Admin\OrderController@deleteOrder');

Route::get('/foody/getAllProductCategories', 'Admin\ProductCategoryController@getAllProductCategories');
Route::get('/foody/getProductsOfCategory/{id}', 'Admin\ProductController@getProductsOfCategory');
Route::get('/foody/getAllProducts', 'Admin\ProductController@getAllProducts');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
});