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

        $templateEngine = new TemplateEngine(file_get_contents(app_path('template.json')), $botman);
        $templateEngine->listen();

        $botman->hears('test usual hears', function($bot){
            $bot->reply('works!');
        });

        $botman->listen();
    }

     public function index() {
        return new Response('More at: <a href="https://github.com/adellantado/bot-template-framework">https://github.com/adellantado/bot-template-framework</a>');
     }
}