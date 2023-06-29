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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meal = new Meal;
		$filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$request->img->move(public_path('meal_images'), $filename);
		$meal->img = 'meal_images/' . $filename;
    	$meal->name = $request->name;
    	$meal->price = $request->price;
    	$meal->rate = $request->rate;
    	$meal->user_id = $request->user_id;
    	$meal->description = $request->description;
	    $status = $meal->save();
    	return redirect()->back()->with('status', $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meal = Meal::select('*')->where('id', $id)->first();
        return view('admin.melas.edit')->with('meal', $meal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $meal = Meal::find($request->id);
		unlink(public_path( $meal->img));
		$filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$request->img->move(public_path('meal_images'), $filename);
		$meal->img = 'meal_images/' . $filename;
        $meal->name = $request->name;
    	$meal->price = $request->price;
    	$meal->rate = $request->rate;
    	$meal->user_id = $request->user_id;
    	$meal->description = $request->description;
    	$status = $meal->save();
		return redirect()->back()->with('status', $status);
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

