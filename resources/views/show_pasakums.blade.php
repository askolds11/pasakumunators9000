@extends('layout_custom')

@section('title', 'Pasākums + tā nosaukums')

@section('content')
<div id="content-show-pasakuma-group">


    <div id="show_pasakums" class="show-content-child">    
        <h2 id="title-show-pasakums">Title</h2>
        <ul>
            <li id="show-user-name-pasakums-publicetajs">
                <div id=show-pasākuma-details>
                    <p id="show-user-name-pasakums"><a href="" class="link-to-publicetajs">User2</a></p>
                    <p id="show-datums-publicets-pasakums">09.10.2020.</p>
                    <p id="show-laiks-publicets-pasakums">12:00:00</>
                </div>
                <div id=show-edit-delete-link>
                    <a href="" id="show-edit-link">Edit</a>
                    <a href="" id="show-delete-link">Delete</a>
                </div>
                
            </li>
        </ul>
        <ul>
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
    <div id="attels-preview-show-pasakums-galerija"  class="show-content-child">
            <h3 id="attels-preview-show-pasakuma-galerija-title">Attēlu galerija</h3>
            
            <div id="attels-child">
                img
            </div>
            <div id="pievienot">
                <button id="attels-preview-show-pasakuma-galerija-pievienot-attelu">
                    Pievienot attēlu
                </button>
            </div>
            
    </div>
                
                 
</div>




<div id="show_pasakums_komentari">
        <h3 id="title-show-pasakums-komentari">Komentāri</h3>
            <ul>
                <li class="show-user-name-koments">
                    <h4 class="show-komentetaja-user-name">User1</h4>
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
                <li id="post-komentaru">
                    <textarea id="" name="" rows="20" cols="70">Rakstiet savu komentāru šeit...</textarea>
                    <br>
                <input type="submit" value="Post" id="post-komentaru-button">
                </li>
</div>
@endsection

