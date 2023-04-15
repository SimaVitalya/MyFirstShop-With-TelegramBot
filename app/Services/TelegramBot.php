<?php

namespace App\Services;

use GuzzleHttp\Client;

class TelegramBot
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.telegram.org/bot' . config('services.telegram.bot_token') . '/'
        ]);
    }

    public function sendMessage($chatId, $text)
    {
        $this->client->post('sendMessage', [
            'json' => [
                'chat_id' => $chatId,
                'text' => $text,
            ]
        ]);
    }
}
