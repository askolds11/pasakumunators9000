@extends('layout_custom')

@section('title', 'Pasākums + tā nosaukums')

@section('content')
<div id="content-show-pasakuma-group">


    <div id="show_pasakums" class="show-content-child">    
        <h2 id="title-show-pasakums">{{ $pasakums['nosaukums'] }}</h2>
        <ul>
            <li id="show-user-name-pasakums-publicetajs">
                <div id="group-of-data">
                    <div id=show-pasākuma-details>
                        <p id="show-user-name-pasakums">{{ $pasakums['username'] }}</p>
                        <p id="show-datums-publicets-pasakums">
                            @php 
                                $date = new DateTime($pasakums['created_at']);
                                echo $date->format('Y-m-d');
                            @endphp
                        </p>
                        <p id="show-laiks-publicets-pasakums">
                            @php 
                                $date = new DateTime($pasakums['created_at']);
                                echo $date->format('H:i');
                            @endphp
                        </p>
                    </div>
                    @if(Auth::check() && $pasakums['veidotajs_id'] == Auth::user()->id)
                    <div id=show-edit-delete-link>
                        <a href="{{ url('pasakums/'.$pasakums['id'].'/edit') }}" id="show-edit-link">EDIT</a>
                        <form method="POST"
                            action="{{action([App\Http\Controllers\PasakumsController::class, 'destroy'],
                        $pasakums['id']) }}" id="form-delete">
                        @csrf @method('DELETE')<input type="submit"
                        value="DELETE" id="show-delete-link">
                    </form>
                    
                    </div>
 
                    @endif
                
            </li>
        </ul>
        <ul>
            <li id="apraksts-show-pasakums" class="show-pasakuma-info">
                <h3>
                    {{__('show_pasakums.Apraksts')}}
                </h3>
                <p>
                    {{ $pasakums['apraksts'] }}
                </p>
            </li>
            <li id="apraksts-show-pasakums" class="show-pasakuma-info">
                <h3>
                {{__('show_pasakums.Datums')}}
                </h3>
                <p>
                        @php 
                            $date = new DateTime($pasakums['datums']);
                            echo $date->format('d-m-Y H:i');
                        @endphp
                </p>
            </li>
            <li id="apraksts-show-pasakums" class="show-pasakuma-info">
                <h3>
                {{__('show_pasakums.Norises ilgums')}}
                </h3>
                <p>
                    @php
                        $day = floor(($pasakums['norises_ilgums']*60) / 86400);
                        $hours = floor((($pasakums['norises_ilgums']*60) -($day*86400)) / 3600);
                        $minutes = floor((($pasakums['norises_ilgums']*60) / 60) % 60);

                        if($day != 0) echo $day.'d';
                        if($hours != 0) echo $hours.'h';
                        if($minutes != 0) echo $minutes.'min';
                    @endphp
                </p>
            </li>
            <li id="apraksts-show-pasakums" class="show-pasakuma-info">
                <h3>
                {{__('show_pasakums.Cena')}}
                </h3>
                <p>
                    {{ $pasakums['cena'] }}
                </p>
            </li>
            <li id="apraksts-show-pasakums" class="show-pasakuma-info">
                <h3>
                {{__('show_pasakums.Kategorija')}}
                </h3>
                <p > 
                    @foreach($pasakums['kategorijas'] as $kategorija)
                        {{ $kategorija.' ' }} 
                    @endforeach
                </p>
            </li>
            <li id="apraksts-show-pasakums" class="show-pasakuma-info">
                <h3>
                {{__('show_pasakums.Novērtējums')}}
                </h3>
                <p > 
                    {{ round($pasakums['novertejums'],1) }}
                </p>
            </li>
            <li id="apraksts-show-pasakums" class="show-pasakuma-info">
                <h3>
                {{__('show_pasakums.Pieteikušies')}}
                </h3>
                <p > 
                    {{ $pasakums['pieteikusies'] }}
                </p>
            </li>
            @if(Auth::check())
            <li id="apraksts-show-pasakums" class="show-pasakuma-info">
                <h3>
                {{__('show_pasakums.Tavs novērtējums')}}
                </h3>
                @if($pasakums['tavsnovertejums'] == -1)
                    Nav
                @else
                    {{ $pasakums['tavsnovertejums'] }}
                @endif
            </li>

            <li id="apraksts-show-pasakums" class="show-pasakuma-info">
                <form method="POST" action="{{action([App\Http\Controllers\PasakumsController::class, 'novertet']) }}">
                    @csrf
                    <input type="hidden" name="pasakums_id" id="pasakums_id" value="{{ $pasakums['id'] }}" />
                    <input type="number" name="novertejums" id="novertejums"min="0" max="10" step="1"
                    @if($pasakums['tavsnovertejums'] != -1) value="{{ $pasakums['tavsnovertejums'] }}" @else value="5" @endif></input>
                    <input type="submit" name="iesniegt" value="Novērtēt" />
                </form>
            </li>
            <li id="pieteikties">
                <button id="button-pieteikties" onclick="window.location.href='/pasakums/{{ $pasakums['id'] }}/pieteikties'">
                        @if($pasakums['pieteicies'] == false)
                        {{__('show_pasakums.Pieteikties')}}
                        @else
                        {{__('show_pasakums.Atteikties')}}
                        @endif
                </button>
            </li>
            @endif
        </ul>
        
       
        
    </div>
    <div id="attels-preview-show-pasakums-galerija"  class="show-content-child">
            <h3 id="attels-preview-show-pasakuma-galerija-title">{{__('show_pasakums.Attēlu galerija')}}</h3>
            
            <div id="attels-child">
                @foreach($pasakums['atteli'] as $attels)
                    <img src="{{ url($attels['picture']) }}" width="100" id="attels-chils-more"/>
                @endforeach
            </div>
            <div id="pievienot">
                @if(Auth::check() && $pasakums['veidotajs_id'] == Auth::user()->id)
                <form method="POST"
                    action="{{action([App\Http\Controllers\AttelsController::class, 'store']) }}" enctype="multipart/form-data" id="attela-form-galerija">
                    @csrf
                
                    <label for="apraksts">{{__('show_pasakums.Apraksts')}}</label><br>
                    <input type="text" id="apraksts" name="apraksts" value="{{ old('apraksts')}}" class="form-control @error('apraksts') is-invalid @enderror">
                    <x-error-validation-msg-comp name='apraksts' /> <br>

                    <label for="apraksts">{{__('show_pasakums.Datums')}}</label><br>
                    <input type="date" id="datums" name="datums" value="{{ old('datums')}}" class="form-control @error('datums') is-invalid @enderror">
                    <x-error-validation-msg-comp name='datums' /> <br>

                    <input type="hidden" id="pasakums_id" name="pasakums_id" value="{{ $pasakums['id']}}" />

                    <label for="attels">{{__('show_pasakums.Attēls')}}</label>
                    <br>
                    <input type="file" name="attels" id="attels" value="{{ old('attels') }}" class="form-control @error('attels') is-invalid @enderror">
                    <x-error-validation-msg-comp name='attels' /><br>

                    <input type="submit" value="{{__('show_pasakums.Pievienot attēlu')}}" id="attels-preview-show-pasakuma-galerija-pievienot-attelu"> <!--id="publicet-pasakumu"-->
                </form>
                @endif

            </div>
            
    </div>
    <div id="attels-preview-show-pasakums-reklama"  class="show-content-child">
            <h3 id="attels-preview-show-pasakuma-reklama-title">{{__('show_pasakums.Attēlu galerija')}}</h3>
            
            <div id="attels-child-reklama">
                <img src="{{ url($pasakums['picture']) }}" width="100" id="reklama-img"/>
            </div>
            <div id="pievienot-reklama">
                <!-- <button id="attels-preview-show-pasakuma-reklama-pievienot-attelu">
                    Pievienot attēlu
                </button> -->
            </div>
            
    </div>
                
                 
