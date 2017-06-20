﻿SELECT N.NOMBRE AS NIVEL,G.NOMBRE AS GRADO, 
A.PATERNO||'-'||A.MATERNO||','||A.NOMBRES AS ALUMNO,
P.PATERNO||'-'||P.MATERNO||','||P.NOMBRES AS DOCENTE,
AC.NOMBRE AS AREA,AA.NOMBRE AS ASIGNATURA,
R.IN_01,R.IN_02,R.IN_03,R.IN_04,R.IN_05,R.IN_06,R.IN_07,R.IN_08,R.IN_09,R.IN_10,R.IN_11,
R.IN_11,R.IN_12,R.IN_13,R.IN_14,R.IN_15,R.IN_16,R.IN_17,R.IN_18,R.IN_19,R.IN_20,
AC_01,AC_02,AC_03,AC_04,AC_05,
PC01,PC02,PC03,PC04,PC05,PC06,PC07,PC08,PC09,PC10,
P_T_1
FROM REGISTRO R
INNER JOIN MATRICULA M ON M.ID=R.IDMATRICULA
INNER JOIN ALUMNO A ON A.ID=M.IDALUMNO
INNER JOIN GRADO_SECCION GS ON GS.ID=M.IDGRADOSECCION
INNER JOIN GRADO G ON G.ID=GS.IDGRADO
INNER JOIN CATALOGO N ON N.ID=G.IDNIVEL
INNER JOIN PERSONAL_ASIGNATURA PA ON PA.ID=R.IDPERSONALASIGNATURA
INNER JOIN PERSONAL P ON P.ID=PA.IDPERSONAL
INNER JOIN ASIGNATURA_GRADO_SECCION AGS ON AGS.ID=PA.IDASIGNATURAGRADOSECCION
LEFT JOIN ASIGNATURA AA ON AA.ID=AGS.IDASIGNATURA
LEFT JOIN AREA_ACADEMICA AC ON AC.ID=AGS.IDAREA
WHERE R.IDPERIODOACADEMICO=89 AND N.NOMBRE IN ('Primaria','Secundaria')


SELECT PA.IDPERSONAL,P.PATERNO||'-'||P.MATERNO||','||P.NOMBRES AS DOCENTE,
C.NOMBRE AS CAPACIDAD,CD.NOMBRE AS INDICADOR
FROM CAPACIDAD C
INNER JOIN CAPACIDAD_DETALLE CD ON CD.IDCAPACIDAD=C.ID
INNER JOIN PERSONAL_ASIGNATURA PA ON PA.ID=C.ID
INNER JOIN PERSONAL P ON P.ID=PA.IDPERSONAL
INNER JOIN ASIGNATURA_GRADO_SECCION AGS ON AGS.ID=

