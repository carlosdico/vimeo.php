<?php

namespace Vimeo;

use Illuminate\Support\ServiceProvider;

class TuPaqueteServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Fusiona la configuración del paquete con la del usuario
        $this->mergeConfigFrom(__DIR__.'/../config/vimeo-api.php', 'vimeo-api');
    }

    public function boot()
    {
        // Publica el archivo de configuración
        $this->publishes([
            __DIR__.'/../config/vimeo-api.php' => config_path('vimeo-api.php'),
        ], 'config');
    }
}