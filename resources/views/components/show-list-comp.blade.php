<div>
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