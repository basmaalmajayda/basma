<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NotificationModel;
use App\UserNotification;
use App\User;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\NotificationRequest;
use App\Notifications\ImageNotification;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = NotificationModel::select('*')->withTrashed()->paginate(10);
        return view('admin.notifications.index')->with('notifications', $notifications);
    }

    public function getUserNotifications()
    {
        $userNotifications = UserNotification::select('*')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
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

    public function sendNotificationForOneUser($notification_id, $userId){
        $notification = Notification::find($notification_id);
        $user = User::find($userId);
        $notificationService = new NotificationService();
        $notificationService->sendToFcm($user->fcm_token, $notification);
        UserNotification::create([
            'user_id' => $userId,
            'notification_id' => $notification_id,
        ]);
        return redirect()->back();
    }

    public function sendNotificationForAllUsers($notification_id){
        $notification = Notification::find($notification_id);
        $users = User::all();
        $notificationService = new NotificationService();
        foreach($users as $user){
            $notificationService->sendToFcm($user->fcm_token, $notification);
            UserNotification::create([
                'user_id' => $user->id,
                'notification_id' => $notification_id,
            ]);
        }
        return redirect()->back();
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
    	$notification->body = $request->body;
    	$notification->title = $request->title;
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
    	$notification->body = $request->body;
    	$notification->title = $request->title;
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
