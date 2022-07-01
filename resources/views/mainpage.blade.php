@extends('layout_custom')

@section('title', 'Pasākumunators9000')

@section('content')
    <div id="mainpage-contnet-parent">
        <div id=izveleties-atlasi-form>
                <h3 id="atlasit-pasakumus-title">{{__('main.Atlasīt pasākumus')}}</h3>
                <button class="atlasi-buttons" onclick="pasakumi('popularakie')">{{__('main.Populārākie')}}</button>
                <button class="atlasi-buttons" onclick="pasakumi('labakie')">{{__('main.Vislabākie')}}</button>
                <button class="atlasi-buttons" onclick="pasakumi('jaunakie')">{{__('main.Jaunākie')}}</button>
            </div>
        <div id="mainpage-title-sadalijums">
            <h2 id="pasakumi-title-mainpage">{{__('main.PASĀKUMI')}}</h2>
            <h3 id="komentari-title-mainpage">{{__('main.KOMENTĀRI')}}</h3>

        </div>
        <div id="pasakumi-x-komentari">
            <div id="mainpage-pasakumi">
                <div id="pirmais-pasakums" class="pasakumu-list-preview-items">
                    <div class="pasakumu-list-preview-pasakuma">
                        <h2 class="tituls-pasakums">Title1</h2>
                        <p class="novertejums">{{__('main.Novērtējums')}}: <span id="novertejums1" class="novertejums-sk">10</span></p>
                        <p class="cilveki">{{__('main.Cilvēki')}}: <span id="cilveki1" class="cilveki-sk">10</span></p>

                        <ul>
                            <li class="pasakumu-list-preview-attels">
                                <div>
                                {{__('main.bilde seit')}}
                                </div>
                            </li>
                            <li class="mainpage-apraksts">
                                <h4>{{__('main.Apraksts')}}</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero ea commodi ducimus tenetur consectetur at dignissimos! Neque deserunt quas eos.</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="otrais-pasakums" class="pasakumu-list-preview-items">
                    <div class="pasakumu-list-preview-pasakuma">
                        <h2 class="tituls-pasakums">Title1</h2>
                        <p class="novertejums">{{__('main.Novērtējums')}}: <span id="novertejums2" class="novertejums-sk">10</span></p>
                        <p class="cilveki">{{__('main.Cilvēki')}}: <span id="cilveki2" class="cilveki-sk">10</span></p>

                        <ul>
                            <li class="pasakumu-list-preview-attels">
                                <div>
                                {{__('main.bilde seit')}}
                                </div>
                            </li>
                            <li class="mainpage-apraksts">
                                <h4>{{__('main.Apraksts')}}</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero ea commodi ducimus tenetur consectetur at dignissimos! Neque deserunt quas eos.</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="tresais-pasakums" class="pasakumu-list-preview-items">
                <div class="pasakumu-list-preview-pasakuma">
                        <h2 class="tituls-pasakums">Title1</h2>
                        <p class="novertejums">{{__('main.Novērtējums')}}: <span id="novertejums3" class="novertejums-sk">10</span></p>
                        <p class="cilveki">{{__('main.Cilvēki')}}: <span id="cilveki3" class="cilveki-sk">10</span></p>
                        <ul>
                            <li class="pasakumu-list-preview-attels">
                                <div>
                                {{__('main.bilde seit')}}
                                </div>
                            </li>
                            <li class="mainpage-apraksts">
                                <h4>{{__('main.Apraksts')}}</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero ea commodi ducimus tenetur consectetur at dignissimos! Neque deserunt quas eos.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="mainpage-komentari">
            <ul>
                @php $i=0 @endphp
                @foreach($komentari as $komentars)
                        <li class="preview-komentari">
                        <h4 class="mainpage-komentetaja-user-name">{{ $komentars['username'] }}</h4>
                        <div class="show-user-name-koments-info">
                            <p class="datums-publicets-koments">
                            @php 
                                $date = new DateTime($komentars['komentarstime']);
                                echo $date->format('d-m-Y');
                            @endphp
                            </p>
                            <p class="laiks-publicets-koments">
                            @php 
                                $date = new DateTime($komentars['komentarstime']);
                                echo $date->format('H:i');
                            @endphp
                            </p>
                        </div>
                        
                        
                        <p class="komenta-teksts">{{$komentars['komentars']}}
                        </p>

                        </li>
                        @if($i != count($komentari)-1)<hr>@endif
                        @php $i++ @endphp
                @endforeach
                    </ul>
            </div>
        </div>
        <div id="about-div">
            <div id="about-content-group">
            <h2 class="about-content">{{__('main.Par mums')}}</h2>
            <p class="about-content">
                {{__('main.CREATED')}}
            </p>
            <p class="about-content">
            {{__('main.REASON')}}
            </p>
            <p class="about-content">
            {{__('main.RESTRICTIONS')}}
            </p>
            <p class="about-content">
            {{__('main.ORIENTATING')}} 
            </p>
            <p class="about-content">
            {{__('main.Goodbye')}} 
            </p>
            </div>
        </div>
                

    </div>

    <script>
        function pasakumi(mode) {
            var pasakumi = @json($pasakumi);
            if(mode == 'popularakie') {
                pasakumi.sort(function(a,b) {
                    if(a.pieteikusies == b.pieteikusies) return a.id < b.id;
                    else return a.pieteikusies < b.pieteikusies;
                });
                let url = "{{ url('/')}}";
                let x = document.getElementById("pirmais-pasakums");
                let y = x.getElementsByClassName("tituls-pasakums");
                y[0].innerHTML = '<a href='+url+'/pasakums'+pasakumi[0].id+'>'+pasakumi[0].nosaukums+'</a>';
                y = x.getElementsByClassName("pasakumu-list-preview-attels");
                y[0].innerHTML = '<div> <img src="' + url + '/' + pasakumi[0]['picture'] + '" width="100"/> </div>';
                y = x.getElementsByClassName("mainpage-apraksts")[0].children[1];
                y.innerHTML = pasakumi[0].apraksts;
                y = document.getElementById("novertejums1");
                y.innerHTML = Number(pasakumi[0].novertejums).toFixed(1);
                y = document.getElementById("cilveki1");
                y.innerHTML = pasakumi[0].pieteikusies;

                x = document.getElementById("otrais-pasakums");
                y = x.getElementsByClassName("tituls-pasakums");
                y[0].innerHTML = '<a href='+url+'/pasakums'+pasakumi[1].id+'>'+pasakumi[1].nosaukums+'</a>';
                y = x.getElementsByClassName("pasakumu-list-preview-attels");
                y[0].innerHTML = '<div> <img src="' + url + '/' + pasakumi[1]['picture'] + '" width="100"/> </div>';
                y = x.getElementsByClassName("mainpage-apraksts")[0].children[1];
                y.innerHTML = pasakumi[1].apraksts;
                y = document.getElementById("novertejums2");
                y.innerHTML = Number(pasakumi[1].novertejums).toFixed(1);
                y = document.getElementById("cilveki2");
                y.innerHTML = pasakumi[1].pieteikusies;

                x = document.getElementById("tresais-pasakums");
                y = x.getElementsByClassName("tituls-pasakums");
                y[0].innerHTML = '<a href='+url+'/pasakums'+pasakumi[2].id+'>'+pasakumi[2].nosaukums+'</a>';
                y = x.getElementsByClassName("pasakumu-list-preview-attels");
                y[0].innerHTML = '<div> <img src="' + url + '/' + pasakumi[2]['picture'] + '" width="100"/> </div>';
                y = x.getElementsByClassName("mainpage-apraksts")[0].children[1];
                y.innerHTML = pasakumi[2].apraksts;
                y = document.getElementById("novertejums3");
                y.innerHTML = Number(pasakumi[2].novertejums).toFixed(1);
                y = document.getElementById("cilveki3");
                y.innerHTML = pasakumi[2].pieteikusies;
            }
            else if(mode == 'labakie') {
                pasakumi.sort(function(a,b) {
                    if(a.novertejums == b.novertejums) return a.id < b.id;
                    else return parseFloat(a.novertejums) < parseFloat(b.novertejums);
                });
                let url = "{{ url('/')}}";
                let x = document.getElementById("pirmais-pasakums");
                let y = x.getElementsByClassName("tituls-pasakums");
                y[0].innerHTML = '<a href='+url+'/pasakums'+pasakumi[0].id+'>'+pasakumi[0].nosaukums+'</a>';
                y = x.getElementsByClassName("pasakumu-list-preview-attels");
                y[0].innerHTML = '<div> <img src="' + url + '/' + pasakumi[0]['picture'] + '" width="100"/> </div>';
                y = x.getElementsByClassName("mainpage-apraksts")[0].children[1];
                y.innerHTML = pasakumi[0].apraksts;
                y = document.getElementById("novertejums1");
                y.innerHTML = Number(pasakumi[0].novertejums).toFixed(1);
                y = document.getElementById("cilveki1");
                y.innerHTML = pasakumi[0].pieteikusies;

                x = document.getElementById("otrais-pasakums");
                y = x.getElementsByClassName("tituls-pasakums");
                y[0].innerHTML = '<a href='+url+'/pasakums'+pasakumi[1].id+'>'+pasakumi[1].nosaukums+'</a>';
                y = x.getElementsByClassName("pasakumu-list-preview-attels");
                y[0].innerHTML = '<div> <img src="' + url + '/' + pasakumi[1]['picture'] + '" width="100"/> </div>';
                y = x.getElementsByClassName("mainpage-apraksts")[0].children[1];
                y.innerHTML = pasakumi[1].apraksts;
                y = document.getElementById("novertejums2");
                y.innerHTML = Number(pasakumi[1].novertejums).toFixed(1);
                y = document.getElementById("cilveki2");
                y.innerHTML = pasakumi[1].pieteikusies;

                x = document.getElementById("tresais-pasakums");
                y = x.getElementsByClassName("tituls-pasakums");
                y[0].innerHTML = '<a href='+url+'/pasakums'+pasakumi[2].id+'>'+pasakumi[2].nosaukums+'</a>';
                y = x.getElementsByClassName("pasakumu-list-preview-attels");
                y[0].innerHTML = '<div> <img src="' + url + '/' + pasakumi[2]['picture'] + '" width="100"/> </div>';
                y = x.getElementsByClassName("mainpage-apraksts")[0].children[1];
                y.innerHTML = pasakumi[2].apraksts;
                y = document.getElementById("novertejums3");
                y.innerHTML = Number(pasakumi[2].novertejums).toFixed(1);
                y = document.getElementById("cilveki3");
                y.innerHTML = pasakumi[2].pieteikusies;
            }
            else if(mode == 'jaunakie') {
                pasakumi.sort(function(a,b) {
                    d1 = new Date(a.datums);
                    d2 = new Date(b.datums);
                    if(d1 == d2) return a.id < b.id;
                    else return d1 < d2;
                });
                let url = "{{ url('/')}}";
                let x = document.getElementById("pirmais-pasakums");
                let y = x.getElementsByClassName("tituls-pasakums");
                y[0].innerHTML = '<a href='+url+'/pasakums'+pasakumi[0].id+'>'+pasakumi[0].nosaukums+'</a>';
                y = x.getElementsByClassName("pasakumu-list-preview-attels");
                y[0].innerHTML = '<div> <img src="' + url + '/' + pasakumi[0]['picture'] + '" width="100"/> </div>';
                y = x.getElementsByClassName("mainpage-apraksts")[0].children[1];
                y.innerHTML = pasakumi[0].apraksts;
                y = document.getElementById("novertejums1");
                y.innerHTML = Number(pasakumi[0].novertejums).toFixed(1);
                y = document.getElementById("cilveki1");
                y.innerHTML = pasakumi[0].pieteikusies;

                x = document.getElementById("otrais-pasakums");
                y = x.getElementsByClassName("tituls-pasakums");
                y[0].innerHTML = '<a href='+url+'/pasakums'+pasakumi[1].id+'>'+pasakumi[1].nosaukums+'</a>';
                y = x.getElementsByClassName("pasakumu-list-preview-attels");
                y[0].innerHTML = '<div> <img src="' + url + '/' + pasakumi[1]['picture'] + '" width="100"/> </div>';
                y = x.getElementsByClassName("mainpage-apraksts")[0].children[1];
                y.innerHTML = pasakumi[1].apraksts;
                y = document.getElementById("novertejums2");
                y.innerHTML = Number(pasakumi[1].novertejums).toFixed(1);
                y = document.getElementById("cilveki2");
                y.innerHTML = pasakumi[1].pieteikusies;

                x = document.getElementById("tresais-pasakums");
                y = x.getElementsByClassName("tituls-pasakums");
                y[0].innerHTML = '<a href='+url+'/pasakums'+pasakumi[2].id+'>'+pasakumi[2].nosaukums+'</a>';
                y = x.getElementsByClassName("pasakumu-list-preview-attels");
                y[0].innerHTML = '<div> <img src="' + url + '/' + pasakumi[2]['picture'] + '" width="100"/> </div>';
                y = x.getElementsByClassName("mainpage-apraksts")[0].children[1];
                y.innerHTML = pasakumi[2].apraksts;
                y = document.getElementById("novertejums3");
                y.innerHTML = Number(pasakumi[2].novertejums).toFixed(1);
                y = document.getElementById("cilveki3");
                y.innerHTML = pasakumi[2].pieteikusies;
            }
        }
    </script>



    <!-- <div id="mainpage-contnet-parent">
            
            <div id=izveleties-atlasi-form>
                <h3 id="atlasit-pasakumus-title">Atlasīt pasākumus</h3>
                <button class="atlasi-buttons">Populārākie</button>
                <button class="atlasi-buttons">Vislabākie</button>
                <button class="atlasi-buttons">Jaunākie</button>
            </div>
        <div id="mainpage-title-sadalijums">
            <h2 id="pasakumi-title-mainpage">PASĀKUMI + tā veids!!</h2>
            <h3 id="komentari-title-mainpage">KOMENTĀRI</h3>

        </div>
        <div id="pasakumu-section">
            <div id="pirmais-pasakums" class="pasakumu-list-preview-items">
                <div class="pasakumu-list-preview-pasakuma">
                    <h2 class="tituls-pasakums">Title1</h2>
                    <ul>
                        <li class="main-user-name-pasakums-publicetajs">
                            <p class="main-user-name-pasakums"><a href="" class="link-to-publicetajs">User2</a></p>
                            
                        </li>
                        <li class="pasakumu-list-preview-attels">
                            <div>
                                bilde seit
                            </div>
                        </li>
                        <li class="mainpage-apraksts">
                            <h4>Apraksts</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero ea commodi ducimus tenetur consectetur at dignissimos! Neque deserunt quas eos.</p>
                        </li>
                        <li id="pieteikties">
                            <button id="button-pieteikties">
                                Pieteikties
                            </button>
                            
                        </li>
                    </ul>
                </div>
            </div>
            <div id="otrais-pasakums" class="pasakumu-list-preview-items">
            <div class="pasakumu-list-preview-pasakuma">
                    <h2 class="tituls-pasakums">Title1</h2>
                    <ul>
                        <li class="main-user-name-pasakums-publicetajs">
                            <p class="main-user-name-pasakums"><a href="" class="link-to-publicetajs">User2</a></p>
                            
                        </li>
                        <li class="pasakumu-list-preview-attels">
                            <div>
                                bilde seit
                            </div>
                        </li>
                        <li class="mainpage-apraksts">
                            <h4>Apraksts</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero ea commodi ducimus tenetur consectetur at dignissimos! Neque deserunt quas eos.</p>
                        </li>
                        <li id="pieteikties">
                            <button id="button-pieteikties">
                                Pieteikties
                            </button>
                            
                        </li>
                    </ul>
                </div>
            </div>
            <div id="tresais-pasakums" class="pasakumu-list-preview-items">
            <div class="pasakumu-list-preview-pasakuma">
                    <h2 class="tituls-pasakums">Title1</h2>
                    <ul>
                        <li class="main-user-name-pasakums-publicetajs">
                            <p class="main-user-name-pasakums"><a href="" class="link-to-publicetajs">User2</a></p>
                            
                        </li>
                        <li class="pasakumu-list-preview-attels">
                            <div>
                                bilde seit
                            </div>
                        </li>
                        <li class="mainpage-apraksts">
                            <h4>Apraksts</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero ea commodi ducimus tenetur consectetur at dignissimos! Neque deserunt quas eos.</p>
                        </li>
                        <li id="pieteikties">
                            <button id="button-pieteikties">
                                Pieteikties
                            </button>
                            
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div id="mainpage-pasakumi-komentari">
            <div class="pasakumu-list-preview-komentars">
                    <ul>
                        <li class="preview-komentari">
                        <h4 class="mainpage-komentetaja-user-name">User1</h4>
                        <div class="show-user-name-koments-info">
                            <p class="datums-publicets-koments">
                                10.10.2020.
                            </p>
                            <p class="laiks-publicets-koments">
                                14:20
                            </p>
                        </div>
                        
                        
                        <p class="komenta-teksts">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea adipisci voluptatum dolores, ducimus eaque rem inventore impedit debitis rerum eum!
                        </p>

                        </li>
                        <hr>

                        <li class="preview-komentari">
                        <h4 class="mainpage-komentetaja-user-name">User1</h4>
                        <div class="show-user-name-koments-info">
                            <p class="datums-publicets-koments">
                                10.10.2020.
                            </p>
                            <p class="laiks-publicets-koments">
                                14:20
                            </p>
                        </div>
                        
                        
                        <p class="komenta-teksts">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea adipisci voluptatum dolores, ducimus eaque rem inventore impedit debitis rerum eum!
                        </p>

                        </li>

                        <hr>

                        <li class="preview-komentari">
                        <h4 class="mainpage-komentetaja-user-name">User1</h4>
                        <div class="show-user-name-koments-info">
                            <p class="datums-publicets-koments">
                                10.10.2020.
                            </p>
                            <p class="laiks-publicets-koments">
                                14:20
                            </p>
                        </div>
                        
                        
                        <p class="komenta-teksts">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea adipisci voluptatum dolores, ducimus eaque rem inventore impedit debitis rerum eum!
                        </p>

                        </li>
                    </ul>
            </div>
        </div>
        <div id="about-div">
            <div id="about-content-group">
            <h2 class="about-content">Par mums</h2>
            <p class="about-content">
                Mājaslapu veidoja LU DF 1. kursa studenti Tīmekļa Tehnoloģijas II eksāmenam. 
            </p>
            <p class="about-content">
                Dotajā mājaslapā cilvēki ir spējīgi pievienot, kā arī pieteikties, pasākumiem, kuri var iekļauties dažādās aktivitāšu kategorijās.
            </p>
            <p class="about-content">
            Jāpiemin, ka lietotāju darbību ierobežo tas, kura loma viņiem ir piešķirta.
                
            </p>
            <p class="about-content">
                Lai orientētos šajā mājaslapā, vēlams izmantot navigācijas sadaļas dotās saites, kuras aizvedīs uz citām šī projekta lapām. 
            </p>
            <p class="about-content">
            Jauku dienu!
            </p>
            </div>
        </div>
    </div> -->




