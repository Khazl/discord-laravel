<?php


namespace Khazl\Discord\Services;
use Illuminate\Support\Facades\Http;
use Khazl\Discord\Contracts\DiscordServiceInterface;

class DiscordService implements DiscordServiceInterface
{

    function __construct()
    {

    }

    /**
     * @param string $hookName
     * @param string $message
     */
    static public function send(string $hookName, string $message): void
    {
        $message = [
            'username' => config('discord.name', 'Captain Hook'),
            'content' => $message
        ];

        Http::post(config('discord.base_url'). config("discord.hooks.{$hookName}", 'undefined-hook'), $message);
    }
}
