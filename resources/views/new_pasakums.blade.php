@extends('layout_custom')

@section('title', 'Pasākuma izveide')

@section('content')
    <div id="parent-new-pasakums">
        <div id="izveidot-jaunu-pasakumus">
            <h3>Publicēt jaunu pasākumu</h3>
            @foreach ($errors->all() as $message) {
                <strong>{{ $message }}</strong><br>
            }
            @endforeach
            <form method="POST"
            action="{{action([App\Http\Controllers\PasakumsController::class, 'store']) }}">
                @csrf
                
                
                <label for="">Nosaukums</label><br>
                <input type="text" id="nosaukums" name="nosaukums" value="{{ old('nosaukums')}}" class="form-control @error('nosaukums') is-invalid @enderror"><br>
                @error('nosaukums')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <label for="">Apraksts</label><br>
                <textarea rows="10" cols="30" id="apraksts" name="apraksts" class="form-control @error('apraksts') is-invalid @enderror">{{ old('apraksts')}}</textarea><br>
                @error('apraksts')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                
                
                <label for="">Datums</label><br>
                <input type="date" id="datums" name="datums" value="{{ old('datums')}}" class="form-control @error('datums') is-invalid @enderror"><br>
                @error('datums')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                
                
                <label for="">Norises ilgums</label><br>
                <input type="number" id="norises_ilgums" name="norises_ilgums" value="{{ old('norises_ilgums')}}" class="form-control @error('norises_ilgums') is-invalid @enderror"><br>
                
                
                <label for="">Norises vieta</label><br>
                <input type="text" id="norises_vieta" name="norises_vieta" value="{{ old('norises_vieta')}}" class="form-control @error('norises_vieta') is-invalid @enderror"><br>
                
                
                <label for="">Cena</label><br>
                <input type="number" step="0.01" id="cena" name="cena" value="{{ old('cena')}}" class="form-control @error('cena') is-invalid @enderror"><br>
                
                
                
                <label for="">Kategorija foreign id</label><br>
                <select id="" name="" multiple>
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                </select><br>
                <div id="publicet-pasakumu-div">
                    <input type="submit" value="Submit" id="publicet-pasakumu">
                </div>
               
            </form>
        </div>
    </div>
@endsection

