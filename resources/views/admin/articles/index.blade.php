@extends('layouts.app')

@section('contenu')

    <form action="{{ route('article.search') }}" method="get">
        <div class="input-group" style="width: 40%;">
        <input type="search" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
    <button
    class="btn btn-info" type="submit"
    style="border-top-left-radius: 0;border-bottom-left-radius: 0;height: 43px;">
            <i class="fas fa-search"></i>
    </button>
        </div>
        </div>
    </form>
    <br>
  <table class="table">
      <thead>
          <tr>
              <th>Nom</th>
              <th>Texte</th>
              <th>Image</th>
              <th>Prix</th>
              <th>Quantité</th>
              <th class="text-right">Editer</th>
              <th class="text-right">supprimer</th>
          </tr>
      </thead>
      <tbody>
        @foreach($articles as $article)
          <tr>
              <td scope="row">{{ $article->nom }}</td>
              <td scope="row">{{ $article->texte }}</td>
          <td scope="row" style="text-align: center;"><img src="{{asset('storage/'.$article->photo)}}" style="width: 80px;height: 50px;"></td>
              <td scope="row">{{ $article->prix }}</td>
              <td scope="row">{{ $article->qte }}</td>
              <td class="text-right">
                 <a href="{{ route('article.edit', [
                                'id' => $article->id
                             ])
                          }}"
                 class="btn btn-warning btn-sm">
                 <i class="fas fa-pen-square"></i> Editer
                 </a>
              </td>
              <td class="text-right">

                <form action="{{ route('article.destroy', ['id' => $article->id]) }}" method="post">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger btn-sm">
                     <i class="fa fa-trash"></i> Supprimer
                  </button>
                </form>
              </td>
          </tr>
        @endforeach
      </tbody>
  </table>

  <div class="row">
    <div class="col-md-6 mx-auto">
        {{ $articles->links() }}
    </div>
</div>

@stop
