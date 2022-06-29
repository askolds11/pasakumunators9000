@extends('layout_custom')

@section('title', 'Filters')

@section('content')
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
                        <td>Nosaukums</td>
                        <td>Apraksts</td>
                        <td>Datums</td>
                        <td>Norises ilgums</td>
                        <td>Norises vieta</td>
                        <td>Cena</td>
                        <td>Veidotāja id</td>
                        <td>Kategorija</td>
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
@endsection


