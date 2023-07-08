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
    public function orderMeals()
    {
        return $this->hasMany('App\OrderMeal');
    }
    public function orderProducts()
    {
        return $this->hasMany('App\OrderProduct');
    }
    public function status()
    {
        return $this->belongsTo('App\Status', 'status_id');
    }
    public function payment()
    {
        return $this->belongsTo('App\Payment', 'payment_id');
    }
    public function address()
    {
        return $this->belongsTo('App\Address', 'address_id');
    }
}
