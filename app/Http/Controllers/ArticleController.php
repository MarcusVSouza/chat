<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = DB::table('articles')->paginate(15);
        // $articles = DB::table('articles');
        // return $articles;
        $encrypted = Crypt::encrypt($articles);
        // return Article::all();
        return $encrypted->toJson();
    }
 
    public function show($id)
    {
        return Article::find($id);
    }

    public function store(Request $request)
    {
        return Article::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return 204;
    }
    public function status()
    {
        $status = DB::select("SELECT UPDATE_TIME
        FROM   information_schema.tables
        WHERE  TABLE_SCHEMA = 'ppsk2'
        AND TABLE_NAME =  'papeis'");
        $encrypted = Crypt::encrypt($status);
        $decrypted = Crypt::decryptString($encrypted);
        return $status;
    }
}