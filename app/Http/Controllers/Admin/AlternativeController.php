<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alternative;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AlternativeController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatives = Alternative::select('*')->withTrashed()->paginate(10);
        return view('admin.alternatives.index')->with('alternatives', $alternatives);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.alternatives.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alternative = new Alternative;
		$filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$request->img->move(public_path('alternative_images'), $filename);
		$alternative->img = 'alternative_images/' . $filename;
    	$alternative->forbidden_id = $request->forbidden_id;
    	$alternative->alternative_id = $request->alternative_id;
    	$alternative->medical_id = $request->medical_id;
	    $status = $alternative->save();
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
        $alternative = Alternative::select('*')->where('id', $id)->first();
        return view('admin.alternatives.edit')->with('alternative', $alternative);
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
        $alternative = Alternative::find($request->id);
		unlink(public_path( $alternative->img));
		$filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$request->img->move(public_path('alternative_images'), $filename);
		$alternative->img = 'alternative_images/' . $filename;
        $alternative->forbidden_id = $request->forbidden_id;
    	$alternative->alternative_id = $request->alternative_id;
    	$alternative->medical_id = $request->medical_id;
        $status = $alternative->save();
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
        Alternative::where('id', $id)->delete();
    	return redirect()->back();
    }

    public function restore($id)
    {
        Alternative::onlyTrashed()->where('id', $id)->restore();
    	return redirect()->back();
    }
}

