<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AppUser;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AppUserController extends Controller
{
    public function getUserInfo($userId)
    {
        $userInfo = AppUser::select('*')->where('id', $userId)->first();
        
        return response([
            'message' => 'Get user info',
            'userInfo' => $userInfo,
        ], 204);
        
    }

    public function editUserInfo(Request $request, $userId)
    {
        $attrs = $request->validate([
            'name' => 'sometimes|string',
            'img' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'sometimes|string',
            'gender' => 'sometimes|string',
            'birth_date' => 'sometimes|date',
            'medical_id' => 'sometimes|integer|min:1',
        ]);
        $user = AppUser::find($userId);
        if($request->has('name')){
            $user->name = $attrs['name'];
        }
        if($request->has('phone')){
            $user->phone = $attrs['phone'];
        }
        if($request->has('gender')){
            $user->gender = $attrs['gender'];
        }
        if($request->has('birth_date')){
            $user->birth_date = $attrs['birth_date'];
        }
        if($request->has('medical_id')){
            $user->medical_id = $attrs['medical_id'];
        }
       
        // $image = $request->file('img')->store('public/users_images')
        // $user->img = $image;

        if($request->hasFile('img')){
            $file = $request->file('img');
            $filename = time().'_'.rand(1,10000).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('users_images'), $filename);
            $user->img = 'users_images/' . $filename;
        }        

        $user->save();
        return response([
            'message' => 'User info updated',
            'user' => $user,
        ], 200);
        
    }
}
