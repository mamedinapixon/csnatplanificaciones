<li><a href="{{ route('home') }}">Home</a></li>
@role('admin')
    <li><a href="{{ url('/admin') }}">Panel Admin</a></li>
@endrole
@can('ver planificaciones')
    <li><a href="{{ route('planificacion.index') }}">Planificaciones</a></li>
@else
    <li><a href="{{ route('planificacion.index') }}">Mis Planificaciones</a></li>
@endcan
<li><a href="{{ route('asistencia.index') }}">Asistencia</a></li>
<li><a href="{{ route('librotema.cargar') }}">Libro de Tema</a></li>
