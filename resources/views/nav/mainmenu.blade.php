<li><a href="{{ route('home') }}">Home</a></li>
@can(['ver periodos lectivos', 'ver docentes'])
    <li tabindex="0" class="m-0">
        <details>
            <summary style="padding-left: 0px; margin-left: -3px;">
                Administración
            </summary>
            <ul tabindex="0"
                class="p-2 bg-base-100 text-neutral">
                @can('ver periodos lectivos')
                    <li class="hover-bordered">
                        <a class="w-full justify-between" href="{{ route('periodoLectivo.index') }}">
                            Periodos Lectivos
                        </a>
                    </li>
                @endcan
                @can('ver docentes')
                    <li class="hover-bordered">
                        <a class="w-full justify-between" href="{{ route('docente.index') }}">
                            Docentes
                        </a>
                    </li>
                @endcan
                @can('ver usuarios')
                    <li class="hover-bordered">
                        <a class="w-full justify-between" href="{{ route('user.index') }}">
                            Usuarios
                        </a>
                    </li>
                @endcan
            </ul>
        </details>
    </li>
@endcan
@can('ver planificaciones')
    <li><a href="{{ route('planificacion.index') }}">Planificaciones</a></li>
@else
    <li><a href="{{ route('planificacion.index') }}">Mis Planificaciones</a></li>
@endcan
<li><a href="{{ route('asistencia.index') }}">Asistencia</a></li>
