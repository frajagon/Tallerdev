<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <div class="brand-text font-weight-light_old">
            <img src="{{asset('dist/img/logo-jardin.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        </div>
        <div class="brand-text font-weight-light_old">
            Liceo Porvenir
        </div>
    </a>


    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::user()->acudientes[0]->imagen)
                <img src="{{asset('../storage/app/public/'.Auth::user()->acudientes[0]->imagen)}}" class="img-circle elevation-2" alt="User Image">
                @else
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    {{ Auth::user()->acudientes[0]->primer_nombre }}
                    {{ Auth::user()->acudientes[0]->primer_apellido }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{URL::action('App\http\Controllers\AcudienteController@edit',Auth::user()->acudientes[0]->id)}}" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Mi Cuenta
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('docente')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Docentes
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('estudiante')}}" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>
                            Estudiantes
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('horarioatencion')}}" class="nav-link">
                        <i class="nav-icon far fa-clock"></i>
                        <p>
                            Horarios de Atenci??n
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('asistencia')}}" class="nav-link">
                        <i class="nav-icon far fa-hand-paper"></i>
                        <p>
                            Asistencia
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('calendarioactividad')}}" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Actividades
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('asistencia')}}" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Reportes
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('asistencia')}}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Calendario
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('chat')}}" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            Chat
                        </p>
                    </a>
                </li>
                <li class="nav-item" style="border-top: solid 1px white; margin: 23px 0 0 0;">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-door-open"></i>
                        <p>
                            Cerrar Sesi??n
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>