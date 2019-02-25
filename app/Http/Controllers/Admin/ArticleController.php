<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(5);

        return view('admin.articles.index')
                  ->with('articles', $articles);
    }

    public function search(Request $request)
    {
        $Search = $request->get('search');
        $articles = DB::table('articles')->where('nom', 'like', '%'.$Search.'%')->paginate(5);

        return view('admin.articles.index')
                  ->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'texte' => 'required',
            'prix' => 'required|numeric',
            'qte' => 'required|numeric',
        ]);

        $article = new Article();
        $article->nom = $request->name;
        $article->texte = $request->texte;
        if ($request->hasFile('photo')) {
            $article->photo = $request->photo->store('images', 'public');
        }
        $article->prix = $request->prix;
        $article->qte = $request->qte;

        $article->save();

        Session::flash('success', 'This product is created successfully');

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\article $article
     *
     * @return \Illuminate\Http\Response
     */
    public function show(article $article)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\article $article
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('admin.articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\article             $article
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'texte' => 'required',
            'prix' => 'required|numeric',
            'qte' => 'required|numeric',
        ]);

        $article = Article::find($id);

        $article->nom = $request->name;
        $article->texte = $request->texte;

        if ($request->hasFile('photo')) {
            $article->photo = $request->photo->store('images', 'public');
        }
        $article->prix = $request->prix;
        $article->qte = $request->qte;

        $article->save();

        Session::flash('info', 'This product is updated successfully ');

        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\article $article
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        Session::flash('warning', 'This Product is deleted successfully');

        return redirect()->route('article.index');
    }
}
