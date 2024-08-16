<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use HTMLPurifier;
use HTMLPurifier_Config;

class HtmlPurifierServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(HTMLPurifier::class, function ($app) {
            $config = HTMLPurifier_Config::createDefault();
            // Sesuaikan konfigurasi jika perlu
            $config->set('HTML.Allowed', 'p,b,a[href],i');

            return new HTMLPurifier($config);
        });
    }
}
