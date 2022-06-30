@extends('layout_custom')

@section('title', 'Admin panel')

@section('content')
    <div id="admina-panel-all">

    
    <!-- <div id="izvelne-sarakstam">
            <h3 id="atlasit-pasakumus-title">Atlasīt pasākumus</h3>
            <button class="atlasi-buttons" id="admin-lietotaji-select">Lietotāji</button>
            <button class="atlasi-buttons">Pasākumi</button>
            <button class="atlasi-buttons">Komentāri</button>
    </div> -->
    <div id="admin-panel-content">
        <div id="admin-lietotaju-saraksts" class="admin-content-element">
            <h2 class="admin-sarakstu-title">LIETOTĀJI</h2>
            @foreach ($errors->all() as $message) {
                    <strong>{{ $message }}</strong><br>
                }
                @endforeach
            <div class="admin-table">
            <table class="table-content-admin">
                <tr>
                    <th>Username</th>
                    <th>Roles</th>
                    <th>Remove role</th>
                    <th>Add role</th>
                    <th>Ban</th>
                </tr>
                    @foreach($lietotaji as $lietotajs)
                        <tr>
                            <td rowspan="{{ count($lietotajs['roles']) }}">{{ $lietotajs['user.name'] }}</td>
                            <td>{{ $lietotajs['roles'][0]['lomanosaukums'] }}</td>
                                <td>
                                @if($lietotajs['roles'][0]['lomanosaukums'] != 'lietotajs')
                                    
                                    <form method="POST"
                                        action="{{ url('adminpanel/updaterole') }}" class="button-admins-all">
                                        @csrf
                                        <input type="hidden" name="userid" id="userid" value="{{ $lietotajs['user.id'] }}"></input>
                                        <input type="hidden" name="lomaid" id="lomaid" value="{{ $lietotajs['roles'][0]['lomaid'] }}"></input>
                                        <input type="hidden" name="action" id="action" value="false"></input>
                                        <input type="submit" name="submit" id="submit" value="Remove role"></input>
                                    </form>
                                    
                                @endif
                                </td>
                                @php $lomasadd = [] @endphp
                                @foreach($lomas as $loma)
                                    @php $exists = false @endphp
                                        @foreach($lietotajs['roles'] as $lietloma)
                                            @if($loma['id'] == $lietloma['lomaid'])
                                                @php $exists = true @endphp
                                                @break
                                            @endif
                                        @endforeach
                                @if($exists == false) @php array_push($lomasadd, $loma) @endphp @endif
                                @endforeach
                                <td rowspan="{{ count($lietotajs['roles']) }}">
                                @if(count($lomasadd) > 0)
                                    <form method="POST"
                                        action="{{ url('adminpanel/updaterole') }}" class="button-admins-all">
                                        @csrf
                                        <input type="hidden" name="userid" id="userid" value="{{ $lietotajs['user.id'] }}"></input>
                                        <input type="hidden" name="action" id="action" value="true"></input>
                                        <select name="lomaid" id="lomaid">
                                        @foreach($lomasadd as $lomaadd)
                                            <option value ="{{ $lomaadd['id'] }}">{{ $lomaadd['nosaukums'] }}</option>
                                        @endforeach
                                        </select>
                                        <input type="submit" name="submit" id="submit" value="Add role"></input>
                                    </form>
                                @endif
                                </td>
                                <td rowspan="{{ count($lietotajs['roles']) }}">
                                    <form method="POST" action="{{ url('adminpanel/banuser') }}" class="button-admins-all">
                                        @csrf
                                        <input type="hidden" name="id" id="id" value="{{ $lietotajs['user.id'] }}"></input>
                                        @if($lietotajs['banned_status'] == false)
                                        <input type="submit" name="submit" id="submit" value="Ban"></input>
                                        @else
                                        <input type="submit" name="submit" id="submit" value="Unban"></input>
                                        @endif
                                    </form>
                                </td>
                        </tr>
                        @for($i = 1; $i < count($lietotajs['roles']); $i++)
                            <tr>
                                <td>{{ $lietotajs['roles'][$i]['lomanosaukums'] }}</td>
                                <td>
                                @if($lietotajs['roles'][$i]['lomanosaukums'] != 'lietotajs')
                                    <form method="POST"
                                        action="{{ url('adminpanel/updaterole') }}">
                                        @csrf
                                        <input type="hidden" name="userid" id="userid" value="{{ $lietotajs['user.id'] }}"></input>
                                        <input type="hidden" name="lomaid" id="lomaid" value="{{ $lietotajs['roles'][$i]['lomaid'] }}"></input>
                                        <input type="hidden" name="action" id="action" value="false"></input>
                                        <input type="submit" name="submit" id="submit" value="Remove role"></input>
                                    </form>
                                @endif
                                </td>
                            </tr>
                        @endfor
                    @endforeach
            </table>
            </div>
        </div>
        <div id="admin-pasakumu-saraksts" class="admin-content-element">
            <h2 class="admin-sarakstu-title">PASĀKUMI</h2>
            <div class="admin-table">
            <table class="table-content-admin">
                <tr>
                    <th>Autors</th>
                    <th>Nosaukums</th>
                    <th>Apraksts</th>
                    <th>Vieta</th>
                    <th>Attels</th>
                    <th>Apstiprināt</th>
                    <th>Noraidīt</th>
                </tr>
                @foreach($pasakumi as $pasakums)
                    <tr>
                        <td>{{ $pasakums['username'] }}</td>
                        <td>{{ $pasakums['nosaukums'] }}</td>
                        <td>{{ $pasakums['apraksts'] }}</td>
                        <td>{{ $pasakums['norises_vieta'] }}</td>
                        <td><img src="{{ url($pasakums['picture']) }}" width="100"></td>
                        <td>
                                <form method="POST"
                                    action="{{ url('adminpanel/approvepasakums') }}">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="{{ $pasakums['id'] }}"></input>
                                    <input type="hidden" name="status" id="status" value="true"></input>
                                    <input type="submit" name="submit" id="submit" value="Apstiprināt"></input>
                                </form>
                        </td>
                        <td>
                                <form method="POST"
                                    action="{{ url('adminpanel/approvepasakums') }}">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="{{ $pasakums['id'] }}"></input>
                                    <input type="hidden" name="status" id="status" value="false"></input>
                                    <input type="submit" name="submit" id="submit" value="Noraidīt"></input>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            </div>
        </div>
        <div id="admin-komentaru-saraksts" class="admin-content-element">
            <h2 class="admin-sarakstu-title">KOMENTĀRI</h2>
            <div class="admin-table">
            <table class="table-content-admin">
                <tr>
                    <th>Autors</th>
                    <th>Teksts</th>
                    <th>Apstiprināt</th>
                    <th>Noraidīt</th>
                </tr>
                @foreach($komentari as $komentars)
                    <tr>
                        <td>{{ $komentars['username'] }}</td>
                        <td>{{ $komentars['teksts'] }}</td>
                        <td>
                                <form method="POST"
                                    action="{{ url('adminpanel/approvekomentars') }}">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="{{ $komentars['id'] }}"></input>
                                    <input type="hidden" name="status" id="status" value="true"></input>
                                    <input type="submit" name="submit" id="submit" value="Apstiprināt"></input>
                                </form>
                        </td>
                        <td>
                                <form method="POST"
                                    action="{{ url('adminpanel/approvekomentars') }}">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="{{ $komentars['id'] }}"></input>
                                    <input type="hidden" name="status" id="status" value="false"></input>
                                    <input type="submit" name="submit" id="submit" value="Noraidīt"></input>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        
        
        
    </div>
    </div>





@endsection