<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\News;
use Validator;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = DB::table('news')->get()->reverse();
        $cat = DB::table('categories')->get();

        return view('admin.index', compact('news', 'cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = DB::table('categories')->get();

        return view('admin.createNews', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $news = DB::table('news')->find($id);
        $cat = DB::table('categories')->get();
//        dd($news);
        return view('admin/edit', compact('news', 'cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'short_name' => 'required',
            'content' => 'required',
            'short_discription' => '',
            'category_id' => 'required',
        ]);

        $data = $request->except('_token', '_method');
//        dd($data);

        if($request->hasFile('img_path')) {
            $file = $request->file('img_path');
            $destinationPath =  '/images/NewsImage/';
            $newFileName =  rand(0, 100) . '.jpg';

            $file->move(public_path() . $destinationPath, $newFileName);

            $data['img_path'] = $destinationPath . $newFileName;
        } else {
            $data['img_path'];

        }
//        $data = $request->except('img_old_path');

        $data['user_id'] = Auth::user()->id;

        $data['id'] = $request->input('id');
//dd($data);
        News::updateOrCreate(
            ['id' => $data['id']],
            [
                'category_id' => $data['category_id'],
                'title' => $data['title'],
                'short_name' => $data['short_name'],
                'content' => $data['content'],
                'short_discription' => $data['short_discription'],
                'user_id' => $data['user_id'],
                'img_path' => $data['img_path']
            ]);
        return back()->with('success', 'News has been added(edit)');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
