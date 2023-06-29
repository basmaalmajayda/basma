<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disease extends Model
{
    use SoftDeletes;
    protected $table = 'medical_cases';

    public function users()
    {
        return $this->hasMany('App\AppUser');
    }
    public function forbiddens()
    {
        return $this->hasMany('App\Forbidden');
    }
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
