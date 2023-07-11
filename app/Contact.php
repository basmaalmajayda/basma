<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    protected $table = 'contacts';
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
