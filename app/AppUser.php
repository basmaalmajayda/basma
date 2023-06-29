<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppUser extends Model
{
    use SoftDeletes;
    protected $table = 'app_users';
    
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }
    public function disease()
    {
        return $this->belongsTo('App\Disease', 'medical_id');
    }
}
