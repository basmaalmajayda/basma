<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'password', 'case_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'birth_date' => 'datetime',
        'password' => 'hashed',
    ];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }
    public function case()
    {
        return $this->belongsTo('App\MedicalCase', 'case_id');
    }
    public function addresses()
    {
        return $this->hasMany('App\Address');
    }
    public function meals()
    {
        return $this->hasMany('App\Meal');
    }
}
