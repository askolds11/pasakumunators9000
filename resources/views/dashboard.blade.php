@extends('layout_dashboard')

@section('title', 'Reset')

@section('content')
<div id="dashboard-content">
        <div id="about-div">
            <div id="about-content-group">
                <h2 class="about-content">Jūs esiet ierakstījies savā kontā - {{ Auth::user()->name }}!</h2>
                <h2 class="about-content">Paldies, ka lietojat mūsu mājaslapu! :D</h2>
            
            
            </div>
        </div>
    

</div>
@endsection

