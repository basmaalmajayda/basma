<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
                ]
            );
        }

        $validated = $validator->validated();

        $user = new User;
        $user->name = $validated['name'];
        $user->phone = $validated['phone'];
        $user->password = bcrypt($validated['password']);
        $user->case_id =  $validated['case_id'];
        $user->save();
        // Auth::login($user);
        // $token = $user->createToken('remember_token')->accessToken;

        $token = $user->createToken('API Token')->accessToken;

        return response()->json([
            'message'=>'User created successfully',
            'user' => $user,
            'token' => $token,
        ],201)->header('Authorization', 'Bearer '.$token->accessToken);
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

        if(!Auth::attempt($validated)){
            return response()->json([
                'message' => 'Invalid Credential',
            ],400);
        }

        return response()->json([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ]);
    }

    // logout user
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logout success.'
        ], 200);
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

        $attrs = request()->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'birth_date' => 'required|date',
            'img' => 'nullable|image',
            'case_id' => 'required|integer',
        ]);

        if ($attrs['img'] != '') {
            $attrs['img'] = request()->file('img')->store('public/user_images');
        }

        auth()->user()->update([
            'name' => $attrs['name'],
            'phone' => $attrs['phone'], // ask
            'gender' => $attrs['gender'],
            'birth_date' => $attrs['birth_date'],
            'img' => $attrs['img'],
            'case_id' => $attrs['case_id'],
        ]);

        return response([
            'message' => 'User updated.',
            'user' => auth()->user()
        ], 200);
    }
}

