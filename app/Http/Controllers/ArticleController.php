<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\DataTransfer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class ArticleController extends Controller
{
    
    public function index()
    {
        return Article::all();
        // $dataTransfer = new DataTransfer;
        // $articles = DB::table('articles')->paginate(15);
        // // $articles = DB::table('articles');
        // // return $articles;
        // $encrypted = Crypt::encrypt($articles);
        // $dataTransfer->data = $encrypted;
        // return $dataTransfer;
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
