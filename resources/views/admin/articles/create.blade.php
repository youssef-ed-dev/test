@extends('layouts.app')

@section('content')

    <h2>Ajouter un Article :</h2>

    @if($errors->any())
    <div class="alert alert-warning">
      <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nom</label>
            <input id="name" name="name" type="text" class="form-control input-lg" placeholder="Entrer designation">
        </div>

        <div class="form-group">
            <label for="texte">Texte</label>
            <textarea class="form-control" name="texte" id="texte" cols="30" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="">Image</label>
            <input class="form-control" type="file" name="photo" onchange="readURL(this);">
            <div class="form-group">
            <img id="blah" src="http://placehold.it/180" style="height: 50px;margin:8px;">
            </div>
        </div>

        <div class="form-group">
            <label for="prix">Prix</label>
            <input id="prix" name="prix" type="number" class="form-control input-lg" placeholder="Entrer prix">
        </div>

        <div class="form-group">
            <label for="qte">Quantité</label>
            <input id="qte" name="qte" type="number" class="form-control input-lg" placeholder="Entrer Quantité">
        </div>

        <button class="btn btn-block btn-primary">
            <i class="fa fa-plus"></i> Submit
        </button>
    </form>

@endsection
