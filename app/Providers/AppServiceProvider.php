<?php

namespace App\Providers;

use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\SymfonyCache;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Storages\Drivers\FileStorage;
use BotTemplateFramework\Distinct\Telegram\TelegramDriverExtended;
use BotTemplateFramework\TemplateEngine;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

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
            $cache = new SymfonyCache(new FilesystemAdapter('symfonycache', 120, storage_path('app')));
            $config = TemplateEngine::getConfig(file_get_contents(app_path('template.json')));
            return BotManFactory::create($config, $cache, null, new FileStorage(storage_path('app')));
        });
    }
}
