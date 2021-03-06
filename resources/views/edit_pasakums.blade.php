@extends('layout_custom')

@section('title', 'Edit pasākums')

@section('content')
<div id="edit-pasakums">
    <div id="editot-pasakumu">
            <div id="form">
            <h2 id="publicet-jaunu-pasakumu-title">{{__('editevent.REDIĢĒT PASĀKUMU')}}</h2>
           
            <form method="POST"
            action="{{action([App\Http\Controllers\PasakumsController::class, 'update'], $pasakums['id']) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <label for="">{{__('editevent.Nosaukums')}}</label><br>
                <input type="text" id="nosaukums" name="nosaukums" value="{{ old('nosaukums', $pasakums['nosaukums'])}}" class="form-control @error('nosaukums') is-invalid @enderror">
                <x-error-validation-msg-comp name='nosaukums' /> <br>


                <label for="">{{__('editevent.Apraksts')}}</label><br>
                <textarea rows="10" cols="30" id="apraksts" name="apraksts" class="form-control @error('apraksts') is-invalid @enderror">{{ old('apraksts', $pasakums['apraksts'])}}</textarea>
                <x-error-validation-msg-comp name='apraksts' /><br>
                
                
                <label for="">{{__('editevent.Datums')}}</label><br>
                <input type="datetime-local" id="datums" name="datums" value="{{ old('datums', $pasakums['datums'])}}" class="form-control @error('datums') is-invalid @enderror">
                <x-error-validation-msg-comp name='datums' /> <br>
                
                
                <label for="">{{__('editevent.Norises ilgums')}}</label><br>
                <input type="number" id="norises_ilgums" name="norises_ilgums" value="{{ old('norises_ilgums', $pasakums['norises_ilgums'])}}" class="form-control @error('norises_ilgums') is-invalid @enderror">
                <x-error-validation-msg-comp name='norises_ilgums' /> <br>
                
                <label for="">{{__('editevent.Norises vieta')}}</label><br>
                <input type="text" id="norises_vieta" name="norises_vieta" value="{{ old('norises_vieta', $pasakums['norises_vieta'])}}" class="form-control @error('norises_vieta') is-invalid @enderror">
                <x-error-validation-msg-comp name='norises_vieta' /><br>
                
                <label for="">{{__('editevent.Cena')}}</label><br>
                <input type="number" step="0.01" id="cena" name="cena" value="{{ old('cena', $pasakums['cena'])}}" class="form-control @error('cena') is-invalid @enderror">
                <x-error-validation-msg-comp name='cena' /><br>
                
                <label for="">{{__('editevent.Kategorija')}}</label><br>
                <select id="kategorija[]" name="kategorija[]" multiple>
                    @foreach($kategorijas as $kat)
                        <option value ="{{ $kat['id'] }}" @php
                            if(
                                in_array($kat['nosaukums'], $pasakums['kategorijas']) ||
                                (old('kategorija') != null && in_array($kat['id'], old('kategorija')))
                                ) echo "selected"
                        @endphp>{{ $kat['nosaukums'] }}</option>
                    @endforeach
                </select>

                <div id="publicet-pasakumu-div">
                    <input type="submit" value="{{__('editevent.Pabeigt reģidēšanu')}}" id="publicet-pasakumu">
                </div>
               
            </form>
            </div>
           
        </div>
</div>
@endsection