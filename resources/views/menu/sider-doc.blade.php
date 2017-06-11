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
            <h3 class="uppercase">Docente</h3>
        </li>
        {!!Form::menu('Notas',route('docentes.notas.index'),'fa fa-cubes')!!}
        {!!Form::menu('Capacidades',route('docentes.capacidades.index'),'fa fa-cubes')!!}
        {!!Form::menu('Mensajes','#','fa fa-comment')!!}
        {!!Form::menu('Comentarios trimestre','#','fa fa-comments-o')!!}

    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
</div>
