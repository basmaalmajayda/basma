<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCoupon extends Model
{
    use SoftDeletes;
    protected $table = 'user_coupons';

    public function coupon()
    {
        return $this->belongsTo('App\Coupon', 'coupon_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
