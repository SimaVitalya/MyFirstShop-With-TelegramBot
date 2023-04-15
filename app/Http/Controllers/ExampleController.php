<?php

namespace App\Http\Controllers;

use App\Services\TelegramBot;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function sendMessage()
    {
        $client = new Client(['base_uri' => 'https://api.telegram.org/bot' . env('TELEGRAM_BOT_TOKEN') . '/']);
        $response = $client->request('POST', 'sendMessage', [
            'form_params' => [
                'chat_id' => '-972060379', //
                'text' => 'test'
            ]
        ]);

        return $response->getBody();
    }
}
//TELEGRAM_CHAT_ID=<972060379>
