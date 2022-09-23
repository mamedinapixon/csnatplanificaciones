<nav class="bg-gradient-to-r from-emerald-800 to-emerald-600 text-base-100 navbar">


    <div class="flex-1">
        <a href="{{ route('planificacion.index') }}" class="text-xl normal-case btn btn-ghost">
            <img src="https://csnat.unt.edu.ar/templates/jux_times/images/logo.png" style="width: 9rem;" alt="Logo Facultad Ciencias Naturales UNT">
        </a>
    </div>
    <div class="flex-none">
      <ul class="p-0 px-4 space-x-4 menu menu-horizontal">
        @hasanyrole('gestor|admin')
        <li tabindex="0">
            <a>
                Administración
                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
            </a>
            <ul tabindex="0" class="w-56 p-3 shadow menu menu-compact dropdown-content bg-base-100 rounded-box text-base-content">
                <li class="hover-bordered">
                    <a class="justify-between w-full" href="{{ route('periodoLectivo.index') }}">
                        Periodos Lectivos
                    </a>
                </li>
                <li class="hover-bordered">
                    <a class="justify-between w-full" href="{{ route('docente.index') }}">
                        Docentes
                    </a>
                </li>
            </ul>
        </li>
        <li><a href="{{ route('planificacion.index') }}">Planificaciones</a></li>
        @else
        <li><a href="{{ route('planificacion.index') }}">Mis Planificaciones</a></li>
        @endhasanyrole
        <div class="dropdown dropdown-end">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img src="{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" />
                </div>
                </label>
            @else
                <label tabindex="0" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
                </label>
            @endif
            <ul tabindex="0" class="w-56 p-3 shadow menu menu-compact dropdown-content bg-base-100 rounded-box text-base-content">
                <li class="menu-title">
                    <span>{{ Auth::user()->name }}</span>
                  </li>
                <li class="hover-bordered">
                    <a class="justify-between w-full" href="{{ route('profile.show') }}">
                        Perfil
                    </a>
                </li>
                <form method="POST" action="{{ route('logout') }}"  @click.prevent="$root.submit();" x-data>
                    @csrf
                    <li class="hover-bordered">
                        <a href="{{ route('logout') }}"  class="justify-between w-full">Salir</a>
                    </li>
                </form>
            </ul>
        </div>
    </div>
</nav>

