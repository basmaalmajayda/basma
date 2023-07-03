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
    public function children()
    {
        return $this->hasMany('App\FoodCategory', 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo('App\FoodCategory', 'parent_id');
    }
}
