<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodCategory extends Model
{
    use SoftDeletes;
    protected $table = 'food_categories';
    
    public function foods()
    {
        return $this->hasMany('App\Food');
    }
    public function categories()
    {
        return $this->hasMany('App\FoodCategory');
    }
    public function foodCategory()
    {
        return $this->belongsTo('App\FoodCategory', 'cat_id');
    }
}
