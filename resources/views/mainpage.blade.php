<!--  
Mainpage.blade.php
Fails ir dotā laravel projekta galvenā lapa, 
cauru kuru lietotājs var sasniegt un piekļūt 
pārējām projekta funkcijām un lapām.
-->

<!DOCTYPE html>
<html lang="lv">
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
    <title>Pasākumunators9000</title>
</head>
<body>
    <header id="header-project-name">
        <!-- <a href="{{ url('/mainpage') }}">Pasākumunators9000</a> TO BE ADDED --> 
        <p>Pasākumunators9000</p>
    </header>
  





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
  
    
    <div id="pasakums-preview">
        <h3 id="tituls-pasakums">TITULS</h3>
            <div id="saturs-par-pasakumu">
                <p>
                  

                </p>
                <button id="atteli-button">Attēli</button> <!-- Parādītu attēlus dotajam projektam -->
            </div>
    
    </div>
    <div id="komentari">
        <h3 id="tituls-komentari">KOMENTĀRI</h3>
        <div id="saturs-par-komentariem">
            <ul>
                <li id="pirmais-preview-koments" class="preview-komentari">1.komentars</li>
                <li id="pirmais-preview-koments" class="preview-komentari">1.komentars</li>
                <li id="pirmais-preview-koments" class="preview-komentari">1.komentars</li>
            </ul>
        </div>
    </div>
    
    <footer id="footer">
        <p>Veidoja: Askolds Bērziņš, Johans Justs Eris, Aleksejs Romaņuks</p>
        <p>&copy Copyright AskoldsJustsAleksejs inc.</p>
    </footer>
</body>
</html>