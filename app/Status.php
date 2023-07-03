<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    // use SoftDeletes;
    protected $table = 'status';

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
