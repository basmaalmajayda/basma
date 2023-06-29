<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Forbidden extends Model
{
    use SoftDeletes;
    protected $table = 'forbiddens';

    public function medicalCase()
    {
        return $this->belongsTo('App\MedicalCase', 'medical_id');
    }
    public function food()
    {
        return $this->belongsTo('App\Food', 'food_id');
    }
    public function alternatives()
    {
        return $this->hasMany('App\Alternative');
    }
}
