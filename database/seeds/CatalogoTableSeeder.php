<?php

use Illuminate\Database\Seeder;
use App\Models\Catalogo;

class CatalogoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catalogo::create(['idtable' => 0,'iditem' => 0, 'codigo' => 'MAE','nombre'=>'MAESTRO','descripcion'=>'MAESTRO DE TABLAS','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 1, 'codigo' => 'ROLES','nombre' => 'ROLES','descripcion'=>'Rol de lo su suarios al sistema','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 2, 'codigo' => 'ESTCIV','nombre' => 'ESTADO CIVIL','descripcion'=>'Estado civil','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 3, 'codigo' => 'TFAM','nombre' => 'TIPO FAMILIAR','descripcion'=>'TIPO DE FAMILIAR QUE POSEE EL ALUMNO','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 4, 'codigo' => 'NIV','nombre' => 'NIVEL EDUCATIVO','descripcion'=>'NIVEL EDUCATIVO','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 5, 'codigo' => 'ESTALUM','nombre' => 'ESTADO ALUMNO','descripcion'=>'ESTADO DEL ALUMNO','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 6, 'codigo' => 'REQUI','nombre' => 'REQUISITOS','descripcion'=>'Requisitos para poder matricularse','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 7, 'codigo' => 'GEST','nombre' => 'GESTION','descripcion'=>'GESTION ACADEMICA DE UNA INSTITUCION','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 8, 'codigo' => 'SISPEN','nombre' => 'SISTEMA PENSION','descripcion'=>'SISTEMA DE PENSIONES','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 9, 'codigo' => 'PERACA','nombre' => 'PERIODO ACADEMICO','descripcion'=>'PERIODO ACADEMICO','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 10, 'codigo' => 'GRAS','nombre' => 'GRUPO ASIGNATURA','descripcion'=>'AGRUPACION DE LAS ASIGNATURAS','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 11, 'codigo' => 'TMEN','nombre' => 'TIPO MENSAJE','descripcion'=>'TIPO DE MENSAJE','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 12, 'codigo' => 'EMEN','nombre' => 'ESTADO MENSAJE','descripcion'=>'ESTADO DE LOS MENSAJES','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 13, 'codigo' => 'TENT','nombre' => 'TIPO ENTRADA','descripcion'=>'Tipos de ingreso de efectivo','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 14, 'codigo' => 'MOR','nombre' => 'MORA','descripcion'=>'Mora que cobra la institucion','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 15, 'codigo' => 'TDES','nombre' => 'TIPO DESCUENTO','descripcion'=>'Tipo de descuento aplicado','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 16, 'codigo' => 'ESTASIS','nombre' => 'ESTADO ASISTENCIA','descripcion'=>'Estado de la asistencia del alumno','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 17, 'codigo' => 'ESTACA','nombre' => 'ESTADO ACADEMICO','descripcion'=>'Estado academico del alumno','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 18, 'codigo' => 'SECCION','nombre' => 'SECCION','descripcion'=>'SECCION DE ASIGNATURAS','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 19, 'codigo' => 'TPER','nombre' => 'TIPO PERSONAL','descripcion'=>'TIPO PERSONAL','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 20, 'codigo' => 'DIA','nombre' => 'DIA SEMANA','descripcion'=>'Dia de la semana','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 0,'iditem' => 21, 'codigo' => 'TSAL','nombre' => 'TIPO SALIDA','descripcion'=>'Tipo de salida de efectivo','valor'=> null,'activo'=>true]);




        /**
         * sub tablas
         */
        Catalogo::create(['idtable' => 1,'iditem' => 1, 'codigo' => 'root','nombre' => 'root','descripcion'=>'Administrador del sistema','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 1,'iditem' => 2, 'codigo' => 'ger','nombre' => 'Gerente','descripcion'=>'Gerente del la Institucion educativa ','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 1,'iditem' => 3, 'codigo' => 'adm','nombre' => 'Administrador','descripcion'=>'Administrador la Institucion educativa ','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 1,'iditem' => 4, 'codigo' => 'doc','nombre' => 'Docente','descripcion'=>'docente de la Institucion educativa ','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 1,'iditem' => 5, 'codigo' => 'pad','nombre' => 'Padre','descripcion'=>'Padre de familia ','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 1,'iditem' => 6, 'codigo' => 'pad','nombre' => 'Psicologo','descripcion'=>'Psicologo de la Institucion educativa ','valor'=> null,'activo'=>true]);
        /**
         * Estado civil
         */
        Catalogo::create(['idtable' => 2,'iditem' => 1, 'codigo' => 'sol','nombre' => 'Soltero','descripcion'=>'Soltero','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 2,'iditem' => 2, 'codigo' => 'cas','nombre' => 'Casado','descripcion'=>'Casado','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 2,'iditem' => 3, 'codigo' => 'div','nombre' => 'Divorciado','descripcion'=>'Divorciado','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 2,'iditem' => 4, 'codigo' => 'viu','nombre' => 'Viudo','descripcion'=>'Viudo','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 2,'iditem' => 5, 'codigo' => 'conv','nombre' => 'Conviviente','descripcion'=>'Conviviente','valor'=> null,'activo'=>true]);
        /**
         * Tipo de Familiar
         */
        Catalogo::create(['idtable' => 3,'iditem' => 1, 'codigo' => 'papa','nombre' => 'Papá','descripcion'=>'Padre del alumno','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 3,'iditem' => 2, 'codigo' => 'mama','nombre' => 'Mamá','descripcion'=>'Madre del alumno','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 3,'iditem' => 3, 'codigo' => 'tio','nombre' => 'Tio','descripcion'=>'Tio del alumno','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 3,'iditem' => 4, 'codigo' => 'tia','nombre' => 'Tia','descripcion'=>'Tia','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 3,'iditem' => 5, 'codigo' => 'abu','nombre' => 'Abuelo','descripcion'=>'Abuelo del alumno','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 3,'iditem' => 6, 'codigo' => 'aba','nombre' => 'Abuela','descripcion'=>'Abuela del alumno','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 3,'iditem' => 7, 'codigo' => 'hno','nombre' => 'Hermano','descripcion'=>'Hermano del alumno','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 3,'iditem' => 8, 'codigo' => 'hna','nombre' => 'Hermana','descripcion'=>'Hermana del alumno','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 3,'iditem' => 9, 'codigo' => 'drino','nombre' => 'Padrino','descripcion'=>'Padrino del alumno','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 3,'iditem' => 10, 'codigo' => 'drina','nombre' => 'Madrina','descripcion'=>'Madrina del alumno','valor'=> null,'activo'=>true]);
        /**
         * Nivel Eduativo
         */
        Catalogo::create(['idtable' => 4,'iditem' => 1, 'codigo' => 'Pri','nombre' => 'Primaria','descripcion'=>'Primaria','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 4,'iditem' => 2, 'codigo' => 'Sec','nombre' => 'Secundaria','descripcion'=>'Secundaria','valor'=> null,'activo'=>true]);
        /**
         * Estado del alumno
         */
        Catalogo::create(['idtable' => 5,'iditem' => 1, 'codigo' => 'reg','nombre' => 'Regular','descripcion'=>'Alumno regular si alguna observacion','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 5,'iditem' => 2, 'codigo' => 'sus','nombre' => 'Suspendido','descripcion'=>'Alumno suspendido temporalmente','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 5,'iditem' => 3, 'codigo' => 'ret','nombre' => 'Retirado','descripcion'=>'Alumno retirado de la institucion','valor'=> null,'activo'=>true]);
        /**
         * Requisitos de matricula
         */
        Catalogo::create(['idtable' => 6,'iditem' => 1, 'codigo' => '01','nombre' => 'R1','descripcion'=>'Fotocopia legible del DNI fedateada (Inicial y 1° Prim)','valor'=> 1,'activo'=>true]);
        Catalogo::create(['idtable' => 6,'iditem' => 2, 'codigo' => '02','nombre' => 'R2','descripcion'=>'Tarjeta de control de vacunas (Hasta 1° Prim)','valor'=> 2,'activo'=>true]);
        Catalogo::create(['idtable' => 6,'iditem' => 3, 'codigo' => '03','nombre' => 'R3','descripcion'=>'Partida de Nacimiento','valor'=> 3,'activo'=>true]);
        Catalogo::create(['idtable' => 6,'iditem' => 4, 'codigo' => '04','nombre' => 'R4','descripcion'=>'Certificado de Estudios','valor'=> 4,'activo'=>true]);
        Catalogo::create(['idtable' => 6,'iditem' => 5, 'codigo' => '05','nombre' => 'R5','descripcion'=>'R.D. de Traslados','valor'=> 5,'activo'=>true]);
        Catalogo::create(['idtable' => 6,'iditem' => 6, 'codigo' => '06','nombre' => 'R6','descripcion'=>'Certificado de comportamiento','valor'=> 6,'activo'=>true]);
        Catalogo::create(['idtable' => 6,'iditem' => 7, 'codigo' => '07','nombre' => 'R7','descripcion'=>'02 fotos tamaño carne (actualizadas)','valor'=> 7,'activo'=>true]);
        Catalogo::create(['idtable' => 6,'iditem' => 8, 'codigo' => '08','nombre' => 'R8','descripcion'=>'Libreta de notas del año anterior','valor'=> 8,'activo'=>true]);
        Catalogo::create(['idtable' => 6,'iditem' => 9, 'codigo' => '09','nombre' => 'R9','descripcion'=>'Ficha de matricula','valor'=> 9,'activo'=>true]);
        Catalogo::create(['idtable' => 6,'iditem' =>10, 'codigo' => '10','nombre' => 'R10','descripcion'=>'Constancia de no adeudo','valor'=> 10,'activo'=>true]);
        Catalogo::create(['idtable' => 6,'iditem' =>11, 'codigo' => '11','nombre' => 'R11','descripcion'=>'Fotocopia del DNI del Padre','valor'=> 11,'activo'=>true]);
        Catalogo::create(['idtable' => 6,'iditem' =>12, 'codigo' => '12','nombre' => 'R12','descripcion'=>'Fotocopia del DNI de la Madre','valor'=> 12,'activo'=>true]);
        Catalogo::create(['idtable' => 6,'iditem' =>13, 'codigo' => '13','nombre' => 'R13','descripcion'=>'Fotocopia del DNI del apoderado','valor'=> 13,'activo'=>true]);
        Catalogo::create(['idtable' => 6,'iditem' =>14, 'codigo' => '14','nombre' => 'R14','descripcion'=>'Ficha de inscripción (otorgada por la I.E.P)','valor'=> 14,'activo'=>true]);
        Catalogo::create(['idtable' => 6,'iditem' =>15, 'codigo' => '15','nombre' => 'R15','descripcion'=>'Entrevista Psicológica','valor'=> 15,'activo'=>true]);
        /**
         * Gestion
         */
        Catalogo::create(['idtable' => 7,'iditem' => 1, 'codigo' => 'PRIV','nombre' => 'Privada','descripcion'=>'Privada','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 7,'iditem' => 2, 'codigo' => 'EST','nombre' => 'Estatal','descripcion'=>'Estatal','valor'=> null,'activo'=>true]);
        /**
         * Sistema de pensiones
         */
        Catalogo::create(['idtable' => 8,'iditem' => 1, 'codigo' => 'ONP','nombre' => 'ONP','descripcion'=>'Oficina de normalizacion Provisional','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 8,'iditem' => 2, 'codigo' => 'AFP','nombre' => 'AFP','descripcion'=>'Administradora de fondo de pensiones','valor'=> null,'activo'=>true]);
        /**
         * Periodo Academico
         */
        Catalogo::create(['idtable' => 9,'iditem' => 1, 'codigo' => '1','nombre' => '1er Trimestre','descripcion'=>'Primer Trimestre','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 9,'iditem' => 2, 'codigo' => '2','nombre' => '2do Trimestre','descripcion'=>'Segundo Trimestre','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 9,'iditem' => 3, 'codigo' => '3','nombre' => '3er Trimestre','descripcion'=>'Tercer Trimestre','valor'=> null,'activo'=>true]);
        /**
         * Grupos para las asignaturas
         */
        Catalogo::create(['idtable' => 10,'iditem' => 1, 'codigo' => 'G01','nombre' => 'Matematica','descripcion'=>'Agrupa en matematica','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 10,'iditem' => 2, 'codigo' => 'G02','nombre' => 'Comunicacion','descripcion'=>'Agrupa en comunicacion','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 10,'iditem' => 3, 'codigo' => 'G03','nombre' => 'Personal social','descripcion'=>'Agrupa en Personal social','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 10,'iditem' => 4, 'codigo' => 'G04','nombre' => 'HGE','descripcion'=>'Agrupa en HGE','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 10,'iditem' => 5, 'codigo' => 'G05','nombre' => 'CTA','descripcion'=>'Agrupa en CTA','valor'=> null,'activo'=>true]);
        /**
         * Tipo de mensaje
         */
        Catalogo::create(['idtable' => 11,'iditem' => 1, 'codigo' => 'M01','nombre' => 'Regular','descripcion'=>'Es un mensaje comun ','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 11,'iditem' => 2, 'codigo' => 'M02','nombre' => 'Llamada de atencion','descripcion'=>'Llamada de atencion al personal','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 11,'iditem' => 3, 'codigo' => 'M03','nombre' => 'Urgente','descripcion'=>'Mensaje de caracter urgente','valor'=> null,'activo'=>true]);
        /**
         * Estado de los mensajes
         */
        Catalogo::create(['idtable' => 12,'iditem' => 1, 'codigo' => 'SMS01','nombre' => 'Nuevo','descripcion'=>'Mensaje nuevo','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 12,'iditem' => 2, 'codigo' => 'SMS02','nombre' => 'Visto','descripcion'=>'Mensaje Visto','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 12,'iditem' => 3, 'codigo' => 'SMS02','nombre' => 'Leido','descripcion'=>'Mensaje leido','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 12,'iditem' => 4, 'codigo' => 'SMS03','nombre' => 'Archivadp','descripcion'=>'Mensaje Archivado','valor'=> null,'activo'=>true]);
        /**
         * Pension
         */
        Catalogo::create(['idtable' => 13,'iditem' => 1, 'codigo' => 'PEN','nombre' => 'Pension','descripcion'=>'Pago mensual que se realiza a la IE','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 13,'iditem' => 2, 'codigo' => 'VENT','nombre' => 'Ventas','descripcion'=>'Ventas','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 13,'iditem' => 3, 'codigo' => 'CERT','nombre' => 'Certificados','descripcion'=>'Certificados','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 13,'iditem' => 4, 'codigo' => 'PAS','nombre' => 'Paseos','descripcion'=>'Paseos','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 13,'iditem' => 5, 'codigo' => 'EXARE','nombre' => 'Examenes Recuperacion','descripcion'=>'Examenes de recuperacion','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 13,'iditem' => 6, 'codigo' => 'MATR','nombre' => 'Matricula','descripcion'=>'pago por concepto de matricula','valor'=> null,'activo'=>true]);
        /**
         * Mora
         */
        Catalogo::create(['idtable' => 14,'iditem' => 1, 'codigo' => 'MOR01','nombre' => 'Mora 1','descripcion'=>'Mora 1','valor'=> 10,'activo'=>true]);
        /**
         * Tipo de descuento
         */
        Catalogo::create(['idtable' => 15,'iditem' => 1, 'codigo' => 'DES01','nombre' => 'Cantidad','descripcion'=>'Descuenta la cantidad','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 15,'iditem' => 2, 'codigo' => 'DES02','nombre' => 'Porcentaje','descripcion'=>'Descuenta el porcentaje de la cantidad','valor'=> null,'activo'=>true]);
        /**
         * Asistencia
         */
        Catalogo::create(['idtable' => 16,'iditem' => 1, 'codigo' => 'A','nombre' => 'Asistio','descripcion'=>'Asistio','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 16,'iditem' => 2, 'codigo' => 'F','nombre' => 'Falto','descripcion'=>'Falto','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 16,'iditem' => 3, 'codigo' => 'T','nombre' => 'Tardanza','descripcion'=>'Tardanza','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 16,'iditem' => 4, 'codigo' => 'T/J','nombre' => 'Tardanza/justificada','descripcion'=>'Tardanaza justificada','valor'=> null,'activo'=>true]);
        /**
         * Estado academico del alumno
         */
        Catalogo::create(['idtable' => 17,'iditem' => 1, 'codigo' => 'Pro','nombre' => 'Promovido','descripcion'=>'Alumno promovido','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 17,'iditem' => 2, 'codigo' => 'reqrec','nombre' => 'Requiere recuperacion','descripcion'=>'Alumno que requiere recuperacion','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 17,'iditem' => 3, 'codigo' => 'rep','nombre' => 'Repite','descripcion'=>'El alumno repite de año','valor'=> null,'activo'=>true]);
        /**
         * Secciones
         */
        Catalogo::create(['idtable' => 18,'iditem' => 1, 'codigo' => 'A','nombre' => 'A','descripcion'=>'Seccion A','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 18,'iditem' => 2, 'codigo' => 'B','nombre' => 'B','descripcion'=>'Seccion B','valor'=> null,'activo'=>true]);
        /**
         * Tipo de personal
         */
        Catalogo::create(['idtable' => 19,'iditem' => 1, 'codigo' => 'Admin','nombre' => 'Administrativo','descripcion'=>'Administrativo','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 19,'iditem' => 2, 'codigo' => 'Docen','nombre' => 'Docente','descripcion'=>'Personal docente','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 19,'iditem' => 3, 'codigo' => 'Pisco','nombre' => 'Psicologo','descripcion'=>'Psicologo','valor'=> null,'activo'=>true]);
        /**
         * Dia de la semana
         */
        Catalogo::create(['idtable' => 20,'iditem' => 1, 'codigo' => 'L','nombre' => 'Lunes','descripcion'=>'Dia lunes','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 20,'iditem' => 2, 'codigo' => 'M','nombre' => 'Martes','descripcion'=>'Dia Martes','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 20,'iditem' => 3, 'codigo' => 'I','nombre' => 'Miercoles','descripcion'=>'Dia Miercoles','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 20,'iditem' => 4, 'codigo' => 'J','nombre' => 'Jueves','descripcion'=>'Dia Jueves','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 20,'iditem' => 5, 'codigo' => 'V','nombre' => 'Viernes','descripcion'=>'Dia viernes','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 20,'iditem' => 6, 'codigo' => 'S','nombre' => 'Sabado','descripcion'=>'Dia Sabado','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 20,'iditem' => 7, 'codigo' => 'D','nombre' => 'Domingo','descripcion'=>'Dia Domingo','valor'=> null,'activo'=>true]);
        /**
         * Tipo de salida de efectivo
         */
        Catalogo::create(['idtable' => 21,'iditem' => 1, 'codigo' => 'TS01','nombre' => 'Tributos','descripcion'=>'Sueldo de docente','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 21,'iditem' => 2, 'codigo' => 'TS02','nombre' => 'Servicios','descripcion'=>'Adelanto del sueldo','valor'=> null,'activo'=>true]);
        Catalogo::create(['idtable' => 21,'iditem' => 3, 'codigo' => 'TS03','nombre' => 'Gastos Varios','descripcion'=>'descripcion','valor'=> null,'activo'=>true]);


















    }
}