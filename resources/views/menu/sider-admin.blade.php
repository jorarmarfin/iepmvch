<div class="page-sidebar-wrapper">
<div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
                <span></span>
            </div>
        </li>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        {!!Form::menu('Escritorio',route('home.index'),'icon-home','start')!!}
        <li class="heading">
            <h3 class="uppercase">Sistema</h3>
        </li>
        {!!Form::menu('Usuarios',route('admin.users.index'),'icon-users')!!}
        <li class="nav-item  ">
            {!!Form::menulink('Configuracion','#','fa fa-cogs')!!}
            <ul class="sub-menu">
                {!!Form::menu('Maestro',route('catalogo.gestion','maestro'))!!}
                {!!Form::menu('Pais',route('catalogo.gestion','pais'))!!}
                {!!Form::menu('Tipo Familiar',route('catalogo.gestion','tipo familiar'))!!}

            </ul>
        </li>
        <li class="heading">
            <h3 class="uppercase">Modulos</h3>
        </li>
        {!!Form::menu('Asistencia',route('admin.asistencia.index'),'fa fa-cube')!!}
        {!!Form::menu('Matricula',route('admin.matricula.index'),'fa fa-cube')!!}
        {!!Form::menu('Psicologia',route('admin.reservapsicologica.index'),'fa fa-user-md')!!}
        {!!Form::menu('Alumnos',route('admin.alumnos.index'),'fa fa-users')!!}
        {!!Form::menu('Personal',route('admin.personal.index'),'fa fa-graduation-cap')!!}
        <li class="nav-item  ">
            {!!Form::menulink('Plan Curricular','#','fa fa-cubes')!!}
            <ul class="sub-menu">
                {!!Form::menu('Periodo Academico',route('catalogo.gestion','periodo academico'))!!}
                {!!Form::menu('Areas academicas',route('admin.areaacademica.index'))!!}
                {!!Form::menu('subareas',route('admin.asignatura.index'))!!}
                {!!Form::menu('Grado Area',route('admin.ags.index'))!!}
                {!!Form::menu('Docente Grado',route('admin.personalasignatura.index'))!!}
                {!!Form::menu('Tutoria',route('admin.personalgrado.index'))!!}
                {!!Form::menu('Horario',route('admin.asignatura.index'))!!}
            </ul>
        </li>
        <li class="nav-item  ">
            {!!Form::menulink('Caja','#','fa fa-money')!!}
            <ul class="sub-menu">
                {!!Form::menu('Boleta Venta',route('admin.boletaventa.index'))!!}
                {!!Form::menu('Recibo',route('admin.boletaventa.index'))!!}
                {!!Form::menu('Productos',route('admin.productos.index'))!!}
                {!!Form::menu('Serie',route('admin.serie.index'))!!}
            </ul>
        </li>
        <li class="nav-item  ">
            {!!Form::menulink('Calificacion','#','icon-book-open')!!}
            <ul class="sub-menu">
                {!!Form::menu('activar',route('admin.notas.activar.index'))!!}
                {!!Form::menu('Notas',route('admin.notas.index'))!!}
            </ul>
        </li>
        {!!Form::menu('Registros',route('admin.registro.index'),'icon-book-open')!!}
        {!!Form::menu('Almacen','#','fa fa-archive')!!}
        {!!Form::menu('Pensiones','#','fa fa-dollar')!!}
        {!!Form::menu('Cumpleaños',route('admin.birthday.index'),'icon-present')!!}
        {!!Form::menu('Lista de Utiles',route('admin.listautiles.index'),'fa fa-list')!!}
        {!!Form::menu('Memos','#','fa fa-thumbs-o-down')!!}
        {!!Form::menu('Calendarizacion','#','fa fa-calendar')!!}
        {!!Form::menu('Busqueda','#','fa fa-search')!!}
        {!!Form::menu('Postulaciones','#','fa fa-user-plus')!!}
        {!!Form::menu('Diplomas','#','icon-badge')!!}

    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
</div>
