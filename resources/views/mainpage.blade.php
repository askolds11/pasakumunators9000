@extends('layout_custom')

@section('title', 'Pasākumunators9000')

@section('content')
    <div id="mainpage-contnet-parent">
            
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
        <div id="mainpage-pasakumi-komentari">

        
            <div id="pirmais-pasakums" class="pasakumu-list-preview-items">
                <div class="pasakumu-list-preview-pasakuma">
                    <h2 class="tituls-pasakums">Title1</h2>
                    <ul>
                        <li class="main-user-name-pasakums-publicetajs">
                            <p class="main-user-name-pasakums"><a href="" class="link-to-publicetajs">User2</a></p>
                            <!-- <p class="main-datums-publicets-pasakums">09.10.2020.</p>
                            <p class="main-laiks-publicets-pasakums">12:00:00</> -->
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
            <div id="otrais-pasakums" class="pasakumu-list-preview-items">
                <div class="pasakumu-list-preview-pasakuma">
                    <h2 class="tituls-pasakums">Title1</h2>
                    <ul>
                        <li class="main-user-name-pasakums-publicetajs">
                            <p class="main-user-name-pasakums"><a href="" class="link-to-publicetajs">User2</a></p>
                            <!-- <p class="main-datums-publicets-pasakums">09.10.2020.</p>
                            <p class="main-laiks-publicets-pasakums">12:00:00</> -->
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
            <div id="tresais-pasakums" class="pasakumu-list-preview-items">
                <div class="pasakumu-list-preview-pasakuma">
                    <h2 class="tituls-pasakums">Title1</h2>
                    <ul>
                        <li class="main-user-name-pasakums-publicetajs">
                            <p class="main-user-name-pasakums"><a href="" class="link-to-publicetajs">User2</a></p>
                            <!-- <p class="main-datums-publicets-pasakums">09.10.2020.</p>
                            <p class="main-laiks-publicets-pasakums">12:00:00</> -->
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
    </div>




@endsection