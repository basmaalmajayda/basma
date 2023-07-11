<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Forbidden;
use App\Alternative;
use App\Food;
use App\MedicalCase;
use App\User;
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
        $alternatives = Alternative::with('forbidden')->with('alternativeFood')->select('*')->withTrashed()->paginate(10);
        return view('admin.alternatives.index')->with('alternatives',$alternatives);
    }

    public function getUserForbiddensAndAlternatives(){
        $user = User::select('*')->where('id', auth()->user()->id)->first();
        $forbiddens = Forbidden::with('food')->with('alternatives.alternativeFood')->select('*')->where('case_id', $user->case_id)->get();
        return response([
            'message' => 'There are forbiddens',
            'forbiddens' => $forbiddens,
        ], 200); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cases = MedicalCase::select('*')->get();
        $foods = Food::select('*')->get();
        return view('admin.alternatives.create')->with(['cases' => $cases, 'foods' => $foods]);
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
        $forbidden->case_id = $request->case_id;
        $forbidden->food_id = $request->food_id;
        $saveForbidden = $forbidden->save();

        $alternative = new Alternative;
        $alternative->forbidden_id = $forbidden->id;
        $alternative->alternative_id = $request->alternative_id;
	    $saveAlternative = $alternative->save();

        if($saveForbidden && $saveAlternative){
            $status = true;
        }else{
            $status = false;
        }
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
        $alternative = Alternative::with('forbidden')->with('alternativeFood')->select('*')->where('id', $id)->first();
        $cases = MedicalCase::select('*')->get();
        $foods = Food::select('*')->get();
        return view('admin.alternatives.edit')->with(['alternative' => $alternative, 'foods' => $foods, 'cases' => $cases]);
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
        $alternative->alternative_id = $request->alternative_id;
        $saveAlternative = $alternative->save();

        $forbidden = Forbidden::find($alternative->forbidden_id);
        $forbidden->food_id = $request->forbidden_id;
        $forbidden->case_id = $request->case_id;
        $saveForbidden = $forbidden->save();

    	if($saveForbidden && $saveAlternative){
            $status = true;
        }else{
            $status = false;
        }
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
