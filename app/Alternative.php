<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alternative extends Model
{
    use SoftDeletes;
    protected $table = 'alternatives';

    public function alternative()
    {
        return $this->belongsTo('App\Food', 'alternative_id');
    }
    public function forbidden()
    {
        return $this->belongsTo('App\Forbidden', 'forbidden_id');
    }
}
