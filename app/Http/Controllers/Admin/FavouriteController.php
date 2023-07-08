<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Favourite;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class FavouriteController extends Controller
{
    public function store(Request $request){
        // Validate request data
        $attrs = $request->validate([
            'item_id' => 'required|integer|min:1',
            'user_id' => 'required|integer|min:1',
            'type' => 'required|string',
        ]);

        $favourite = new Favourite();
        $favourite->item_id = $attrs['item_id'];
        $favourite->user_id = $attrs['user_id'];
        $favourite->type = $attrs['type'];

        return response([
            'message' => 'Added to favourites.',
            'favourite' => $favourite,
        ], 200);
    }

    public function getUserFavourites($userId)
    {
        $favourites = Favourite::select('*')->where('user_id', $userId)->get();
        if(count($favourites) === 0){
            return response([
                'message' => 'There is no favourites',
            ], 204); // No Content
        }else{
            return response([
                'message' => 'There are favourites',
                'allFavourites' => $favourites,
            ], 200);
        }
    }

    public function destroy($id){
        Favourite::where('id', $id)->delete();
    }
}
