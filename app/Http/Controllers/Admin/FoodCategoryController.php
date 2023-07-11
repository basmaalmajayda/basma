<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FoodCategory;
use App\Food;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\FoodCategoryRequest;

class FoodCategoryController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = FoodCategory::select('*')->withTrashed()->paginate(10);
        return view('admin.foodCategories.index')->with('categories', $categories);
    }

    public function getAllFoodCategories()
    {
        $foodCategories = FoodCategory::with('children')->select('*')->get();
        return response([
            'message' => 'There are food categories',
            'foodCategories' => $foodCategories,
        ], 200);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FoodCategory::select('*')->get();
        return view('admin.foodCategories.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodCategoryRequest $request)
    {
        $category = new FoodCategory;
		$filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$request->img->move(public_path('food_category_images'), $filename);
		$category->img = 'food_category_images/' . $filename;
    	$category->name = $request->name;
        $category->name_ar = $request->name_ar;
        if($request->parent_id != -1){
            $category->parent_id = $request->parent_id;
        }
	    $status = $category->save();
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
        $category = FoodCategory::with('children')->select('*')->withTrashed()->where('id', $id)->first();
        $foods = Food::select('*')->withTrashed()->where('cat_id', $category->id)->get();
        return view('admin.foodCategories.details')->with(['category' => $category, 'foods' => $foods]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = FoodCategory::select('*')->where('id', $id)->first();
        $categories = FoodCategory::select('*')->where('id', '!=', $id)->get();
        return view('admin.foodCategories.edit')->with(['category' => $category, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FoodCategoryRequest $request)
    {
        $category = FoodCategory::find($request->id);
		unlink(public_path( $category->img));
		$filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$request->img->move(public_path('food_category_images'), $filename);
		$category->img = 'food_category_images/' . $filename;
        $category->name = $request->name;
        $category->name_ar = $request->name_ar;
        if($request->parent_id != -1){
        $category->parent_id = $request->parent_id;
        }
    	$status = $category->save();
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
        FoodCategory::where('id', $id)->delete();
    	return redirect()->back();
    }

    public function restore($id)
    {
        FoodCategory::onlyTrashed()->where('id', $id)->restore();
    	return redirect()->back();
    }
}

