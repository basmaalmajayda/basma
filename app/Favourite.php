<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favourite extends Model
{
    use SoftDeletes;
    protected $table = 'favourites';

    public function meal()
    {
        return $this->belongsTo('App\Meal', 'meal_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
