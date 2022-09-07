<nav class="navbar bg-base-100">
    <div class="flex-1">
      <a href="{{ route('dashboard') }}" class="text-xl normal-case btn btn-ghost">Dashboard</a>
    </div>
    <div class="flex-none">
      <ul class="p-0 menu menu-horizontal">
        <li><a href="{{ route('planificacion.index') }}">Planificaciones</a></li>
        <div class="dropdown dropdown-end">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </div>
                </label>
            @else
                <label tabindex="0" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
                </label>
            @endif
            <ul tabindex="0" class="p-2 mt-3 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                <li>
                    <a>
                    {{ Auth::user()->name }}
                    </a>
                </li>
                <li>
                    <a class="justify-between" href="{{ route('planificacion.index') }}">
                        Planificaciones
                    </a>
                </li>
                <form method="POST" action="{{ route('logout') }}"  @click.prevent="$root.submit();" x-data>
                    @csrf
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </form>
            </ul>
          </div>
    </div>
  </nav>

