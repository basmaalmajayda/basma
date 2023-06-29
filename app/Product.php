<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';

    public function productCategory()
    {
        return $this->belongsTo('App\ProductCategory', 'cat_id');
    }
    public function discount()
    {
        return $this->belongsTo('App\Discount', 'discount_id');
    }
    public function medicalCase()
    {
        return $this->belongsTo('App\MedicalCase', 'case_id');
    }
}
