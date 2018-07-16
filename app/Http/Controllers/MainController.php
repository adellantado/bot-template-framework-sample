<?php

namespace App\Http\Controllers;


use BotMan\BotMan\BotMan;
use BotTemplateFramework\Strategies\StrategyTrait;
use BotTemplateFramework\TemplateEngine;

class MainController extends Controller {
    use StrategyTrait;

    public function listen() {
        /** @var BotMan $bot */
        $bot = resolve('bot');

        /** @var array $template */
        $template = resolve('template');
        $templateEngine = new TemplateEngine($template, $bot);
        $templateEngine->listen();

        $bot->listen();
    }
}