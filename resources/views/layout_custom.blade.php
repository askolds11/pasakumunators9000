<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="{{url('css/styles.css')}}">
    <!-- GOOGLE FONT LINKS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">   
    <title>@yield('title')</title>
</head>
<body>
    <header id="header-project-name"> 
        <p>{{__('layout.project')}}</p>
    </header>
    <nav id="navbar">
        <!-- PIE LINKA, KURŠ AKTĪVS, BŪT IEKRĀSOTAM 
        vajag js https://www.w3schools.com/howto/howto_js_active_element.asp
    -->
        <ul class="nav-links">
            <li><a href="{{ url('/mainpage') }}">{{__('layout.JAUNUMI')}}</a></li> <!-- Ved uz jaunumi *****tehniski, šī pati lapa -->
            <li><a href="{{ url('/filter') }}">{{__('layout.FILTRĒT')}}</a></li> <!-- Ved uz filtrēšanas lapu, proti, lapa, kurā lietotājs būs spējīgs meklēt sev tīkamus  -->
            <li><a href="{{ url('/new_pasakums') }}">{{__('layout.PIEVIENOT PASĀKUMU')}}</a></li>
            <li><a href="{{ url('/adminpanel') }}" >{{__('layout.ADMINA PANELIS')}}</a>
            
            </li>
            <li id="lang-lv-eng">
                <a href="{{ url('language/lv') }}" id="LV">LV</a>
                <a href="{{ url('language/en') }}" id="ENG">ENG</a>

            </li>
           
<!-- id="admin-panel-link" -->
            
        </ul>
        <button>
        @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="navbar-button">{{__('layout.KONTA SADAĻA')}}</a>
                    @else
                        <a href="{{ route('login') }}" class="navbar-button">{{__('layout.LOG IN')}}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="navbar-button">{{__('layout.REĢISTRĒTIES')}}</a>
                        @endif
                    @endauth
                </div>
            @endif
        </button> <!-- Ved uz login page -->
    </nav>
    <div>
        @yield('content')
    </div>

    <script type="text/javascript">
        function load() {
            @yield('script')
        }
        load();
    </script>

    <footer id="footer">
        <p>{{__('layout.createdby')}} </p>
        <p>{{__('layout.copyright')}} </p>
    </footer>
</body>