</div>




<div id="show_pasakums_komentari">
        <h3 id="title-show-pasakums-komentari">{{__('show_pasakums.Komentāri')}}</h3>
            <ul>
                @foreach($komentari as $komentars)
                <li class="show-user-name-koments">
                    <h4 class="show-komentetaja-user-name">{{ $komentars['username'] }}</h4>
                    <div class="show-user-name-koments-info">
                        <p class="datums-publicets-koments">
                            @php 
                                $date = new DateTime($komentars['created_at']);
                                echo $date->format('d-m-Y');
                            @endphp
                        </p>
                        <p class="laiks-publicets-koments">
                            @php 
                                $date = new DateTime($komentars['created_at']);
                                echo $date->format('H:i');
                            @endphp
                        </p>
                    </div>
                    <p class="komenta-teksts">
                        {{ $komentars['teksts'] }}
                    </p>
                </li>
                @endforeach


                <li id="post-komentaru">
                    <form method="POST" action="{{action([App\Http\Controllers\KomentarsController::class, 'store']) }}">
                        @csrf
                        <input type="hidden" id="pasakums_id" name="pasakums_id" value="{{ $pasakums['id'] }}" />
                        <textarea id="teksts" name="teksts" rows="20" cols="70" placeholder="{{__('show_pasakums.Rakstiet savu komentāru šeit...')}}">{{ old('teksts') }}</textarea>
                        <br>
                        <input type="submit" value="{{__('show_pasakums.Post')}}" id="post-komentaru-button">
                    </form>
                </li>
</div>
@endsection

