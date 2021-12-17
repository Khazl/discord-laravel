# Discord

Most simple Discord hooks implementation for Laravel.  
Send messages to your discord channels, very easy and at any time or place in your code.


## Installation

``` bash
$ composer require khazl/discord
```

``` bash
$ php artisan discord:install
```


## Usage

1. Create a hook for your discord channel.
2. Add the last two parts (everything after the base URL) of your hook to the config.
3. Send a message to your channel using the name of your hook:
``` php
public function SendSomething(DiscordServiceInterface $discordService)
{
    $discordService->send('default', 'Something happened!');
}
```
3.1. Or use the facade:
``` php
Discord::send('default', 'Something happened!');
```
