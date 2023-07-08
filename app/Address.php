<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;
    protected $table = 'addresses';

    public function user()
    {
        return $this->belongsTo('App\AppUser', 'user_id');
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
