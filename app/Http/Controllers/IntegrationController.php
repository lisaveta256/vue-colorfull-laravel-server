<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntegrationController extends Controller
{
    public function postDiscordMessage(Request $request){
        $timestamp =  date("c", strtotime("now"));
        $webhook_url='https://discord.com/api/webhooks/901116795996487741/zSNqtpyMWzmGkC-64_ZekVHyTV2kFs_HCGKRwkIILQ4e15w16stb9TwSPP9u2F-5iNB1';
        $json_data=json_encode([
            'content'=>'Hello, server',
            'user_name'=>'Liza',
           // 'file'=>'file url',
            "embeds" => [
                [
                  // Embed Title
                  "title" => "PHP - Send message to Discord (embeds) via Webhook",
      
                  // Embed Type
                  "type" => "rich",
      
                  // Embed Description
                  "description" => "Description will be here, someday, you can mention users here also by calling userID <@!12341234123412341>",
      
                  // URL of title link
                  "url" => "https://github.com/mikhalkevich",
      
                  // Timestamp of embed must be formatted as ISO8601
                  "timestamp" => $timestamp,
      
                  // Embed left border color in HEX
                  "color" => hexdec( "3366ff" ),
      
                  // Footer
                  "footer" => [
                    "text" => "GitHub.com/Mikhalkevich",
                    "icon_url" => "http://erud.by/accounts/1/s_1.jpg"
                  ],
      
                  // Image to send
                  "image" => [
                    "url" => "http://erud.by/accounts/1/s_1.jpg"
                  ],
      
                  "author" => [
                    "name" => "Alexandr",
                    "url" => "https://github.com/mikhalkevich/"
                  ],
      
                  // Additional Fields array
                  "fields" => [
                    // Field 1
                    [
                      "name" => "Field #1 Name",
                      "value" => "Field #1 Value",
                      "inline" => false
                    ],
                    // Field 2
                    [
                      "name" => "Field #2 Name",
                      "value" => "Field #2 Value",
                      "inline" => true
                    ]
                    // Etc..
                  ]
                ]
              ]
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
    }
}
