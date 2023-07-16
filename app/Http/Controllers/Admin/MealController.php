<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meal;
use App\User;
use App\UserMeal;
use App\Ingredient;
use App\Food;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class MealController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = Meal::with('userMeals.user')->select('*')->withTrashed()->paginate(10);
        return view('admin.meals.index')->with('meals', $meals);
    }

    public function getUserMeals()
    {
        $userId = auth()->user()->id;
        $userMeals = UserMeal::select('*')->where('user_id', $userId)->get();
        $meals = [];
        foreach($userMeals as $userMeal){
            $m = Meal::with('ingredients')->select('*')->where('id', $userMeal->meal_id)->get();
            array_push($meals, $m);
        }

        if(count($meals) === 0){
            return response([
                'message' => 'There is no meals',
            ], 204);
        }else{
            return response([
                'message' => 'There are meals',
                'userMeals' => $meals,
            ], 200);
        }
    }

    public function getSuggestedMeals()
    {
        $userId = auth()->user()->id;
        $user = User::select('*')->where('id', $userId)->first();
        $userCase = $user->case_id;

        $userMeals = UserMeal::select('*')->get();
        $suggestedMeals = [];
        foreach($userMeals as $userMeal){
            $mealCase = $userMeal->user['case_id'];
            if($userCase == $mealCase){
                $meal = Meal::with('ingredients')->select('*')->where('id', $userMeal->meal_id)->first();
                array_push($suggestedMeals, $meal); 
            }
        }
        if(count($suggestedMeals) === 0){
            return response([
                'message' => 'There is no suggestedMeals',
                ], 204); // 204 means No Content
        }else{
            return response([
                'message' => 'There are suggestedMeals',
                'suggestedMeals' => $suggestedMeals,
                ], 200);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meal = Meal::with(['ingredients' => function ($query) {
            $query->orderBy('order_no', 'asc');
        }])->select('*')->withTrashed()->where('id', $id)->first();
        return view('admin.meals.details')->with('meal' , $meal); 
    }

    public function store(Request $request){
        // Validate request data
        $attrs = $request->validate([
            'name' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ingredients' => 'required|array',
            'ingredients.*.food_id' => 'required|integer|min:1',
            'ingredients.*.order_no' => 'required|integer|min:1',
            // 'ingredients.*.price' => 'required|numeric|min:0.01',
        ]);

        $userId = auth()->user()->id;
        // Create a new meal
        $meal = new Meal();
        $meal->name = $attrs['name'];
        // $filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		// $attrs['img']->move(public_path('meal_images'), $filename);
		// $meal->img = 'meal_images/' . $filename;
        
        $total = 0;
        $ingredients = $attrs['ingredients'];
        foreach ($ingredients as $ingredient) {
            $food = Food::find($ingredient['food_id']);
            $total += $food->price;
        }
        $meal->price = $total;
        $meal->user_id = $userId;
        $meal->save();

        $userMeal = new UserMeal();
        $userMeal->user_id = $userId;
        $userMeal->meal_id = $meal->id;
        $userMeal->save();
        
        foreach ($ingredients as $ingredientData) {
            $ingredient = new Ingredient([
                'food_id' => $ingredientData['food_id'],
                'order_no' => $ingredientData['order_no'],
            ]);
            $meal->ingredients()->save($ingredient);
        }

        return response([
            'message' => 'Meal created.',
            'meal' => $meal,
        ], 201); 
        // 201 status code means created
        // 200 means OK
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Meal::where('id', $id)->delete();
    	return redirect()->back();
    }

    public function deleteMeal($id)
    {
        $userId = auth()->user()->id;
        $status = UserMeal::where('meal_id', $id)->where('user_id', $userId)->delete();
        if($status){
            return response([
                'message' => 'Meal deleted.',
            ], 200); 
        }else{
            return response([
                'message' => 'Failed delete.',
            ], 400);  
        }
    }

    public function restore($id)
    {
        Meal::onlyTrashed()->where('id', $id)->restore();
    	return redirect()->back();
    }
}

