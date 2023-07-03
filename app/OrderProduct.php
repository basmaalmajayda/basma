<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use SoftDeletes;
    protected $table = 'order_products';

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
