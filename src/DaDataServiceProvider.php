<?php

namespace MoveMoveIo\DaData;

use Carbon\Laravel\ServiceProvider;

/**
 * Class DaDataServiceProvider
 * @package MoveMoveIo\DaData
 */
class DaDataServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('da_data_address', function () {
            return new DaDataAddress();
        });

        $this->app->alias('da_data_address', DaDataAddress::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/dadata.php'   => config_path('dadata.php'),
        ]);
    }


}
