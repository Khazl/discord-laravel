<?php


namespace Khazl\Discord\Services;
use Illuminate\Support\Facades\Http;
use Khazl\Discord\Contracts\DiscordServiceInterface;

class DiscordService implements DiscordServiceInterface
{

    /**
     * @param string $hookName
     * @param string $message
     */
    public function send(string $hookName, string $message): void
    {
        $payload = [
            'username' => config('discord.name', 'Captain Hook'),
            'content' => $message
        ];

        $hook = config('discord.base_url').
            config("discord.hooks.{$hookName}", 'undefined-hook');

        Http::post($hook, $payload);
    }
}
