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
        <li class="nav-item start ">
            <a href="{{ route('home.index') }}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Escritorio</span>
                <span class="arrow"></span>
            </a>
        </li>
        <li class="heading">
            <h3 class="uppercase">Modulos</h3>
        </li>
        {!!Form::menu('Reservas','#','fa fa-cube')!!}

    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
</div>
