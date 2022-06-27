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
    
    <title>Pasākuma izveide</title>
</head>
<body>
    <header id="header-project-name">
            <p>Pasākumunators9000</p>
    </header>
    <nav id="navbar">
        
        <ul class="nav-links">
            <li><a href="">JAUNUMI</a></li> <!-- Ved uz jaunumi *****tehniski, šī pati lapa -->
            <li><a href="">FILTRĒT</a></li></li> <!-- Ved uz filtrēšanas lapu, proti, lapa, kurā lietotājs būs spējīgs meklēt sev tīkamus  -->
            <li><a href="">REĢISTRĒTIES</a></li> <!-- Ved uz register lapu, kur lietotājs spēs reģistrēt sev jaunu pasākumu -->
            
        </ul>
        

        <button><a href="">LOGIN</a></button> <!-- Ved uz login page -->
    </nav>
    <div id="izveidot-jaunu-pasakumus">
        <h3>Publicēt jaunu pasākumu</h3>
        @foreach ($errors->all() as $message) {
            <strong>{{ $message }}</strong><br>
        }
        @endforeach
        <form method="POST"
        action="{{action([App\Http\Controllers\PasakumsController::class, 'store']) }}">
            @csrf
            <label for="">Nosaukums text</label><br>
            <input type="text" id="nosaukums" name="nosaukums" value="{{ old('nosaukums')}}" class="form-control @error('nosaukums') is-invalid @enderror"><br>
            @error('nosaukums')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="">Apraksts text</label><br>
            <textarea rows="10" cols="30" id="apraksts" name="apraksts" class="form-control @error('apraksts') is-invalid @enderror">{{ old('apraksts')}}</textarea><br>
            @error('apraksts')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="">Datums date</label><br>
            <input type="date" id="datums" name="datums" value="{{ old('datums')}}" class="form-control @error('datums') is-invalid @enderror"><br>
            @error('datums')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="">Norises ilgums time</label><br>
            <input type="time" id="norises_ilgums" name="norises_ilgums" value="{{ old('norises_ilgums')}}" class="form-control @error('norises_ilgums') is-invalid @enderror"><br>
            <label for="">Norises vieta text</label><br>
            <input type="text" id="norises_vieta" name="norises_vieta" value="{{ old('norises_vieta')}}" class="form-control @error('norises_vieta') is-invalid @enderror"><br>
            <label for="">Cena skaitlis</label><br>
            <input type="number" step="0.01" id="cena" name="cena" value="{{ old('cena')}}" class="form-control @error('cena') is-invalid @enderror"><br>
            {{--<label for="">Veidotajs foreign id</label><br>
            <input type="text" id="veidotajs_id" name="veidotajs_id" value="{{ old('veidotajs_id')}}" class="form-control @error('veidotajs_id') is-invalid @enderror"><br>--}}
            <input type="hidden" id="veidotajs_id" name="veidotajs_id" value="{{Auth::user()->id}}">
            <label for="">Kategorija foreign id</label><br>
            <select id="" name="" multiple>
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
                <option value="">4</option>
            </select><br>
            <input type="submit" value="Submit">
        </form>
</div>

    <footer id="footer">
        <p>Veidoja: Askolds Bērziņš, Johans Justs Eris, Aleksejs Romaņuks</p>
        <p>&copy Copyright AskoldsJustsAleksejs inc.</p>
    </footer>
</body>
</html>