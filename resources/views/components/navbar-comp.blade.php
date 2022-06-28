<div>
    <nav id="navbar">
        <ul class="nav-links">
            <li><a href="{{ url('/mainpage') }}">JAUNUMI</a></li> <!-- Ved uz jaunumi *****tehniski, šī pati lapa -->
            <li><a href="{{ url('/filter') }}">FILTRĒT</a></li></li> <!-- Ved uz filtrēšanas lapu, proti, lapa, kurā lietotājs būs spējīgs meklēt sev tīkamus  -->
            <li><a href="{{ url('/new_pasakums') }}">PIEVIENOT PASĀKUMU</a></li>
        </ul>
        <button>
        @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">LOG IN</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">REĢISTRĒTIES</a>
                        @endif
                    @endauth
                </div>
            @endif
        </button> <!-- Ved uz login page -->
    </nav>
</div>