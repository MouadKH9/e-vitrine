@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center">Tous les produits</h4>
                </div>
                <div class="panel-body">
                   <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Description</th>
                                <th scope="col">Views</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produits as $produit)
                                <tr>
                                    <th scope="row">{{ $produit->id }}</th>
                                    <td>{{ $produit->name }}</td>
                                    <td>{{ substr($produit->description,0,10    ) }}...</td>
                                    <td>{{ $produit->views }}</td>
                                    <td>
                                        <a href="#">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" class="text-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection