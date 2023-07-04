<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MedicalCase;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\MedicalCaseRequest;


class MedicalCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diseases = MedicalCase::select('*')->withTrashed()->paginate(10);
        return view('admin.diseases.index')->with('diseases', $diseases);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.diseases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicalCaseRequest $request)
    {
        $disease = new MedicalCase;
    	$disease->name = $request->name;
    	$disease->name_ar = $request->name_ar;
	    $status = $disease->save();
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
        $disease = MedicalCase::select('*')->where('id', $id)->first();
        return view('admin.diseases.edit')->with('disease', $disease);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicalCaseRequest $request)
    {
        $disease = MedicalCase::find($request->id);
        $disease->name = $request->name;
        $disease->name_ar = $request->name_ar;
    	$status = $disease->save();
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
        MedicalCase::where('id', $id)->delete();
    	return redirect()->back();
    }

    public function restore($id)
    {
        MedicalCase::onlyTrashed()->where('id', $id)->restore();
    	return redirect()->back();
    }
}
