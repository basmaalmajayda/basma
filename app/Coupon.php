<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use SoftDeletes;
    protected $table = 'coupons';

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    public function userCoupons()
    {
        return $this->hasMany('App\UserCoupon');
    }
}
