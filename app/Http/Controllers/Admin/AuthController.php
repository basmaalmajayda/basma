<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Admin;
use App\Order;
use App\Meal;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function registerForm()
    {
        return view('admin.authentication.register');
    }

    public function loginForm()
    {
        return view('admin.authentication.login');
    }

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
        $admin->email = $validated['email'];
        $admin->password = bcrypt($validated['password']);
        $admin->api_token = $token;
        $status = $admin->save();
        
        return redirect()->back()->with('status', $status);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->with('errors', $validator->errors());
        }

        $validated = $validator->validated();

        if (Auth::guard('admin')->attempt($validated)) {
            return redirect()->intended('/'); 
        } else {
            return redirect()->back();
        }
    }

    // logout user
    public function logout(Request $request)
    {
        // $admin = Auth::user();

        // if ($admin && $admin->token()) {
        //     $admin->token()->revoke();
        // }
    
        Auth::guard('admin')->logout();
        return redirect()->intended('/login'); 
    }

    public function admin()
    {
        $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
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
        $admin = Auth::guard('admin')->user();
		
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
    $admin = Auth::guard('admin')->user();

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

