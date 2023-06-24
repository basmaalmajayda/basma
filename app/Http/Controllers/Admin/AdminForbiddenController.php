<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Forbidden;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AdminForbiddenController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forbidden = Forbidden::select('*')->withTrashed()->paginate(10);
        return view('admin.medicalCases.forbidden.index')->with('forbidden', $forbidden);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.medicalCases.forbidden.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $forbidden = new Forbidden;
		$filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$request->img->move(public_path('forbidden_images'), $filename);
		$forbidden->img = 'forbidden_images/' . $filename;

    	// $forbidden->title = $request->title;
	    $status = $forbidden->save();
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
        return view('admin.medicalCases.forbidden.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $forbidden = Forbidden::find($id);
		unlink(public_path( $forbidden->img));
		$filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$request->img->move(public_path('forbidden_images'), $filename);
		$forbidden->img = 'forbidden_images/' . $filename;

        // $forbidden->title = $request->title;
    	$status = $forbidden->save();
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
        Forbidden::where('id', $id)->delete();
    	return redirect()->back();
    }

    public function restore($id)
    {
        Forbidden::onlyTrashed()->where('id', $id)->restore();
    	return redirect()->back();
    }
}

