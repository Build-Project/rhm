<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function articlePage(){
        return view('admin.article.list_article', array('title'=>'Article Page'));
    }

    public function listArticles(){
        $articles = Article::all();
        return $articles->toJson();
    }

    public function createPage(){
        return view('admin.article.create_article', array('title'=>'Create Article Page'));
    }

    public function createArticle(Request $request){
        $article = new Article();
        $article->ARTName = $request->get('art_name');
        $article->ARTCategory = $request->get('art_category');
        $article->ARTDescription = $request->get('art_des');
        $article->CDate = new Datetime();
        $article->CBy = $request->get('art_user');

        if($article->save()){
             return response(['msg'=>'Article Inserted Successfully!', 'status'=>'success']);
        }
        return response(['msg'=>'Failed inserting the article.', 'status'=>'failed']);
    }
}
