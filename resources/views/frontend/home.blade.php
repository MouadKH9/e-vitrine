@extends('layouts.front')
@section('content')

<div class="container-fluid wallpaper">
    <h1>
        E-Vitrine
    </h1>
    <h4>
        Votre première source des meilleurs produits
    </h4>
</div>

<style>
    .wallpaper {
        height: 60vh;
        background: url('/wallpaper.jpg');
        background-size: 100%;
        background-position: 25%;
    }

    .wallpaper h1 {
        text-align: center;
        margin-top: 10%;
        color: white;
        text-transform: uppercase;
    }

    .wallpaper h4 {
        text-align: center;
        color: #dadada;
    }
</style>

@endsection