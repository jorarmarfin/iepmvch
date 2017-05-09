<?php

namespace App\Providers;

use App\Http\ViewComposers\AreaSelectData;
use App\Http\ViewComposers\AsignaturaSelectData;
use App\Http\ViewComposers\ControlSelectData;
use App\Http\ViewComposers\DiaSemanaSelectData;
use App\Http\ViewComposers\EstadoAlumnoSelectData;
use App\Http\ViewComposers\EstadoAsistenciaSelectData;
use App\Http\ViewComposers\EstadoCivilSelectData;
use App\Http\ViewComposers\GestionSelectData;
use App\Http\ViewComposers\GradoSeccionSelectData;
use App\Http\ViewComposers\GradoSelectData;
use App\Http\ViewComposers\PaisSelectData;
use App\Http\ViewComposers\PersonalSelectData;
use App\Http\ViewComposers\ProductosSelectData;
use App\Http\ViewComposers\SexoSelectData;
use App\Http\ViewComposers\SistemaPensionSelectData;
use App\Http\ViewComposers\TipoDocumentoSelectData;
use App\Http\ViewComposers\TipoFamiliarSelectData;
use App\Http\ViewComposers\TipoIGVSelectData;
use App\Http\ViewComposers\TipoIdentificacionSelectData;
use App\Http\ViewComposers\TipoMatriculaSelectData;
use App\Http\ViewComposers\TipoPersonalSelectData;
use Illuminate\Support\ServiceProvider;

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
            'admin.alumnos.create','admin.alumnos.edit','admin.listautiles.index'],
            GradoSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.matricula.index','admin.matricula.edit','admin.matricula.delete','admin.asistencia.index',
             'admin.ags.index','admin.docenteasignatura.index'
            ],
            GradoSeccionSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.matricula.index','admin.matricula.edit','admin.matricula.delete'],
            TipoMatriculaSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.alumnos.create','admin.alumnos.edit','admin.familiar.create','admin.familiar.edit',
            'admin.personal.create','admin.personal.edit'
            ],
            PaisSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.alumnos.create','admin.alumnos.edit','admin.familiar.create','admin.familiar.edit',
            'admin.personal.create','admin.personal.edit'
            ],
            SexoSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.familiar.create','admin.familiar.edit','admin.personal.create','admin.personal.edit'],
            EstadoCivilSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.alumnos.create','admin.alumnos.edit'],
            EstadoAlumnoSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.familiar.create','admin.familiar.edit','admin.retiro.index'],
            TipoFamiliarSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.personal.create','admin.personal.edit'],
            GestionSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.personal.create','admin.personal.edit'],
            SistemaPensionSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.personal.create','admin.personal.edit'],
            TipoPersonalSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.disponibilidad.index','admin.disponibilidad.edit','admin.disponibilidad.delete'],
            DiaSemanaSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.disponibilidad.index','admin.disponibilidad.edit','admin.disponibilidad.delete',
            'admin.reservapsicologica.create','admin.reservapsicologica.edit','admin.docenteasignatura.index'
            ],
            PersonalSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.asignatura.create','admin.asignatura.edit','admin.ags.index'
            ],
            AreaSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.boletaventa.create','admin.boletaventa.edit'
            ],
            TipoDocumentoSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.boletaventa.create','admin.boletaventa.edit'
            ],
            ProductosSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.boletaventa.create','admin.boletaventa.edit'
            ],
            TipoIGVSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.boletaventa.create','admin.boletaventa.edit'
            ],
            TipoIdentificacionSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.asistencia.index'
            ],
            EstadoAsistenciaSelectData::class
            );
        $this->app->make('view')->composer(
            ['admin.ags.index'
            ],
            AsignaturaSelectData::class
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
