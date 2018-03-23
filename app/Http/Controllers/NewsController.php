<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\News;
use App\Category;
use App\Comment;
use Validator;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $news = DB::table('news')->get()->reverse();
        $cat = DB::table('categories')->get();
        $partners = DB::table('feed_partners')->get();
        return view('news.news', compact('news', 'cat', 'partners'));
    }

    public function category_id($category_id)
    {
        $cat_id = intval($category_id);

        $news = DB::table('news')
            ->select()
            ->where('category_id', $cat_id)
            ->get()
            ->reverse();
        $cat = DB::table('categories')->get();

        return view('news.news', compact('news','cat'));
    }

    public function show($id)
    {
        $newsID = DB::table('news')->find($id);
        $news = DB::table('news')->get();
        $cat = DB::table('categories')->get();
        $partners = DB::table('feed_partners')->get();
        $comment = Comment::get()->all();

        return view('news.onenews', compact('newsID', 'cat', 'news', 'partners', 'comment'));
    }

    public function addcomment(Request $request)
    {
        $data = $request->except('_token');
        $data ['news_id'] = $request->input('news_id');
        //dd($data);

        Comment::create($data);
        return back()->with('success', 'Task has been added');
    }
    
    public function create()
    {
        $cat = DB::table('categories')->get();

        return view('news.createNews', compact('cat'));
    }


    public function store(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'short_name' => 'required',
            'content' => 'required',
            'short_discription' => '',
            'category_id' => 'required',
            'img_path' => ''
        ]);


        if($request->hasFile('img_path')) {
            $file = $request->file('img_path');
            $destinationPath =  '/images/NewsImage/';
            $newFileName =  rand(0, 100) . '.jpg';

            $file->move(public_path() . $destinationPath, $newFileName);

        }
//        if (!empty($_FILES ['file']['size'] )) {
//            move_uploaded_file($_FILES['file']['tmp_name'], 'images/NewsImage' . $_FILES['file'][(rand(0,100))]);
//        } else {
//            $error['file'] = 'Размер файла более 10 Мб';
//        }

        $data = $validator->getData();
        $data['img_path'] = $destinationPath . $newFileName;
//        dd($data);
        $data['user_id'] = Auth::user()->id;
//        dd($data);
//        $data['category_id'] = Category::;

        if ($validator->fails()) {
            dd('NO');
        } else {
//           dd($data);
            $newsPost = News::create($data);
        }

//        dd($validator);


        return back()->with('success','Task has been updated');
    }


    public function delete(Request $request)
    {

        $news = DB::table('news')->get();
        
    }
}
