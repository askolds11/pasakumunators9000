@extends('layout_custom')

@section('title', 'Pasākumunators9000')

@section('content')
    <div id="parent-preview-pasakums">
        <div id="pasakums-preview" class="mainpage-content">
            <h3 id="tituls-pasakums">TITULS</h3>
                <div id="saturs-par-pasakumu">
                    <p>
                    

                    </p>
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