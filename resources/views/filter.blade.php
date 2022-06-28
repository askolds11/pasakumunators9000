<!DOCTYPE html>
<html lang="lv">
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
    
    <title>Filters</title>
</head>
<body>
    <header id="header-project-name">
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
    


    <div id="filter-content-group">
        <div id="filter-pasakumu" class="filter-content-child">
            <h2>FILTRĒT PASĀKUMU</h2>
            <br>
            <form action="">
            <label for="">1. kritērija:</label><br>
            <input type="text" id="" name="" value=""><br>
            <label for="lname">2. kritērija</label><br>
            <input type="text" id="" name="" value=""><br>
            <label for="lname">3. kritērija</label><br>
            <input type="text" id="" name="" value=""><br>
            <label for="lname">4. kritērija</label><br>
            <input type="radio" id="" name="" value="">
            <label for="">1. opcija</label><br>
            <input type="radio" id="" name="" value="">
            <label for="">2. opcija</label><br>
            <input type="radio" id="" name="" value="">
            <label for="">3. opcija</label><br><br>
            <input type="submit" value="Meklēt">
            </form>
        </div>
        <div id="show-filter-list" class="filter-content-child">
            <h3>PASĀKUMIS</h3>


            @if (count($pasakumi)==0)
                <p>Netika atrasti pasākumi.</p>
            @else 
                <table>
                    <tr>
                        <td>Nosaukums</tc>
                        <td>Apraksts</tc>
                        <td>Datums</tc>
                        <td>Norises ilgums</tc>
                        <tc>Norises vieta</tc>
                        <tc>Cena</tc>
                        <tc>Veidotāja id</tc>
                        <tc>Kategorija</tc>
                    </tr>
            @foreach ($pasakumi as $pasakums)
                <tr>
                    <td>{{$pasakums->nosaukums }}</td>
                    <td>{{$pasakums->apraksts }}</td>
                    <td>{{$pasakums->datums }}</td>
                    <td>{{$pasakums->norises_ilgums }}</td>
                    <td>{{$pasakums->norises_vieta }}</td>
                    <td>{{$pasakums->cena }}</td>
                    <td>{{$pasakums->veidotajs_id }}</td>
                    <td>{{$pasakums->kategorija }}</td>
                </tr>
            @endforeach
            @endif
        </table>
        
    
        </div>
    </div>
   
    <footer id="footer">
        <p>Veidoja: Askolds Bērziņš, Johans Justs Eris, Aleksejs Romaņuks</p>
        <p>&copy Copyright AskoldsJustsAleksejs inc.</p>
    </footer>
</body>
</html>