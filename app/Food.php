<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use SoftDeletes;
    protected $table = 'foods';
    public function category()
    {
        return $this->belongsTo('App\Category', 'cat_id');
    }
}
