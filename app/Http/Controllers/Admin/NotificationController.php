<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\NotificationRequest;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::select('*')->withTrashed()->paginate(10);
        return view('admin.notifications.index')->with('notifications', $notifications);
    }

    public function getUserNotifications($userId)
    {
        $userNotifications = Meal::select('*')->where('user_id', $userId)->get();
        if(count($userNotifications) === 0){
            return response([
                'message' => 'There is no notifications',
            ], 204);
        }else{
            return response([
                'message' => 'There are notifications',
                'userNotifications' => $userNotifications,
            ], 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotificationRequest $request)
    {
        $notification = new Notification;
		$filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$request->img->move(public_path('notification_images'), $filename);
		$notification->img = 'notification_images/' . $filename;
    	$notification->body = $request->body;
    	$notification->body_ar = $request->body_ar;
    	$notification->title = $request->title;
    	$notification->title_ar = $request->title_ar;
	    $status = $notification->save();
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
        $notification = Notification::select('*')->where('id', $id)->first();
        return view('admin.notifications.edit')->with('notification', $notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NotificationRequest $request)
    {
        $notification = Notification::find($request->id);
		unlink(public_path( $notification->img));
		$filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
		$request->img->move(public_path('notification_images'), $filename);
		$notification->img = 'notification_images/' . $filename;
    	$notification->body = $request->body;
    	$notification->body_ar = $request->body_ar;
    	$notification->title = $request->title;
    	$notification->title_ar = $request->title_ar;
	    $status = $notification->save();
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
        Notification::where('id', $id)->delete();
    	return redirect()->back();
    }

    public function restore($id)
    {
        Notification::onlyTrashed()->where('id', $id)->restore();
    	return redirect()->back();
    }
}
