<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\ControlSelectData;
use App\Http\ViewComposers\GradoSelectData;
use App\Http\ViewComposers\GradoSeccionSelectData;
use App\Http\ViewComposers\PaisSelectData;
use App\Http\ViewComposers\SexoSelectData;
use App\Http\ViewComposers\EstadoCivilSelectData;
use App\Http\ViewComposers\TipoFamiliarSelectData;
use App\Http\ViewComposers\TipoMatriculaSelectData;

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
            'admin.alumnos.create','admin.alumnos.edit'],
            GradoSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.matricula.index','admin.matricula.edit','admin.matricula.delete'],
            GradoSeccionSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.matricula.index','admin.matricula.edit','admin.matricula.delete'],
            TipoMatriculaSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.alumnos.create','admin.alumnos.edit','admin.familiar.create','admin.familiar.edit'],
            PaisSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.alumnos.create','admin.alumnos.edit','admin.familiar.create','admin.familiar.edit'],
            SexoSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.familiar.create','admin.familiar.edit'],
            EstadoCivilSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.familiar.create','admin.familiar.edit'],
            TipoFamiliarSelectData::class
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
