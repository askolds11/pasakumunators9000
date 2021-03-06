@extends('layout_custom')

@section('title', 'Filters')

@section('content')
<div id="filter-content-group">
        <div id="filter-pasakumu" class="filter-content-child">
        <h2 id="filter-title">{{__('filter.FILTRĒT PASĀKUMU')}}</h2>
            <div id=filter-form>
                <form method="POST"
                action="{{action([App\Http\Controllers\PasakumsController::class, 'filter']) }}">
                    @csrf
                    <label for="nosaukums">{{__('filter.Nosaukums vai dala')}}</label><br>
                    <input type="text" id="nosaukums" name="nosaukums" value="{{ old('nosaukums')}}" class="form-control @error('nosaukums') is-invalid @enderror"><br>
                    <x-error-validation-msg-comp name='nosaukums' /> <br>

                    <label for="vieta">{{__('filter.Norises vieta (vai daļa)')}}</label><br>
                    <input type="text" id="vieta" name="vieta" value="{{ old('vieta')}}" class="form-control @error('vieta') is-invalid @enderror"><br>
                    <x-error-validation-msg-comp name='vieta' /> <br>

                    <label for="veidotajs">{{__('filter.Pasākuma veidotājs (vai daļa)')}}</label><br>
                    <input type="text" id="veidotajs" name="veidotajs" value="{{ old('veidotajs')}}" class="form-control @error('veidotajs') is-invalid @enderror"><br>
                    <x-error-validation-msg-comp name='veidotajs' /> <br>

                    <label for="datumsno">{{__('filter.Datums no')}}:</label><br>
                    <input type="datetime-local" id="datumsno" name="datumsno" value="{{ old('datumsno')}}" class="form-control @error('datumsno') is-invalid @enderror"><br>
                    <x-error-validation-msg-comp name='datumsno' /><br>
                    
                    <label for="datumslidz">{{__('filter.Datums līdz')}}:</label><br>
                    <input type="datetime-local" id="datumslidz" name="datumslidz" value="{{ old('datumslidz')}}" class="form-control @error('datumslidz') is-invalid @enderror"><br>
                    <x-error-validation-msg-comp name='datumslidz' /><br>

                    <label for="ilgumsno">{{__('filter.Norises ilgums')}}</label><br>
                    {{__('filter.No')}} <input type="number" id="ilgumsno" name="ilgumsno" value="{{ old('ilgumsno')}}" class="form-control @error('ilgumsno') is-invalid @enderror"><br>
                    {{__('filter.Līdz')}}  <input type="number" id="ilgumslidz" name="ilgumslidz" value="{{ old('ilgumslidz')}}" class="form-control @error('ilgumslidz') is-invalid @enderror">
                    <br>
                    <x-error-validation-msg-comp name='ilgumsno' /><br>
                    <x-error-validation-msg-comp name='ilgumslidz' /><br>

                    <label for="cenano">{{__('filter.Cena')}}</label><br>
                    {{__('filter.No')}} <input type="number" id="cenano" name="cenano" value="{{ old('cenano')}}" class="form-control @error('cenano') is-invalid @enderror"><br>
                    {{__('filter.Līdz')}} <input type="number" id="cenalidz" name="cenalidz" value="{{ old('cenalidz')}}" class="form-control @error('cenalidz') is-invalid @enderror"><br>
                    <x-error-validation-msg-comp name='cenano' /><br>
                    <x-error-validation-msg-comp name='cenalidz' /><br>
                    
                    <label for="kategorija">{{__('filter.Kategorijas')}}</label><br>
                    <select name="kategorija[]" id="kategorija[]" multiple>
                        @foreach($kategorijas as $kat)
                            <option value="{{ $kat['id'] }}"
                                {{ (collect(old('kategorija'))->contains($kat['id'])) ? 'selected':'' }}>{{ $kat['nosaukums'] }}</option>
                        @endforeach
                    </select>
                    <x-error-validation-msg-comp name='kategorija' /><br>
                    <br>
                    <input type="submit" value="{{__('filter.Meklēt')}}" id="filter-button-meklet">
                </form>
            </div>
        </div>
        
        
        <div id="show-filter-list" class="filter-content-child">
            
                @if (count($pasakumi)==0)
                    <p>{{__('filter.Netika atrasti pasākumi')}}.</p>
                @else
                <div id="filter-table-list">
                    <h3 id="filter-result-title">{{__('filter.FILTRĒŠANAS REZULTĀTI')}}</h3>
                    <table>
                        <tr>
                            <th class="filter-table-heading">{{__('filter.Attēls')}}</th>
                            <th class="filter-table-heading">{{__('filter.Nosaukums')}}</th>
                            <th class="filter-table-heading">{{__('filter.Apraksts')}}</th>
                            <th class="filter-table-heading">{{__('filter.Datums')}}</th>
                            <th class="filter-table-heading">{{__('filter.Norises ilgums')}}</th>
                            <th class="filter-table-heading">{{__('filter.Norises vieta')}}</th>
                            <th class="filter-table-heading">{{__('filter.Cena')}}</th>
                            <th class="filter-table-heading">{{__('filter.Veidotājs')}}</th>
                            <th class="filter-table-heading">{{__('filter.Kategorija')}}</th>
                        </tr>
                    @foreach ($pasakumi as $pasakums)
                        <tr>
                            <td rowspan="{{ count($pasakums['kategorijas']) }}" }}>
                                <img src="{{ url($pasakums['attels']) }}" width="100">
                            </td>
                            <td rowspan="{{ count($pasakums['kategorijas']) }}">
                                <a href="{{ url('pasakums').'/'.$pasakums['id'] }}" id="filter-link-to-show-pasakums">
                                    {{ $pasakums['nosaukums'] }}
                                </a>
                            </td>
                            <td rowspan="{{ count($pasakums['kategorijas']) }}" }}>{{$pasakums['apraksts'] }}</td>
                            <td rowspan="{{ count($pasakums['kategorijas']) }}" }}>
                                @php 
                                    $date = new DateTime($pasakums['datums']);
                                    echo $date->format('Y-m-d H:i');
                                @endphp
                            </td>
                            <td rowspan="{{ count($pasakums['kategorijas']) }}">{{$pasakums['norises_ilgums'] }}</td>
                            <td rowspan="{{ count($pasakums['kategorijas']) }}">{{$pasakums['norises_vieta'] }}</td>
                            <td rowspan="{{ count($pasakums['kategorijas']) }}">{{$pasakums['cena'] }}</td>
                            <td rowspan="{{ count($pasakums['kategorijas']) }}">{{$pasakums['username'] }}</td>
                            <td>{{ $pasakums['kategorijas'][0] }}</td>
                        </tr>
                        @for($i = 1; $i < count($pasakums['kategorijas']); $i++)
                        <tr>
                            <td>{{ $pasakums['kategorijas'][$i] }}</td>
                        </tr>
                    @endfor
                    @endforeach
                    @endif
                    </table>
                </div> 
                   

        </div>
</div>
      
@endsection


