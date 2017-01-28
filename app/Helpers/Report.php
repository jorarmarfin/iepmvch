<?php

use App\Models\Institucion;

if (! function_exists('ReportHeaderRecibo')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function ReportHeaderRecibo()
    {
        $institucion = Institucion::first();
        PDF::Image(asset('assets/pages/img/insignia.jpg'),15,10,13);

        PDF::SetFont('helvetica','B',9);
        PDF::SetXY(29,10);
        PDF::Cell(150,5,$institucion->razonsocial,0,2,'L');
        PDF::SetXY(29,13);
        PDF::SetFont('helvetica','B',9);
        PDF::Cell(150,5,$institucion->resolucion,0,2,'L');
        PDF::SetXY(29,17);
        PDF::SetFont('helvetica','',7);
        PDF::Cell(150,5,$institucion->direccion,0,2,'L');
        PDF::SetXY(29,20);
        PDF::Cell(150,5,$institucion->telefonos,0,0,'L');
        #   NUMERO DE PAGINA
        PDF::SetFont('helvetica', 'B', 8);
        PDF::SetXY(160, 35);
        PDF::Cell(13, 5, "Fecha :", 0, 0, 'L');
        PDF::SetXY(173, 35);
        PDF::Cell(17, 5, date('d/m/Y'), 0, 0, 'R');
        PDF::SetXY(160, 38);
        PDF::Cell(13, 5, "Hora :", 0, 0, 'L');
        PDF::SetXY(173, 38);
        PDF::Cell(17, 5, date('H:i:s'), 0, 0, 'R');
    }
}
if (! function_exists('ReportHeader')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function ReportHeader($hoja = 'A4')
    {
        $institucion = Institucion::first();
        PDF::Image(asset('assets/pages/img/insignia.jpg'),15,10,13);

        PDF::SetFont('helvetica','B',9);
        PDF::SetXY(29,10);
        PDF::Cell(150,5,$institucion->razonsocial,0,2,'L');
        PDF::SetXY(29,13);
        PDF::SetFont('helvetica','B',9);
        PDF::Cell(150,5,$institucion->resolucion,0,2,'L');
        PDF::SetXY(29,17);
        PDF::SetFont('helvetica','',7);
        PDF::Cell(150,5,$institucion->direccion,0,2,'L');
        PDF::SetXY(29,20);
        PDF::Cell(150,5,$institucion->telefonos,0,0,'L');
        #   NUMERO DE PAGINA
        PDF::SetFont('helvetica', 'B', 8);
        PDF::SetXY(160, 15);
        PDF::Cell(13, 5, "Fecha :", 0, 0, 'L');
        PDF::SetXY(173, 15);
        PDF::Cell(17, 5, date('d/m/Y'), 0, 0, 'R');
        PDF::SetXY(160, 18);
        PDF::Cell(13, 5, "Hora :", 0, 0, 'L');
        PDF::SetXY(173, 18);
        PDF::Cell(17, 5, date('H:i:s'), 0, 0, 'R');
    }
}