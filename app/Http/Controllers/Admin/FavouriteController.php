<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Favourite;
use App\Meal;
use App\Product;
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
            'type' => 'required|string',
        ]);

        $favourite = new Favourite();
        $favourite->item_id = $attrs['item_id'];
        $favourite->user_id = auth()->user()->id;
        $favourite->type = $attrs['type'];
        $favourite->save();

        return response([
            'message' => 'Added to favourites.',
            'favourite' => $favourite,
        ], 200);
    }

    public function getUserFavourites()
    {
        $favourites = Favourite::select('*')->where('user_id', auth()->user()->id)->get();
        if($favourites->isEmpty()){
            return response([
                'message' => 'There is no favourites',
            ], 204); // No Content
        }
        return response([
            'message' => 'There are favourites',
            'allFavourites' => $favourites,
        ], 200);  
    }

    public function getUserFavouritesCustom()
    {
        $favourites = Favourite::select('*')->where('user_id', auth()->user()->id)->get();
        
        if($favourites->isEmpty()){
            return response([
                'message' => 'There is no favourites',
            ], 204); // No Content
        }

        $favMeals = [];
        $favProducts = [];
        
        foreach($favourites as $favourite){
            if($favourite->type == 'meal'){
                $meal = Meal::find($favourite->item_id);
                array_push($favMeals, $meal); 
            }elseif($favourite->type == 'product'){
                $product = Product::find($favourite->item_id);
                array_push($favProducts, $product); 
            }
        }

        return response([
            'message' => 'There are favourites',
            'favMeals' => $favMeals,
            'favProducts' => $favProducts,
        ], 200);  
    }
    public function destroy($id){
        Favourite::where('id', $id)->delete();
        return response([
            'message' => 'Favourite removed successfully',
        ], 200);
    }
}
