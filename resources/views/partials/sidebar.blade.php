<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="{{ asset('staradmin/images/faces/face1.jpg') }}" alt="profile image">
                    </div>
                    <div class="text-wrapper">
                        <p class="profile-name">{!! Auth::user()->full_name !!}</p>
                        <div>
                            @foreach(Auth::user()->roles as $role)
                            <small class="designation text-muted">{!! ucfirst($role->name) !!}</small>
                            @endforeach
                            <span class="status-indicator online"></span>
                        </div>
                    </div>
                </div>
                <a href="{{ route('projects.create') }}" class="btn btn-success btn-block">Nuevo Proyecto
                    <i class="mdi mdi-plus"></i>
                </a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="menu-icon mdi mdi-book-open"></i>
                <span class="menu-title">Presupuestos</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#proyectos" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-content-copy"></i>
                <span class="menu-title">Proyectos</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="proyectos">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('staradmin/pages/ui-features/buttons.html') }}">Listado</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('staradmin/pages/ui-features/typography.html') }}">Expiraciones</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="menu-icon mdi mdi-shape-outline"></i>
                <span class="menu-title">Clientes</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="menu-icon mdi mdi-developer-board"></i>
                <span class="menu-title">Desarrolladores</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="menu-icon mdi mdi-file"></i>
                <span class="menu-title">Archivos</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="menu-icon mdi mdi-image"></i>
                <span class="menu-title">Imágenes</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="menu-icon mdi mdi-finance"></i>
                <span class="menu-title">Pagos</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#roles-permisos" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-adjust"></i>
                <span class="menu-title">Roles y permisos</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="roles-permisos">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('staradmin/pages/ui-features/buttons.html') }}">Roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('staradmin/pages/ui-features/typography.html') }}">Permisos</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="menu-icon mdi mdi-cube-outline"></i>
                <span class="menu-title">Proveedores</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="menu-icon mdi mdi-format-list-bulleted"></i>
                <span class="menu-title">Tareas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="menu-icon mdi mdi-account-multiple"></i>
                <span class="menu-title">Usuarios</span>
            </a>
        </li>


        {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="index.html">--}}
                {{--<i class="menu-icon mdi mdi-television"></i>--}}
                {{--<span class="menu-title">Dashboard</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item">--}}
            {{--<a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">--}}
                {{--<i class="menu-icon mdi mdi-content-copy"></i>--}}
                {{--<span class="menu-title">Basic UI Elements</span>--}}
                {{--<i class="menu-arrow"></i>--}}
            {{--</a>--}}
            {{--<div class="collapse" id="ui-basic">--}}
                {{--<ul class="nav flex-column sub-menu">--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ asset('staradmin/pages/ui-features/buttons.html') }}">Buttons</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ asset('staradmin/pages/ui-features/typography.html') }}">Typography</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</li>--}}
        {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="{{ asset('staradmin/pages/forms/basic_elements.html') }}">--}}
                {{--<i class="menu-icon mdi mdi-backup-restore"></i>--}}
                {{--<span class="menu-title">Form elements</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="{{ asset('staradmin/pages/charts/chartjs.html') }}">--}}
                {{--<i class="menu-icon mdi mdi-chart-line"></i>--}}
                {{--<span class="menu-title">Charts</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="{{ asset('staradmin/pages/tables/basic-table.html') }}">--}}
                {{--<i class="menu-icon mdi mdi-table"></i>--}}
                {{--<span class="menu-title">Tables</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="{{ asset('staradmin/pages/icons/font-awesome.html') }}">--}}
                {{--<i class="menu-icon mdi mdi-sticker"></i>--}}
                {{--<span class="menu-title">Icons</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item">--}}
            {{--<a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">--}}
                {{--<i class="menu-icon mdi mdi-restart"></i>--}}
                {{--<span class="menu-title">User Pages</span>--}}
                {{--<i class="menu-arrow"></i>--}}
            {{--</a>--}}
            {{--<div class="collapse" id="auth">--}}
                {{--<ul class="nav flex-column sub-menu">--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ asset('staradmin/pages/samples/blank-page.html') }}"> Blank Page </a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ asset('staradmin/pages/samples/login.html') }}"> Login </a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ asset('staradmin/pages/samples/register.html') }}"> Register </a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ asset('staradmin/pages/samples/error-404.html') }}"> 404 </a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ asset('staradmin/pages/samples/error-500.html') }}"> 500 </a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</li>--}}
    </ul>
</nav>