@extends('layout_custom')

@section('title', 'Pasākumunators9000')

@section('content')
    <div id="parent-preview-pasakums">
        <div id="pasakums-preview" class="mainpage-content">
            <h3 id="tituls-pasakums">TITULS</h3>
                <div id="saturs-par-pasakumu">

                <form action="">
                <label for="">Izvēlēties atlasi:</label>
                <select name="" id="">
                    <option value="popular">Populārākie pēc pieteikuma skaita</option>
                    <option value="best">Vislabāka novērtētie pasākumi</option>
                    <option value="newest">Visjaunākie pasākumi</option>
                </select>
                <input type="submit" value="Filter" id="atlasi-button">
                </form>
                    <div class="pasakumu-list-preview">
                        <ul>
                            <li>
                                <div id="pirmais-pasakums" class="pasakumu-list-preview-items">
                                    <h2>Title1</h2>
                                    <ul>
                                    <li class="main-user-name-pasakums-publicetajs">
                                        <p class="main-user-name-pasakums"><a href="" class="link-to-publicetajs">User2</a></p>
                                        <!-- <p class="main-datums-publicets-pasakums">09.10.2020.</p>
                                        <p class="main-laiks-publicets-pasakums">12:00:00</> -->
                                    </li>
                                    <li>
                                        bilde
                                    </li>
                                    <li id="apraksts-show-pasakums" class="show-pasakuma-info">
                                        <h3>
                                            Apraksts
                                        </h3>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut suscipit laudantium omnis corporis corrupti culpa! Cum 

                                        </p>
                                    </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div id="otrais-pasakums" class="pasakumu-list-preview-items">
                                <h2>Title1</h2>
                                    <ul>
                                    <li class="main-user-name-pasakums-publicetajs">
                                        <p class="main-user-name-pasakums"><a href="" class="link-to-publicetajs">User2</a></p>
                                        <!-- <p class="main-datums-publicets-pasakums">09.10.2020.</p>
                                        <p class="main-laiks-publicets-pasakums">12:00:00</> -->
                                    </li>
                                    <li>
                                        bilde
                                    </li>
                                    <li id="apraksts-show-pasakums" class="show-pasakuma-info">
                                        <h3>
                                            Apraksts
                                        </h3>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut suscipit laudantium omnis corporis corrupti culpa! Cum 

                                        </p>
                                    </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div id="tresais-pasakums" class="pasakumu-list-preview-items">
                                <h2>Title1</h2>
                                    <ul>
                                    <li class="main-user-name-pasakums-publicetajs">
                                        <p class="main-user-name-pasakums"><a href="" class="link-to-publicetajs">User2</a></p>
                                        <!-- <p class="main-datums-publicets-pasakums">09.10.2020.</p>
                                        <p class="main-laiks-publicets-pasakums">12:00:00</> -->
                                    </li>
                                    <li>
                                        bilde
                                    </li>
                                    <li id="apraksts-show-pasakums" class="show-pasakuma-info">
                                        <h3>
                                            Apraksts
                                        </h3>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut suscipit laudantium omnis corporis corrupti culpa! Cum 

                                        </p>
                                    </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
    
                        
                        <div id="pirmais-pasakums" class="pasakumu-list-preview-items">

                        </div>
                    </div>
                    <button id="atteli-button">Attēli</button> <!-- Parādītu attēlus dotajam projektam -->
                </div>
        </div>
        <div id="komentari">
            <h4 id="tituls-komentari">KOMENTĀRI</h4>
            <div id="saturs-par-komentariem">
                <ul>
                    <li id="pirmais-preview-koments" class="preview-komentari">1.komentars</li>
                    <li id="pirmais-preview-koments" class="preview-komentari">1.komentars</li>
                    <li id="pirmais-preview-koments" class="preview-komentari">1.komentars</li>
                </ul>
        </div>
        </div>
    </div>
@endsection