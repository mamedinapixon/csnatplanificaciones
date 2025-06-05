<nav class="print-bg navbar bg-gradient-to-r from-emerald-800 to-emerald-600 text-base-100">
    <div class="navbar-start">
        <a href="{{ route('home') }}" class="btn btn-ghost text-xl normal-case">
            {{--<img src="https://csnat.unt.edu.ar/templates/jux_times/images/logo.png" style="width: 9rem;"
                alt="Logo Facultad Ciencias Naturales UNT">--}}
            <img src="{{ config('app.logo', 'https://csnat.unt.edu.ar/templates/jux_times/images/logo.png') }}" style="width: 9rem;"
                alt="Logo">

        </a>
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </label>
            <ul tabindex="0"
                class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-60 text-neutral">
                @include('nav.mainmenu')
            </ul>
        </div>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1 items-center">
            @include('nav.mainmenu')
        </ul>
    </div>
    <div class="navbar-end">
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
    </div>
</nav>
