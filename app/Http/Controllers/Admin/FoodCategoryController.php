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
use App\Http\Requests\ServiceRequest;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.foodCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new FoodCategory;
		$filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$request->img->move(public_path('category_images'), $filename);
		$category->img = 'category_images/' . $filename;
    	$category->name = $request->name;
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
        dd($foods);
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
        return view('admin.foodCategories.edit')->with('category', $category);
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
        $category = FoodCategory::find($request->id);
		unlink(public_path( $category->img));
		$filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$request->img->move(public_path('category_images'), $filename);
		$category->img = 'category_images/' . $filename;
        $category->name = $request->name;
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
        FoodCategory::where('id', $id)->delete();
    	return redirect()->back();
    }

    public function restore($id)
    {
        FoodCategory::onlyTrashed()->where('id', $id)->restore();
    	return redirect()->back();
    }
}

