<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        //validate fields
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6|confirmed',
        ]);

        if($validator->fails()){
            // return response()->json(
            //     [
            //         'message'=>'Something wrong',
            //         'errors'=>$validator->errors()
            //     ]
            // );
        }

        $validated = $validator->validated();
        $token = Str::random(60);

        $admin = new Admin;
        $admin->name = $validated['name'];
        $admin->email = $validated['phone'];
        $admin->password = bcrypt($validated['password']);
        $admin->api_token = $token;
        $admin->save();
        
        // return response()->json([
        //     'message'=>'Admin created successfully',
        //     'admin' => $admin,
        //     'token' => $token,
        // ],201);
        // status code 201 means created
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if($validator->fails()){
            // return response()->json(
            //     [
            //         'message'=>'Something wrong',
            //         'errors'=>$validator->errors()
            //     ], 400);
        }

        $validated = $validator->validated();

        if(Auth::attempt($validated)){
            $admin = Auth::user();
            $token = Str::random(60);

            // return response()->json([
            //     'message' => 'Login successfully',
            //     'user' => auth()->user(),
            //     'token' => $token,
            // ]);
        }

        // return response()->json([
        //     'message' => 'Invalid Credential',
        // ],400);
    }

    // logout user
    public function logout(Request $request)
    {
        $admin = Auth::user();

        if ($admin && $admin->token()) {
            $admin->token()->revoke();
        }
    
        // return response()->json(['message' => 'Successfully logged out'], 200);
    }

    public function admin()
    {
        $admin = Admin::where('id', auth()->user()->id)->first();
        // return response([
        //     'user' => $user
        // ], 200);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'img' => 'nullable|image',
        ]);

        if($validator->fails()){
            // return response()->json(
            //     [
            //         'message'=>'Something wrong',
            //         'errors'=>$validator->errors()
            //     ]
            // );
        }

        $validated = $validator->validated();
        $admin = auth()->user();
		
        if ($validated['img'] != '') {
            $filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
            $validated['img']->move(public_path('admin_images'), $filename);
            $admin->img =  'admin_images/' . $filename;
        }
        
            $admin->name = $validated['name'];
            $admin->save();

        // return response([
        //     'message' => 'User updated.',
        //     'user' => auth()->user(),
        // ], 200);
    }

    public function changePassword(Request $request)
{
    $admin = Auth::user();

    $validator = Validator::make($request->all(), [
        'current_password' => 'required',
        'new_password' => 'required|string|min:6|different:current_password',
        'confirm_password' => 'required|string|same:new_password',
    ]);

    if ($validator->fails()) {
        // return response()->json(['error' => $validator->errors()], 400);
    }
    $validated = $validator->validated();

    // Verify the current password
    if (!password_verify($validated['current_password'], $admin->password)) {
        // return response()->json(['error' => 'Invalid current password'], 401);
    }

    // Update the user's password
    $admin->password = bcrypt($validated['new_password']);
    $admin->save();

    // return response()->json(['message' => 'Password changed successfully'], 200);
}
}

