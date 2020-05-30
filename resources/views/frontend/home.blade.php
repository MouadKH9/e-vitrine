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

<div class="container">
    <h3 class="text-center">Produits populaires</h3>
    <div class="row">
        @foreach($popProduits as $prod)
        <div class="col-md-3 prod">
            <img src="/storage/{{ $prod->image }}" alt="Image" class="img-fluid">
            <h4>
                {{$prod->name}}
            </h4>
            <p>
                {{$prod->description}}
            </p>
        </div>
        @endforeach
    </div>
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

    .prod img {
        width: 100%;
        height: 200px
    }

    .prod p {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

@endsection