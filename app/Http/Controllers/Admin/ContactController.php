<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Contact::with('user')->select('*')->withTrashed()->paginate(10);
        return view('admin.messages.index')->with('messages', $messages);
    }

    public function store(Request $request)
    {
        $attrs = $request->validate([
            'user_id' => 'required|integer|min:1',
            'message' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|integer',
        ]);

        // Create a new message
        $contact = new Contact();
        $contact->message = $attrs['message'];
        $contact->user_id = $attrs['user_id'];
        $contact->phone = $attrs['phone'];
        $contact->email = $attrs['email'];
        $contact->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::where('id', $id)->delete();
    	return redirect()->back();
    }

    public function restore($id)
    {
        Contact::onlyTrashed()->where('id', $id)->restore();
    	return redirect()->back();
    }
}