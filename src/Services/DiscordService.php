<?php


namespace Khazl\Discord\Services;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Khazl\Discord\Contracts\DiscordServiceInterface;

class DiscordService implements DiscordServiceInterface
{

    public function send(string $hookName, string $message): Response
    {
        $payload = [
            'username' => config('discord.name'),
            'content' => $message
        ];

        $hook = config('discord.base_url').
            config("discord.hooks.{$hookName}", 'undefined-hook');

        return Http::post($hook, $payload);
    }
}
