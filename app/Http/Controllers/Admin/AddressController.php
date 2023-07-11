<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Address;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AddressController extends Controller
{
    public function getUserAddresses($userId)
    {
        $userAddresses = Address::select('*')->where('user_id', $userId)->get();
        if(count($userAddresses) === 0){
            return response([
                'message' => 'There is no addresses',
            ], 204);
        }else{
            return response([
                'message' => 'There are addresses',
                'userAddresses' => $userAddresses,
            ], 200);
        }
    }

    public function store(Request $request)
    {
        $attrs = $request->validate([
            'user_id' => 'required|integer|min:1',
            'name' => 'required|string',
            'city' => 'required|string',
            'street' => 'required|string',
            'description' => 'required|string',
            'phone' => 'required|string',
        ]);

        // Create a new address
        $address = new Address();
        $address->name = $attrs['name'];
        $address->user_id = $attrs['user_id'];
        $address->city = $attrs['city'];
        $address->street = $attrs['street'];
        $address->description = $attrs['description'];
        $address->phone = $attrs['phone'];
        $address->save();

        return response([
            'message' => 'Address created.',
            'address' => $address,
        ], 200); 
    }

    public function update(Request $request, $id)
    {
        $attrs = $request->validate([
            'user_id' => 'required|integer|min:1',
            'name' => 'required|string',
            'city' => 'required|string',
            'street' => 'required|string',
            'description' => 'required|string',
            'phone' => 'required|integer',
        ]);

        // Update the address
        $address = Address::find($id);
        $address->name = $attrs['name'];
        $address->user_id = $attrs['user_id'];
        $address->city = $attrs['city'];
        $address->street = $attrs['street'];
        $address->description = $attrs['description'];
        $address->phone = $attrs['phone'];
        $address->save();

        return response([
            'message' => 'Address updated.',
            'address' => $address,
        ], 200); 
    }

    public function destroy($id){
        Address::where('id', $id)->delete();

        return response([
            'message' => 'Address deleted.',
        ], 200); 
    }
}
