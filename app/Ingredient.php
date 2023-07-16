<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use SoftDeletes;
    protected $table = 'ingredients';
    protected $fillable = ['meal_id', 'food_id', 'order_no'];

    public function food()
    {
        return $this->belongsTo('App\Food', 'food_id');
    }
    public function meal()
    {
        return $this->belongsTo('App\Meal', 'meal_id');
    }
}
