<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCase extends Model
{
    use SoftDeletes;
    protected $table = 'product_cases';

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
    public function case()
    {
        return $this->belongsTo('App\MedicalCase', 'case_id');
    }
}
