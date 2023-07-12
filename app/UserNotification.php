<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserNotification extends Model
{
    use SoftDeletes;
    protected $table = 'user_notifications';

    public function user()
    {
        return $this->belongsTo('App\user', 'user_id');
    }
    public function notification()
    {
        return $this->belongsTo('App\Notification', 'notification_id');
    }
}
