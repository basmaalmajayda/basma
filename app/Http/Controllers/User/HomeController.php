<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index()
    {
        return response([
            'meals' => Meal::orderBy('created_at', 'desc')->with('mail')->with('user')
                ->get()
        ], 200);
    }

}
