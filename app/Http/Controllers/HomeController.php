<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        // Cache::remember('articlesAll', 15, function(){
        //     return Article::paginate(5);
        // });
        // $articlesAll = Cache::get('articlesAll');
        $articlesAll = Article::paginate(5);
        // $articlesAll = json_decode(json_encode($articlesAll));
        // echo "<pre"; print_r($articlesAll); die;

        return view('homeViews')->with(compact('articlesAll'));
    }
}
