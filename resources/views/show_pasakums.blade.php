@extends('layout_custom')

@section('title', 'Pasākums + tā nosaukums')

@section('content')
<div id="content-show-pasakuma-group">


    <div id="show_pasakums" class="show-content-child">    
        <h2 id="title-show-pasakums">Title</h2>
        <ul>
            <li id="show-user-name-pasakums-publicetajs">
                <p id="show-user-name-pasakums"><a href="" id="link-to-publicetajs">User2</a></p>
                <p id="show-datums-publicets-pasakums">09.10.2020.</p>
                <p id="show-laiks-publicets-pasakums">12:00:00</>
            </li>
            <li id="apraksts-show-pasakums" class="show-pasakuma-info">
                <h3>
                    Apraksts
                </h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut suscipit laudantium omnis corporis corrupti culpa! Cum 

                </p>
            </li>
            <li id="apraksts-show-pasakums" class="show-pasakuma-info">
                <h3>
                    Datums
                </h3>
                <p>
                    10.10.2020.
                </p>
            </li>
            <li id="apraksts-show-pasakums" class="show-pasakuma-info">
                <h3>
                    Norises ilgums
                </h3>
                <p>
                    10 dienas
                </p>
            </li>
            <li id="apraksts-show-pasakums" class="show-pasakuma-info">
                <h3>
                    Cena
                </h3>
                <p>
                    3.50
                </p>
            </li>
            <li id="apraksts-show-pasakums" class="show-pasakuma-info">
                <h3>
                    Kategorija
                </h3>
                <p > 
                    1
                </p>
            </li>
            <li id="pieteikties">
                <button id="button-pieteikties">
                    Pieteikties
                </button>
                
            </li>
        </ul>
        
       
        
    </div>
    <div id="show_pasakums_komentari" class="show-content-child">
        <h3 id="title-show-pasakums-komentari">Komentāri</h3>
            <ul>
                <li class="show-user-name-koments">
                    <h4>User1</h4>
                    <div class="show-user-name-koments-info">
                        <p class="datums-publicets-koments">
                            10.10.2020.
                        </p>
                        <p class="laiks-publicets-koments">
                            14:20
                        </p>
                    </div>
                    
                    
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea adipisci voluptatum dolores, ducimus eaque rem inventore impedit debitis rerum eum!
                    </p>
                </li>
                <li class="show-user-name-koments">
                    <h4>User1</h4>
                    <div class="show-user-name-koments-info">
                        <p class="datums-publicets-koments">
                            10.10.2020.
                        </p>
                        <p class="laiks-publicets-koments">
                            14:20
                        </p>
                    </div>
                    
                    
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea adipisci voluptatum dolores, ducimus eaque rem inventore impedit debitis rerum eum!
                    </p>
                </li>
                
                

            </ul>
    </div>
</div>
<div id="attels-preview-show-pasakums-reklama">
    <h3>Attēlu reklama</h3>
    <button>
        Poga-pievienot attēlu(nav css)
    </button>
    <div class="attels-child">
        img
    </div>
</div>

<div id="attels-preview-show-pasakums-galerija">
    <h3>Attēlu galerija</h3>
    <button>
        Poga-pievienot attēlu(nav css)
    </button>
    <div id="attels-child">
        img
    </div>

</div>
@endsection

