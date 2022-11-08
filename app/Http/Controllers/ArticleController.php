<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // tous les articles

    public function index()
    {
        //dd(Article::with('category')->latest()->get());
        return view('articles.index', [
            'articles' => Article::with('category')->latest()->filter(request(['tag', 'search']))->paginate(6)
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
        return view('articles.create', [
            'categories' => Category::all()
        ]);
    }

    // store avec injection de request
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required|unique:articles|max:255',
            'category_id' => 'required',
            'tags' => 'required',
            'text' => 'required|max:2000'
        ]);

        $formFields['user_id'] = Auth::user()->id;
        $formFields['author'] = Auth::user()->name;

        if ($request->hasFile('illustration')) {
            $formFields['illustration'] = $request->file('illustration')->store('illustrations', 'public');
        }

        Article::create($formFields);

        return redirect('/')->with('message', 'Article ajouté !');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', [
            'article' => $article,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Article $article)
    {

        $formFields = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'tags' => 'required',
            'text' => 'required|max:2000'
        ]);

        if ($request->hasFile('illustration')) {
            $formFields['illustration'] = $request->file('illustration')->store('illustrations', 'public');
        }

        $article->update($formFields);

        return redirect('/')->with('message', 'Article édité !');
    }

    public function delete(Article $article)
    {
        $article->delete();
        return redirect('/')->with('message', 'Article supprimmé !');
    }
}
