<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserMeal extends Model
{
    use SoftDeletes;
    protected $table = 'user_meals';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function meal()
    {
        return $this->belongsTo('App\Meal', 'meal_id');
    }
}
