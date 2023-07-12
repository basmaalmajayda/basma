<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model
{
    use SoftDeletes;
    protected $table = 'meals';

    public function ingredients()
    {
        return $this->hasMany('App\Ingredient');
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    public function userMeals()
    {
        return $this->hasMany('App\UserMeal');
    }
}
