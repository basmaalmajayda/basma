<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meal;
use App\User;
use App\UserMeal;
use App\Ingredient;
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
        $userMeals = UserMeal::select('*')->where('user_id', auth()->user()->id)->get();
        $meals = [];
        foreach($userMeals as $uuserMeal){
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
        $user = User::select('*')->where('id', auth()->user()->id)->first();
        $userCase = $user->case_id;

        $userMeals = UserMeal::select('*')->get();
        $suggestedMeals = [];
        foreach($userMeals as $userMeal){
            $mealCase = $userMeal->user['case_id'];
            if($userCase == $mealCase){
                $meal = Meal::select('*')->where('id', $userMeal->meal_id)->first();
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
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ingredients' => 'required|array',
            'ingredients.*.food_id' => 'required|integer|min:1',
            'ingredients.*.order_no' => 'required|integer|min:1',
            'ingredients.*.price' => 'required|numeric|min:0.01',
        ]);

    
        // Create a new meal
        $meal = new Meal();
        $meal->name = $attrs['name'];
        $filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$attrs['img']->move(public_path('meal_images'), $filename);
		$meal->img = 'meal_images/' . $filename;
        
        $total = 0;
        foreach ($attrs['ingredients'] as $ingredientData) {
            $total += $ingredientData['price'];
        }
        $meal->price = $total;
        $meal->save();

        $userMeal = new UserMeal();
        $userMeal->user_id = auth()->user()->id;
        $userMeal->meal_id = $meal->id;

        $ingredients = $attrs['ingredients'];
        foreach ($ingredients as $ingredientData) {
            $ingredient = new Ingredient();
            $ingredient->meal_id = $meal->id;
            $ingredient->food_id = $ingredientData['food_id'];
            $ingredient->order_no = $ingredientData['order_no'];
            $ingredient->save();
        }

        return response([
            'message' => 'Meal created.',
            'meal' => $meal,
        ], 200); 
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
        UserMeal::where('meal_id', $id)->where('user_id', auth()->user()->id)->delete();
    	return response([
            'message' => 'Meal deleted.',
        ], 200); 
    }

    public function restore($id)
    {
        Meal::onlyTrashed()->where('id', $id)->restore();
    	return redirect()->back();
    }
}

