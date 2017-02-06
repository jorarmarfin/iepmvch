<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Catalogo;
use App\Models\Familiar;
use App\Models\Matricula;
use App\Models\Producto;
use Auth;
use DB;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function getavatar()
    {
    	$foto = Auth::user()->foto;
        dd($foto);
        $headers = [];
        return response()->download(
            storage_path('app/'.$foto),
            null,
            $headers
        );
    }
    /**
     * Devuelve el Ubigeo
     * @return [type] [description]
     */
    public function ubigeo(Request $request)
    {
        $name = $request->varsearch ?:'';
        $name = trim(strtoupper($name));
        $ubigeo = Catalogo::ubigeo($name);
        return $ubigeo;
    }
    /**
     * Devuelve Los familiares
     * @return [type] [description]
     */
    public function familiares(Request $request)
    {
        $name = $request->varsearch ?:'';
        $name = strtoupper($name);
        $query = "paterno||' - '||materno||', '||nombres";
        $familiares = Familiar::select('id',DB::raw("$query as text"))
                        ->whereRaw("upper(paterno) like '%$name%'")
                        ->orwhereRaw("upper(materno) like '%$name%'")
                        ->orwhereRaw("upper(nombres) like '%$name%'")
                        ->get();
        return $familiares;
    }
    /**
     * Devuelve listado de alumnos matriculables
     * @return [type] [description]
     */
    public function matriculables(Request $request)
    {
        $condicion = Catalogo::select('id')
                                ->table('ESTADO ALUMNO')
                                ->whereIn('nombre',['Regular','Promovido'])
                                ->get();
        $name = $request->varsearch ?:'';
        $name = strtoupper($name);
        $query = "alumno.paterno||' - '||alumno.materno||', '||alumno.nombres||' - '||g.nombre";
        $matriculables = Alumno::select('alumno.id',DB::raw("$query as text"))
                        ->join('grado as g','g.id','=','alumno.idgrado')
                        ->whereIn('idestado',$condicion)
                        ->whereRaw("upper(paterno) like '%$name%'")
                        ->orwhereRaw("upper(materno) like '%$name%'")
                        ->orwhereRaw("upper(nombres) like '%$name%'")
                        ->alfabetico()
                        ->get();
        return $matriculables;
    }
    /**
     * Devuelve listado de alumnos matriculables
     * @return [type] [description]
     */
    public function matriculados(Request $request)
    {
        $condicion = EstadoId('TIPO MATRICULA','Activa');

        $name = $request->varsearch ?:'';
        $name = strtoupper($name);
        $query = "a.paterno||' - '||a.materno||', '||a.nombres||' - '||g.nombre";
        $retval = Matricula::select('matricula.id',DB::raw("$query as text"))
                            ->join('alumno as a','a.id','=','idalumno')
                            ->join('grado_seccion as gs','gs.id','=','idgradoseccion')
                            ->join('grado as g','g.id','=','gs.idgrado')
                            ->where('idtipo',$condicion)
                            ->whereRaw("upper(a.paterno) like '%$name%'")
                            ->orwhereRaw("upper(a.materno) like '%$name%'")
                            ->orwhereRaw("upper(a.nombres) like '%$name%'")
                            ->get();
        return $retval;
    }
    /**
     * Devuelve listado de productos
     * @return [type] [description]
     */
    public function productos(Request $request)
    {
        $id = $request->varsearch ?:'';
        if($request->has('varsearch')) $producto = Producto::find($id);
        else $producto = Producto::all();
        return $producto;


    }
    /**
     * Devuelve listado de DNI disponible
     * @return [type] [description]
     */
    public function numidentificacion(Request $request)
    {
        $name = $request->varsearch ?:'';
        $name = strtoupper($name);
        $query = "paterno||' - '||materno||', '||nombres";
        $identificacion = Familiar::select('dni',DB::raw("$query as nombres"),'direccion')
                        ->where('dni','like',"%$name%")
                        ->get();
        return $identificacion;
    }
}
