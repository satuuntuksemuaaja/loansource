<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

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
        Collection::macro('googleMaps', function ($address, $label) {
            return $this->map(function ($value) use ($address, $label) {
                return [
                    'address' => $value->$address,
                    'label' => $value->$label
                ];
            });
        });
    }
}
