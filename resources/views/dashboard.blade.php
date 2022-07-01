@extends('layout_dashboard')

@section('title', 'Reset')

@section('content')
<div id="dashboard-content">
        <div id="about-div">
            <div id="about-content-group">
                <h2 class="about-content">{{__('dash.login')}}  - {{ Auth::user()->name }}!</h2>
                <h2 class="about-content">{{__('dash.thankyouforvisit')}}! :D</h2>
                
                <!-- <a href="route('logout')">LOG OUT</a> -->
                <!-- <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                </x-responsive-nav-link> -->
            
            </div>
        </div>
    

</div>
@endsection


