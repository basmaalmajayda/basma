<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //Register user
    public function register(Request $request)
    {
        //validate fields
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'phone' => 'required|string|unique:users,phone',
            'password' => 'required|min:6|confirmed',
            'case_id' => 'required|integer|min:1',
        ]);

        if($validator->fails()){
            return response()->json(
                [
                    'message'=>'Something wrong',
                    'errors'=>$validator->errors()
                ], 400);
        }

        $validated = $validator->validated();
        $token = Str::random(60);

        $user = new User;
        $user->name = $validated['name'];
        $user->phone = $validated['phone'];
        $user->password = bcrypt($validated['password']);
        $user->case_id =  $validated['case_id'];
        $user->api_token = $token;
        $user->save();

        return response()->json([
            'message'=>'User created successfully',
            'user' => $user,
            'token' => $token,
        ],201);
        // status code 201 means created
    }

    // login user
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'phone'=>'required|string',
            'password'=>'required'
        ]);

        if($validator->fails()){
            return response()->json(
                [
                    'message'=>'Something wrong',
                    'errors'=>$validator->errors()
                ], 400);
        }

        $validated = $validator->validated();

        if(Auth::guard('user')->attempt($validated)){
            // $token = Str::random(60);

            return response()->json([
                'message' => 'Login successfully',
                'user' => auth()->user(),
            ]);
        }

        return response()->json([
            'message' => 'Invalid Credential',
        ],400);
    }

    // logout user
    public function logout()
    {
        Auth::guard('user')->logout();
        return response()->json(['message' => 'Successfully logged out'], 200);
    }

    // get current user details
    public function user()
    {
        $user = User::where('id', auth()->user()->id)->with('case')->first();
        return response([
            'user' => $user
        ], 200);
    }

    // update current user
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'gender' => 'required|string',
            'birth_date' => 'required|date',
            'img' => 'nullable|image',
            'case_id' => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json(
                [
                    'message'=>'Something wrong',
                    'errors'=>$validator->errors()
                ]
            );
        }

        $validated = $validator->validated();
        $user = auth()->user();
		
        if ($validated['img'] != '') {
            $filename = time().'_'.rand(1,10000).'.'.$request->img->extension();
            $validated['img']->move(public_path('profile_images'), $filename);
            $user->img =  'profile_images/' . $filename;
        }
        
            $user->name = $validated['name'];
            $user->gender = $validated['gender'];
            $user->birth_date = $validated['birth_date'];
            $user->case_id = $validated['case_id'];
            $user->save();

        return response([
            'message' => 'User updated.',
            'user' => auth()->user(),
        ], 200);
    }

    public function changePassword(Request $request)
{
    $user = Auth::user();

    $validator = Validator::make($request->all(), [
        'current_password' => 'required',
        'new_password' => 'required|string|min:6|different:current_password',
        'confirm_password' => 'required|string|same:new_password',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }
    $validated = $validator->validated();

    // Verify the current password
    if (!password_verify($validated['current_password'], $user->password)) {
        return response()->json(['error' => 'Invalid current password'], 401);
    }

    // Update the user's password
    $user->password = bcrypt($validated['new_password']);
    $user->save();

    return response()->json(['message' => 'Password changed successfully'], 200);
}
}

