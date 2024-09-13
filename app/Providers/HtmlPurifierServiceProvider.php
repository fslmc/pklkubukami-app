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

            // Allow specific tags and attributes (including base64 images)
            $config->set('HTML.Allowed', 'p,b,a[href],i,img[src|style|width|height],span[style]');

            // Allow the 'data:' scheme for base64-encoded images, along with http and https
            $config->set('URI.AllowedSchemes', [
                'http' => true,
                'https' => true,
                'mailto' => true,
                'ftp' => true,
                'nntp' => true,
                'news' => true,
                'tel' => true,
                'data' => true
            ]);

            // Optional: Disable URI validation for data URIs to prevent blocking of base64 content
            $config->set('URI.DisableExternalResources', false);
            $config->set('URI.DisableResources', false);

            return new HTMLPurifier($config);
        });
    }
}

