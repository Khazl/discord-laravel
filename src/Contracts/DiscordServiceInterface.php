<?php


namespace Khazl\Discord\Contracts;


/**
 * Interface DiscordServiceInterface
 * @package Khazl\Discord\Contracts
 */
interface DiscordServiceInterface
{
    public function send(string $hookName, string $message): void;
}
