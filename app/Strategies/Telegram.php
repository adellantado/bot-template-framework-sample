<?php

namespace App\Strategies;
use BotTemplateFramework\Strategies\Strategy;

class Telegram extends Strategy {

    function myMethod() {
        $this->bot->reply('This is a method reply. Look for me in App\Strategies\Telegram');
    }
}