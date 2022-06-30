@extends('layout_custom')

@section('title', 'Filters')

@section('content')
<div id="filter-content-group">
        <div id="filter-pasakumu" class="filter-content-child">
        <h2 id="filter-title">FILTRĒT PASĀKUMU</h2>
            <div id=filter-form>
                <form action="">
                <label for="">Datums (no kura uz priekšu)</label><br>
                <input type="datetime-local" id="" name="" value="current">
                <br>
                <label for="lname">Norises ilgums</label><br>
                <input type="number" id="" name="" value="60"><br>
                <!-- <div class="slidecontainer">
                    <input type="range" min="1" max="9999" value="50%" class="slider" id="range">
                </div> -->
                
                <label for="lname">Cena</label><br>
                <input type="number" id="" name="" value="20"><br>
                <label for="lname">Kategorija</label><br>
                <select name="" id="">
                    <option value="">Bokss</option>
                    <option value="">Beisbols</option>
                    <option value="">Boulings</option>
                    <option value="">FLorbols</option>
                    <option value="">Futbols</option>
                    <option value="">Galda teniss</option>
                    <option value="">Golfs</option>
                    <option value="">Kartings</option>
                    <option value="">Peintbols</option>
                    <option value="">Skeibords</option>
                    <option value="">Teniss</option>
                </select>
                <br>
                <input type="submit" value="Meklēt" id="filter-button-meklet">
                </form>
            </div>
        </div>
        
        
        <div id="show-filter-list" class="filter-content-child">
            
                @if (count($pasakumi)==0)
                    <p>Netika atrasti pasākumi.</p>
                @else
                <div id="filter-table-list">
                    <h3 id="filter-result-title">FILTRĒŠANAS REZULTĀTI</h3>
                    <table>
                            <tr>
                                <td class="filter-table-heading">Nosaukums</td>
                                <td class="filter-table-heading">Apraksts</td>
                                <td class="filter-table-heading">Datums</td>
                                <td class="filter-table-heading">Norises ilgums</td>
                                <td class="filter-table-heading">Norises vieta</td>
                                <td class="filter-table-heading">Cena</td>
                                <td class="filter-table-heading">Veidotājs</td>
                                <td class="filter-table-heading">Kategorija</td>
                            </tr>
                    @foreach ($pasakumi as $pasakums)
                        <tr>
                            <td><a href="{{url('/pasakums/{$pasakums->id}')}}" id="filter-link-to-show-pasakums">{{$pasakums->nosaukums }}</a></td>
                            <td>{{$pasakums->apraksts }}</td>
                            <td>{{$pasakums->datums }}</td>
                            <td>{{$pasakums->norises_ilgums }}</td>
                            <td>{{$pasakums->norises_vieta }}</td>
                            <td>{{$pasakums->cena }}</td>
                            <td>{{$pasakums->veidotajs_id }}</td>
                            <!-- <td>{{$pasakums->kategorija }}</td> -->
                        </tr>
                    @endforeach
                    @endif
                    </table>
                </div> 
                   

        </div>
</div>
      
@endsection


