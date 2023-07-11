<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use SoftDeletes;
    protected $table = 'foods';
    
    public function foodCategory()
    {
        return $this->belongsTo('App\FoodCategory', 'cat_id');
    }
    public function ingredients()
    {
        return $this->hasMany('App\Ingredients');
    }
    public function forbiddens()
    {
        return $this->hasMany('App\Forbidden');
    }
}
