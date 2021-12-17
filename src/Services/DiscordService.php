<?php


namespace Khazl\Discord\Services;
use Illuminate\Support\Facades\Http;
use Khazl\Discord\Contracts\DiscordServiceInterface;

class DiscordService implements DiscordServiceInterface
{

    private $payload;

    function __construct()
    {

    }

    /**
     * @param string $hookName
     * @param string $message
     */
    public function send(string $hookName, string $message): void
    {
        $this->setName();
        $this->setMessage($message);

        Http::post($this->getHook($hookName), $this->payload);
    }

    private function setName(): void
    {
        $username = config('discord.name');
        if ($username) {
            $this->payload['username'] = $username;
        }
    }

    /**
     * @param string $message
     */
    private function setMessage(string $message): void
    {
        $this->payload['content'] = $message;
    }

    /**
     * @param string $hookName
     * @return string
     */
    private function getHook(string $hookName): string
    {
        return config('discord.base_url').
            config("discord.hooks.{$hookName}", 'undefined-hook');
    }
}
