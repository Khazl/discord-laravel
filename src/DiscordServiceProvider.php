<?php

namespace Khazl\Discord;

use Illuminate\Support\ServiceProvider;
use Khazl\Discord\Console\DiscordInstall;
use Khazl\Discord\Contracts\DiscordServiceInterface;
use Khazl\Discord\Services\DiscordService;

class DiscordServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/discord.php', 'discord');
        $this->app->bind(DiscordServiceInterface::class, DiscordService::class);

        // Register the service the package provides.
        $this->app->singleton('discord', function ($app) {
            return new DiscordService();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['discord'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/discord.php' => config_path('discord.php'),
        ], 'discord.config');

        // Registering package commands.
        $this->commands([DiscordInstall::class]);
    }
}
