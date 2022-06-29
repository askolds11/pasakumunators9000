@extends('layout_custom')

@section('title', 'Pasākuma izveide')

@section('content')
    <div id="parent-new-pasakums">
        <div id="izveidot-jaunu-pasakumus">
            <h3>Publicēt jaunu pasākumu</h3>
            <form method="POST"
            action="{{action([App\Http\Controllers\PasakumsController::class, 'store']) }}" enctype="multipart/form-data">
                @csrf
                
                <label for="">Nosaukums</label><br>
                <input type="text" id="nosaukums" name="nosaukums" value="{{ old('nosaukums')}}" class="form-control @error('nosaukums') is-invalid @enderror"><br>
                <x-error-validation-msg-comp name='nosaukums' />


                <label for="">Apraksts</label><br>
                <textarea rows="10" cols="30" id="apraksts" name="apraksts" class="form-control @error('apraksts') is-invalid @enderror">{{ old('apraksts')}}</textarea><br>
                <x-error-validation-msg-comp name='apraksts' />
                
                
                <label for="">Datums</label><br>
                <input type="datetime-local" id="datums" name="datums" value="{{ old('datums')}}" class="form-control @error('datums') is-invalid @enderror"><br>
                <x-error-validation-msg-comp name='datums' />
                
                
                <label for="">Norises ilgums</label><br>
                <input type="number" id="norises_ilgums" name="norises_ilgums" value="{{ old('norises_ilgums')}}" class="form-control @error('norises_ilgums') is-invalid @enderror"><br>
                <x-error-validation-msg-comp name='norises_ilgums' />
                
                <label for="">Norises vieta</label><br>
                <input type="text" id="norises_vieta" name="norises_vieta" value="{{ old('norises_vieta')}}" class="form-control @error('norises_vieta') is-invalid @enderror"><br>
                <x-error-validation-msg-comp name='norises_vieta' />
                
                <label for="">Cena</label><br>
                <input type="number" step="0.01" id="cena" name="cena" value="{{ old('cena')}}" class="form-control @error('cena') is-invalid @enderror"><br>
                <x-error-validation-msg-comp name='cena' />
                
                <label for="">Kategorija foreign id</label><br>
                <select id="kategorija[]" name="kategorija[]" multiple>
                    @foreach($kategorijas as $kat) {
                        <option value ="{{ $kat['id'] }}">{{ $kat['nosaukums'] }}</option>
                    }
                    @endforeach
                </select><br>
                <x-error-validation-msg-comp name='kategorija' />

                <label for="attels">Attels</label>
                <input type="file" name="attels" id="attels" value="{{ old('attels') }}" class="form-control @error('attels') is-invalid @enderror"><br>
                <x-error-validation-msg-comp name='attels' />

                <div id="publicet-pasakumu-div">
                    <input type="submit" value="Submit" id="publicet-pasakumu">
                </div>
               
            </form>
        </div>
    </div>
@endsection

