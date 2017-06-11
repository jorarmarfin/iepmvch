<?php

use App\Models\Alumno;
use App\Models\AlumnoFamiliar;
use App\Models\Capacidad;
use App\Models\Catalogo;
use App\Models\Institucion;
use App\Models\PeriodoPractica;
if (! function_exists('RoleId')) {
	/**
	 * Funcion que retorna el prefijo para nombres de archivos
	 * @return [type] [description]
	 */
    function RoleId($name)
    {
    	$role = Catalogo::select('id')->table('ROLES')->where('codigo',$name)->first();
        return $role->id;
    }
}
/**
 * Devuelve el id estado de catalogo
 */
if (! function_exists('EstadoId')) {
	/**
	 *
	 * @return [type] [description]
	 */
    function EstadoId($table,$name)
    {
    	$role = Catalogo::select('id')->table($table)->where('nombre',$name)->first();
        return $role->id;
    }
}
/**
 * Devuelve eñ id del estado civil
 */
if (! function_exists('EstadoCivilId')) {
    /**
     *
     * @return [type] [description]
     */
    function EstadoCivilId($table,$name)
    {
        $role = Catalogo::select('id')->table($table)->where('nombre',$name)->first();
        return $role->id;
    }
}
/**
 * Devuelve el id estado de catalogo
 */
if (! function_exists('UbigeoPersonal')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function UbigeoPersonal($seleccionar,$id)
    {
        if (isset($id)) {
            $ubigeo = ['-1' => "Seleccionar $seleccionar"]+Catalogo::where('id',$id)->pluck('nombre','id')->toarray();
        } else {
            $ubigeo=[];
        }
        return $ubigeo;
    }
}

/**
 * Devuelve el id del pais peru
 */
if (! function_exists('IdPeru')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function IdPeru()
    {
        $paises = Catalogo::select('id')->table('PAIS')->where('nombre','PERÚ')->first();

        return $paises->id;
    }
}

/**
 * Devuelve el id del sexo masculino
 */
if (! function_exists('IdMasculino')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function IdMasculino()
    {
        $sexo = Catalogo::select('id')->table('SEXO')->where('nombre','Masculino')->first();

        return $sexo->id;
    }
}

/**
 * Devuelve el id del sexo masculino
 */
if (! function_exists('NombreAlumno')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function NombreAlumno($id)
    {
        $alumno = Alumno::find($id);

        return $alumno->nombre_completo;
    }
}

/**
 * Devuelve el id del sexo masculino
 */
if (! function_exists('LinkActivo')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function LinkActivo($id,$link = '#')
    {

        $alumno = Alumno::find($id);
        if ($id) return '<a href="'.$link.'" class="label label-sm label-info"> Activo </a>';
        else return '<a href="'.$link.'" class="label label-sm label-danger"> Inactivo </a>';
    }
}
/**
 * Devuelve el id del sexo masculino
 */
if (! function_exists('igv')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function igv()
    {

        $igv = Catalogo::table('IGV')->activo()->first();
        return $igv->valor;
    }
}
/**
 * Devuelve el Ruc de la Institucion
 */
if (! function_exists('ruc')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function ruc()
    {
        $institucion = Institucion::first();
        return $institucion->ruc;
    }
}
/**
 * Devuelve un pad del elemento que ingrese
 */
if (! function_exists('pad')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function pad($input,$cant,$aguja,$lado = null)
    {
        switch ($lado) {
            case 'L':
                $pad = str_pad($input, $cant, $aguja,STR_PAD_LEFT);
                break;
            case 'B':
                $pad = str_pad($input, $cant, $aguja,STR_PAD_BOTH);
                break;

            default:
                $pad = str_pad($input, $cant, $aguja);
                break;
        }

        return $pad;
    }
}

/**
 * Devuelve un pad del elemento que ingrese
 */
if (! function_exists('str_clean')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function str_clean($string)
    {
         $string = trim($string);
         $string = str_replace(
                array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
                array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
                $string
            );

            $string = str_replace(
                array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
                array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
                $string
            );

            $string = str_replace(
                array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
                array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
                $string
            );

            $string = str_replace(
                array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
                array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
                $string
            );

            $string = str_replace(
                array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
                array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
                $string
            );

            $string = str_replace(
                array('ñ', 'Ñ', 'ç', 'Ç'),
                array('n', 'N', 'c', 'C',),
                $string
            );
         //Esta parte se encarga de eliminar cualquier caracter extraño
            $string = str_replace(
                array("¨", "º", "-", "~",
                     '#', "@", "|", "!", '"',
                     "·", "$", "%", "&", "/",
                     "(", ")", "?", "'", "¡",
                     "¿", "[", "^", "<code>", "]",
                     "+", "}", "{", "¨", "´",
                     ">", "< ", ";", ",", ":",
                     "."),
                '',
                $string
            );

    return $string;
    }
}

/**
 * Devuelve un pad del elemento que ingrese
 */
if (! function_exists('PracticaActiva')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function PracticaActiva($idperiodo,$numero_practica)
    {
        $practica = 'pc'.str_pad($numero_practica, 2, '0',STR_PAD_LEFT);
        $activador = PeriodoPractica::where('idperiodoacademico',$idperiodo)->first();

        return $activador[$practica];
    }
}
/**
 * Activa el Registro de NOtas Trimestrales
 */
if (! function_exists('TrimestreActivo')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function TrimestreActivo($numero_trimestre)
    {
        $periodo = Catalogo::select('id')->table('PERIODO ACADEMICO')->where('iditem',$numero_trimestre)->first();
        $activador = PeriodoPractica::where('idperiodoacademico',$periodo->id)->first();

        return $activador->examen;
    }
}
/**
 * Activa el Registro de NOtas Trimestrales
 */
if (! function_exists('ComportamientoActivo')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function ComportamientoActivo($periodo)
    {
        $activador = PeriodoPractica::where('idperiodoacademico',$periodo)->first();

        return $activador->comportamiento;
    }
}
/**
 * Activa el Registro de Indicadores
 */
if (! function_exists('IndicadorActivo')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function IndicadorActivo($periodo,$indicador)
    {
        $indicador = 'in'.pad($indicador,2,'0','L');
        $activador = PeriodoPractica::where('idperiodoacademico',$periodo)->first();

        return $activador[$indicador];
    }
}
/**
 * Activa el Registro de Actitud
 */
if (! function_exists('ActitudActiva')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function ActitudActiva($periodo,$actitud)
    {
        $actitud = 'ac'.pad($actitud,2,'0','L');
        $activador = PeriodoPractica::where('idperiodoacademico',$periodo)->first();

        return $activador[$actitud];
    }
}
/**
 * Activa el Registro de Cuaderno
 */
if (! function_exists('CuadernoActivo')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function CuadernoActivo($periodo)
    {
        $activador = PeriodoPractica::where('idperiodoacademico',$periodo)->first();

        return $activador->cuaderno;
    }
}

