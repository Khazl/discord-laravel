<?php

namespace Khazl\Discord\Console;

use Illuminate\Console\Command;

class DiscordInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'discord:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs the discord package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->comment('Publishing Discord Config ...');

        $this->callSilent('vendor:publish', ['--tag' => 'discord.config']);

        $this->info('Installation done. Have fun!');
    }
}
