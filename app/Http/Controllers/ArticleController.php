<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // tous les articles
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // un article en particulier
    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article
        ]);
    }

    //creation d'article
    public function create()
    {
        return view('articles.create');
    }

    // store avec injection de request
    public function store(Request $request)
    {

        // vérifier la doc + demander à Julien
        //https://laravel.com/docs/9.x/validation

        $formFields = $request->validate([
            'title' => 'required|unique:articles|max:255',
            'tags' => 'required',
            'text' => 'required|max:2000'
        ]);

        if ($request->hasFile('illustration')) {
            $formFields['illustration'] = $request->file('illustration')->store('illustrations', 'public');
        }

        //$formFields['user_id'] = auth()->id();

        Article::create($formFields);

        return redirect('/')->with('message', 'Article ajouté !');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Request $request, Article $article)
    {

        $formFields = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
            'tags' => 'required',
            'text' => 'required|max:2000'
        ]);

        if ($request->hasFile('illustration')) {
            $formFields['illustration'] = $request->file('illustration')->store('illustrations', 'public');
        }

        $article->update($formFields);

        return back()->with('message', 'Article édité !');
    }

    public function delete(Article $article)
    {
        $article->delete();
        return redirect('/')->with('message', 'Article supprimmé !');
    }
}
