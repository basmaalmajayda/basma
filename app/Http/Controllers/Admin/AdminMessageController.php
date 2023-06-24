<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AdminMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::select('*')->withTrashed()->paginate(10);
        return view('admin.messages.index')->with('messages', $messages);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Message::where('id', $id)->delete();
    	return redirect()->back();
    }

    public function restore($id)
    {
        Message::onlyTrashed()->where('id', $id)->restore();
    	return redirect()->back();
    }
}