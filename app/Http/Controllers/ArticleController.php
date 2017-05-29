<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Carbon\Carbon;
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
        $article->ARTName = $request->get('artName');
        $article->ARTCategory = $request->get('artCategory');
        $article->ARTDescription = $request->get('artDes');
        $article->CDate = Carbon::now();
        $article->CBy = $request->get('artUser');
        if($article->save()){
            alert()->success('Success', 'Article inserted successfully!')->autoclose(3000);
            return redirect('admin/article');
        }
        alert()->error('Failed', 'Failed inserting article!')->autoclose(3000);
        return redirect()->back();
    }

    public function deleteArticle($id){
        $article = Article::find($id);
        if($article->delete()){
            return response(['msg'=>'Article Delete Successfully!', 'status'=>'success']);
        }
        return response(['msg'=>'Failed deleting the article.', 'status'=>'failed']);
    }

    public function editPage($id){
        $article = Article::find($id);
        return view('admin.article.update_article', array('title'=>'Edit Article Page','article'=>$article));
    }

    public function editArticle(Request $request, $id){
        $article =  Article::find($id);
        $article->ARTName = $request->get('artName');
        $article->ARTCategory = $request->get('artCategory');
        $article->ARTDescription = $request->get('artDes');
        $article->MDate = Carbon::now();
        $article->MBy = $request->get('artUser');
        if($article->save()){
            alert()->success('Success', 'Article updated successfully!')->autoclose(2000);
            return redirect('admin/article');
        }
        alert()->error('Failed', 'Failed updating article!')->autoclose(2000);
        return redirect()->back();
    }
}
