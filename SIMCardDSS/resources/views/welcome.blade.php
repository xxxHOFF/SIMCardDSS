@extends('layouts.layout')

@section('main_content')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Beeline Image-->
        <img class="masthead-avatar mb-5" src="{{ asset('assets/img/beeline.png') }}" alt="..."/>
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">Билайн</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-black">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Система хранения данных SIM-карт</p>
    </div>
@endsection
