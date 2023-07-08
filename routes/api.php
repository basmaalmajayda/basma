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

//بدهم راوتات لسه
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Admin\AppUserController;
use App\Http\Controllers\Admin\FavouriteController;
use App\Http\Controllers\Admin\AddressController;


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

Route::post('/foody/storeMeal', 'Admin\MealController@store');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
