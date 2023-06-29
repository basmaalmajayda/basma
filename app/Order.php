<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $table = 'orders';

    public function coupon()
    {
        return $this->belongsTo('App\Coupon', 'coupon_id');
    }
    public function user()
    {
        return $this->belongsTo('App\AppUser', 'user_id');
    }
    public function meal()
    {
        return $this->belongsTo('App\Meal', 'meal_id');
    }
}
