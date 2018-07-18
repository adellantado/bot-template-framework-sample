<?php

namespace App\Providers;

use App\Storages\DBStorage;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\RedisCache;
use BotMan\BotMan\Drivers\DriverManager;
use BotTemplateFramework\Distinct\Telegram\TelegramDriverExtended;
use BotTemplateFramework\TemplateEngine;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DriverManager::loadDriver(TelegramDriverExtended::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('botman', function ($app) {
            //$config = TemplateEngine::getConfig(file_get_contents(app_path('template.json')));
            return BotManFactory::create(['telegram' => ['token' => env('TELEGRAM_TOKEN')]], null, null);
        });
    }
}
