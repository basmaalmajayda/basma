<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Food;
use App\FoodCategory;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\FoodRequest;

class FoodController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::with('foodCategory')->select('*')->withTrashed()->paginate(10);
        return view('admin.food.index')->with('foods',$foods);
    }

    public function getAllFoods(){
        $foods = Food::select('*')->get();
        return response([
            'message' => 'There are foods',
            'foods' => $foods,
        ], 200); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FoodCategory::select('*')->whereNotNull('parent_id')->get();
        return view('admin.food.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodRequest $request)
    {
        $food = new Food;
		$filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$request->img->move(public_path('food_images'), $filename);
		$food->img = 'food_images/' . $filename;
    	$food->name = $request->name;
        $food->cat_id = $request->cat_id;
        $food->price = $request->price;
	    $status = $food->save();
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
        $food = Food::with('foodCategory')->select('*')->where('id', $id)->first();
        $categories = FoodCategory::select('*')->whereNotNull('parent_id')->get();
        return view('admin.food.edit')->with(['food' => $food, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FoodRequest $request)
    {
        $food = Food::find($request->id);
        unlink(public_path($food->img));
        $filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$request->img->move(public_path('food_images'), $filename);
		$food->img = 'food_images/' . $filename;
        $food->name = $request->name;
        $food->cat_id = $request->cat_id;
        $food->price = $request->price;
    	$status = $food->save();
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
        Food::where('id', $id)->delete();
    	return redirect()->back();
    }

    public function restore($id)
    {
        Food::onlyTrashed()->where('id', $id)->restore();
    	return redirect()->back();
    }
}

