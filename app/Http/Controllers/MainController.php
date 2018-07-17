<?php

namespace App\Http\Controllers;


use BotMan\BotMan\BotMan;
use BotTemplateFramework\Strategies\StrategyTrait;
use BotTemplateFramework\TemplateEngine;
use Illuminate\Http\Response;

class MainController extends Controller {
    use StrategyTrait;

    public function listen() {
        /** @var BotMan $botman */
        $botman = resolve('botman');

        /** @var array $template */
        $template = resolve('template');
        $templateEngine = new TemplateEngine($template, $botman);
        $templateEngine->listen();

        $botman->hears('test', function($bot){
            $bot->reply('works!');
        });

        $botman->listen();
    }

     public function index() {
        return new Response('More at: <a href="https://github.com/adellantado/bot-template-framework">https://github.com/adellantado/bot-template-framework</a>');
     }
}