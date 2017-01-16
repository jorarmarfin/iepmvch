<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\ControlSelectData;
use App\Http\ViewComposers\GradoSelectData;
use App\Http\ViewComposers\PaisSelectData;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make('view')->composer(
            ['admin.users.index','admin.users.edit','admin.users.delete'],
            ControlSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.reservapsicologica.create','admin.reservapsicologica.delete','admin.reservapsicologica.edit',
            'admin.alumnos.create'],
            GradoSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.alumnos.create'],
            PaisSelectData::class
            );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
