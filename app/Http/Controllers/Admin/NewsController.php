<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\News;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $news = News::all();
        return view('admin.pages.news')->with("news",$news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.addNews');
    }

    public function edit($id)
    {
        $article = News::find($id);
        return view('admin.pages.addNews')->with('article',  $article);
    }


    public function store(Request $request)
    {
       if (empty($request->id)) {
        $news = new News();
        $alert="Noticia Añadida";
      }else{
        $news = News::find($request->id);
        $alert="noticia Actualizada";
      }

        $news->title = $request->title;
        $news->url = $request->url;


        $featured_image = $request->file('featured_image');

      if($featured_image){
      \File::delete(public_path() .'/upload/blogs/'.$news->featured_image.'-b.jpg');
      \File::delete(public_path() .'/upload/blogs/'.$news->featured_image.'-s.jpg');
        $tmpFilePath = 'upload/blogs/';
        $hardPath =  str_slug($news->title, '-').'-'.md5(rand(0,99999));
        $img = Image::make($featured_image);
        $img->fit(1024, 720)->save($tmpFilePath.$hardPath.'-b.jpg');
        $img->fit(358, 238)->save($tmpFilePath.$hardPath.'-s.jpg');
        $news->image = $hardPath;

        }






        $news->save();
        \Session::flash('flash_message', $alert);
        return \Redirect::back();
    }




    public function destroy($id)
    {
        //
    }
}
