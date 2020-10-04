<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class ArticleController extends Controller
{
    public function viewArticle($slug)
    {
        $slug = ucfirst(str_replace('-', ' ', $slug));

        // echo $slug; die;

        $article = Article::where(['title'=>$slug])->first();
        // $article = json_decode(json_encode($article));

        // echo "<pre>"; print_r($article); die;

        return view('articleViews')->with(compact('article'));
    }
}
