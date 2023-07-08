<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use SoftDeletes;
    protected $table = 'colors';

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
