<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class NotificationService
{

    public static function sendToFcm($token, $notification): void
    {
        Http::acceptJson()->withToken(env('FCM_SERVER_KEY'))->post(
            'https://fcm.googleapis.com/fcm/send',
            [
                'to' => $token,
                'notification' => $notification,
            ]
        );
    }

    // create function to send notification to topic
    public static function sendToTopic($topic, $notification): void
    {

        $request = Http::acceptJson()->withToken(env('FCM_SERVER_KEY'))->post(
            'https://fcm.googleapis.com/fcm/send',
            [
                'to' => '/topics/' . $topic,
                'data' => $notification,
            ]
        );


    }


}
