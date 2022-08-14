<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(\Auth::user()->admin_flag==0){
            return redirect('/');
        }
        
        $new = News::all();
        
        return view('news.index', [
            'news' => $new,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(\Auth::user()->admin_flag==0){
            return redirect('/');
        }
        
        $news = new News;
        
        return view('news.create', [
            'news' => $news,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(\Auth::user()->admin_flag==0){
            return redirect('/');
        }
        
        $news = new News;
        $news->text = $request->text;
        $news->user_id = \Auth::id();
        $news->save();
        
        

        // 
        return redirect('/');
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
        if(\Auth::user()->admin_flag==0){
            return redirect('/');
        }
        
        $news = News::findOrFail($id);
        
        return view('news.show', [
            'news' => $news,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(\Auth::user()->admin_flag==0){
            return redirect('/');
        }
        
        $news = News::findOrFail($id);
        
        return view('news.edit', [
            'news' => $news,
        ]);
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
        //
        if(\Auth::user()->admin_flag==0){
            return redirect('/');
        }
        
        $news = News::findOrFail($id);
        
        // 更新
        $news->text = $request->text;
        $news->save();

        // リダイレクトさせる
        return redirect('/');
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
        if(\Auth::user()->admin_flag==0){
            return redirect('/');
        }
        
        $news = News::findOrFail($id);
        
        // 削除
        $news->delete();

        // リダイレクトさせる
        return redirect('/');
    }
}
