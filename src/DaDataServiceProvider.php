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
        $this->app->singleton('da_data_name', function () {
            return new DaDataName();
        });
        $this->app->singleton('da_data_email', function () {
            return new DaDataEmail();
        });
        $this->app->singleton('da_data_phone', function () {
            return new DaDataPhone();
        });
        $this->app->singleton('da_data_company', function () {
            return new DaDataCompany();
        });

        $this->app->alias('da_data_address', DaDataAddress::class);
        $this->app->alias('da_data_name', DaDataName::class);
        $this->app->alias('da_data_email', DaDataEmail::class);
        $this->app->alias('da_data_phone', DaDataPhone::class);
        $this->app->alias('da_data_company', DaDataCompany::class);
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
