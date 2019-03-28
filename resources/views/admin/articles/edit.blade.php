@extends('layouts.app')

@section('content')

    <h2>Modifier Article: {{ $article->nom }}</h2>

    @if($errors->any())
    <div class="alert alert-warning">
      <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form action="{{ route('article.update', ['id' => $article->id ]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom</label>
            <input id="name" name="name" type="text" class="form-control input-lg"  value="{{ $article->nom }}">
        </div>

        <div class="form-group">
            <label for="texte">Texte</label>
            <textarea class="form-control" name="texte" id="texte" cols="30" rows="4">{{ $article->texte }}</textarea>
        </div>

        <div class="form-group">
            <label for="">Image</label>
            <input class="form-control" type="file" name="photo"  value="{{ $article->photo }}" onchange="readURL(this);">
            </div class="form-group">
                <img id="blah" src="{{asset('storage/'.$article->photo)}}" style="height: 50px;margin:8px;">
            <div>
        </div>

        <div class="form-group">
            <label for="prix">Prix</label>
            <input id="prix" name="prix" type="number" class="form-control input-lg" value="{{ $article->prix }}">
        </div>

        <div class="form-group">
            <label for="qte">Quantité</label>
            <input id="qte" name="qte" type="number" class="form-control input-lg" value="{{ $article->qte }}">
        </div>

        <button class="btn btn-block btn-warning">
            <i class="far fa-edit"></i> Update
        </button>
    </form>

@endsection
