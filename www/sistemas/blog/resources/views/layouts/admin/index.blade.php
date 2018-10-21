@extends("layouts.admin")

@section("content")

<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Admin Cinema</h3>
        </div>

        <ul class="list-unstyled components">
            <p><a href="{{URL::to('/admin')}}">Bienvenidos</a></p>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-film"></i> Peliculas</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="{{URL::to('titulos')}}">Titulos</a>
                    </li>
                    <li>
                        <a href="{{URL::to('genero')}}">Genero</a>
                    </li>
                    <li>
                        <a href="{{URL::to('calidad')}}">Calidad</a>
                    </li>
                    <li>
                        <a href="#">Servidores</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{URL::to('usuarios')}}"><i class="fas fa-user"></i>&nbsp;Usuarios</a>
            </li>
            <li>
                <a href="{{URL::to('/admin')}}"><i class="fas fa-sign-out-alt text-right"></i>&nbsp;About</a>
            </li>
            <!-- <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Peliculas</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Peliculas</a>
                    </li>
                    <li>
                        <a href="#">Genero</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul> -->

    </nav>
    <!-- Page Content -->
    <div id="content" class="pt-0">
        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-justify"></i>
            <!-- <span>Toggle Sidebar</span> -->
        </button>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                @yield("content_admin")
            </div>
        </nav>
    </div>
</div>
<script type="text/javascript">
        function TableActions (value, row, index) {
            return [
                '<a class="btn btn-info" href="'+row.ruta_edit+'" title="Edit">',
                '<i class="fas fa-pencil-alt "></i>',
                '</a>'
            ].join('');

        }
    </script>
@stop