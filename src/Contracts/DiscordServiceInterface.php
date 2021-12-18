<?php


namespace Khazl\Discord\Contracts;


use Illuminate\Http\Client\Response;

/**
 * Interface DiscordServiceInterface
 * @package Khazl\Discord\Contracts
 */
interface DiscordServiceInterface
{
    public function send(string $hookName, string $message): Response;
}
