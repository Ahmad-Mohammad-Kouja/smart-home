<?php

namespace App\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use stdClass;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Arr::macro('groupBy',function($array,$key)
        {
            $grouppedData = array();
            foreach($array as $data)
                $grouppedData[$data->{$key}][] = $data;

            return $grouppedData;
        });
    }
}