@endsection
@section('script')
        pasakumi('popularakie');
@endsection
<!--         
            <div id="pirmais-pasakums" class="pasakumu-list-preview-items">
                
                
            </div>
            
            <div id="otrais-pasakums" class="pasakumu-list-preview-items">
                <div class="pasakumu-list-preview-pasakuma">
                    <h2 class="tituls-pasakums">Title1</h2>
                    <ul>
                        <li class="main-user-name-pasakums-publicetajs">
                            <p class="main-user-name-pasakums"><a href="" class="link-to-publicetajs">User2</a></p>
                            
                        </li>
                        <li class="pasakumu-list-preview-attels">
                            <div>
                                bilde seit
                            </div>
                        </li>
                        <li class="mainpage-apraksts">
                            <h4>Apraksts</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero ea commodi ducimus tenetur consectetur at dignissimos! Neque deserunt quas eos.</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="tresais-pasakums" class="pasakumu-list-preview-items">
                <div class="pasakumu-list-preview-pasakuma">
                    <h2 class="tituls-pasakums">Title1</h2>
                    <ul>
                        <li class="main-user-name-pasakums-publicetajs">
                            <p class="main-user-name-pasakums"><a href="" class="link-to-publicetajs">User2</a></p>
                            
                        </li>
                        <li class="pasakumu-list-preview-attels">
                            <div>
                                bilde seit
                            </div>
                        </li>
                        <li class="mainpage-apraksts">
                            <h4>Apraksts</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero ea commodi ducimus tenetur consectetur at dignissimos! Neque deserunt quas eos.</p>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div id="about-div">
            <div id="about-content-group">
            <h2 class="about-content">Par mums</h2>
            <p class="about-content">
                Mājaslapu veidoja LU DF 1. kursa studenti Tīmekļa Tehnoloģijas II eksāmenam. 
            </p>
            <p class="about-content">
                Dotajā mājaslapā cilvēki ir spējīgi pievienot, kā arī pieteikties, pasākumiem, kuri var iekļauties dažādās aktivitāšu kategorijās.
            </p>
            <p class="about-content">
            Jāpiemin, ka lietotāju darbību ierobežo tas, kura loma viņiem ir piešķirta.
                
            </p>
            <p class="about-content">
                Lai orientētos šajā mājaslapā, vēlams izmantot navigācijas sadaļas dotās saites, kuras aizvedīs uz citām šī projekta lapām. 
            </p>
            <p class="about-content">
            Jauku dienu!
            </p>
            </div>
            
        </div> -->