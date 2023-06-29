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
    public function favourites()
    {
        return $this->hasMany('App\Favourite');
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    public function user()
    {
        return $this->belongsTo('App\AppUser', 'user_id');
    }
}
