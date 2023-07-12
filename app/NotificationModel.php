<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotificationModel extends Model
{
    use SoftDeletes;
    protected $table = 'notifications';

    public function userNotifications()
    {
        return $this->hasMany('App\UserNotification');
    }
}
