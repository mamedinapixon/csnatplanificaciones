<nav class="print-bg navbar bg-gradient-to-r from-emerald-800 to-emerald-600 text-base-100">


    <div class="flex-1">
        <a href="{{ route('home') }}" class="btn btn-ghost text-xl normal-case">
            <img src="https://csnat.unt.edu.ar/templates/jux_times/images/logo.png" style="width: 9rem;"
                alt="Logo Facultad Ciencias Naturales UNT">
        </a>
    </div>
    <div class="no-print flex-none">
        <ul class="menu menu-horizontal space-x-4 p-0 px-4">
            <li><a href="{{ route('home') }}">Home</a></li>
            @can(['ver periodos lectivos', 'ver docentes'])
                <li tabindex="0">
                    <a>
                        Administración
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 24 24">
                            <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                        </svg>
                    </a>
                    <ul tabindex="0"
                        class="dropdown-content menu rounded-box menu-compact w-56 bg-base-100 p-3 text-base-content shadow">
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
                </li>
            @endcan
            @can('ver planificaciones')
                <li><a href="{{ route('planificacion.index') }}">Planificaciones</a></li>
            @else
                <li><a href="{{ route('planificacion.index') }}">Mis Planificaciones</a></li>
            @endcan
            <div class="dropdown dropdown-end">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <label tabindex="0" class="avatar btn btn-circle btn-ghost">
                        <div class="w-10 rounded-full">
                            <img src="{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    </label>
                @else
                    <label tabindex="0" class="btn btn-circle btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </label>
                @endif
                <ul tabindex="0"
                    class="dropdown-content menu rounded-box menu-compact w-56 bg-base-100 p-3 text-base-content shadow">
                    <li class="menu-title">
                        <span>{{ Auth::user()->name }}</span>
                    </li>
                    <li class="hover-bordered">
                        <a class="w-full justify-between" href="{{ route('profile.show') }}">
                            Perfil
                        </a>
                    </li>
                    <form method="POST" action="{{ route('logout') }}" @click.prevent="$root.submit();" x-data>
                        @csrf
                        <li class="hover-bordered">
                            <a href="{{ route('logout') }}" class="w-full justify-between">Salir</a>
                        </li>
                    </form>
                </ul>
            </div>
        </ul>
    </div>
</nav>
