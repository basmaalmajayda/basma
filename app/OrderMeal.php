<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderMeal extends Model
{
    use SoftDeletes;
    protected $table = 'order_meals';

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id');
    }
    public function meal()
    {
        return $this->belongsTo('App\Meal', 'meal_id');
    }
}
