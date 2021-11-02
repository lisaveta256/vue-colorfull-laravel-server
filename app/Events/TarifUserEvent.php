<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TarifUserEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($tarif_user)
    {
        $webhook_url='https://discord.com/api/webhooks/901116795996487741/zSNqtpyMWzmGkC-64_ZekVHyTV2kFs_HCGKRwkIILQ4e15w16stb9TwSPP9u2F-5iNB1';
        $message = 'Пользователь '.$tarif_user->user->name.' заказал '.$tarif_user->tarif->name.' тариф';
        $json_data=json_encode([
            'content'=>$message,
            'user_name'=>'Liza'
        ],
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        );
        $ch = curl_init($webhook_url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type:application/json']);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_exec($ch);
        curl_close($ch);
        return response()->json(['message'=>'Okay']);
        // dd($tarif_user);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
