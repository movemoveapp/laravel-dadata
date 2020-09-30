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
        $this->app->bind('da_data_address', function () {
            return new DaDataAddressService();
        });
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
