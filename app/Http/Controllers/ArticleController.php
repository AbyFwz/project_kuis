<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Session;
use Auth;
use Image;

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

    public function manage()
    {
        $articles = Article::all();
        // $articles = json_decode(json_encode($articles));
        // echo "<pre>"; print_r($articles); die;
        return view('admin.blog.articles.admin_view_article')->with(compact('articles'));
    }

    public function createArticle(Request $request)
    {
        if ($request->isMethod('post')) {
            // Upload Image
            if ($request->file('image')) {
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'img/backend_img/articles/large/'.$filename;
                    $medium_image_path = 'img/backend_img/articles/medium/'.$filename;
                    $small_image_path = 'img/backend_img/articles/small/'.$filename;
                    // Resize Image
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                    
                }
            }
            Article::create([
                'title' => $request->title,
                'content' => $request->content,
                'featured_image' => $filename
            ]);
            return redirect('/admin/blog/articles')->with('flash_message_success', 'Data Berhasil Ditambahkan');
        }
        // View Create Form
        return view('admin.blog.articles.admin_add_article');
    }

    public function updateArticle($id, Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->file('image')) {
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    # code...
                }
            }
            $article = Article::find($id);
            $article->title = $request->title;
            $article->content = $request->content;
            $article->featured_image = $request->image;
            $article->save();
            return redirect('/admin/blog/articles')->with('flash_message_success', 'Data Berhasil Diubah');
        }
        $article = Article::find($id);
        return view('admin.blog.articles.admin_edit_article')->with(compact('article'));
    }

    public function delete($id)
    {
        Article::find($id)->delete();
        return redirect('/admin/blog/articles');
    }
}
