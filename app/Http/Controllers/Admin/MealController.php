<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meal;
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
        $meals = Meal::select('*')->withTrashed()->paginate(10);
        return view('admin.meals.index')->with('meals', $meals);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meal = Meal::select('*')->where('id', $id)->first();
        return view('admin.meals.mealDetails')->with('meal' , $meal); 
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

    public function restore($id)
    {
        Meal::onlyTrashed()->where('id', $id)->restore();
    	return redirect()->back();
    }
}

