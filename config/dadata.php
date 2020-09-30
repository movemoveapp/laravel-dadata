<?php

return [
    /*
    |--------------------------------------------------------------------------
    | DaData config
    |--------------------------------------------------------------------------
    |
    | To receive the parameters of the token and the secret, you need to
    | register on the https://dadata.ru/ website and get credentials from the cabinet.
    |
    */

    'token'     => env('DADATA_TOKEN', null),

    /*
     |--------------------------------------------------------------------------
     | Secret key for standardization
     |--------------------------------------------------------------------------
     */
    'secret'    => env('DADATA_SECRET', null),

    /*
     |--------------------------------------------------------------------------
     | DaData timeout
     |--------------------------------------------------------------------------
     | The maximum number of seconds to wait for a response
     */
    'timeout'   => env('DADATA_TIMEOUT', 10),

];
