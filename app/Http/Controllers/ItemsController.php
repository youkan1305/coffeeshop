<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use Storage;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        if(\Auth::user()->admin_flag==1){
            return redirect('/');
        }
        
        $item = Item::all();
        
        return view('items.index', [
            'item' => $item,
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
        
        $item = new Item;
        
        return view('items.create', [
            'item' => $item,
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
        
        $item = new Item;
        $item->name = $request->name;
        $item->money = $request->money;
        $item->text = $request->text;
        $item->sour_taste = $request->sour_taste;
        $item->bitter_taste = $request->bitter_taste;
        $item->flavor = $request->flavor;
        $item->user_id = \Auth::id();

        // バケットの`example`フォルダへアップロードする
        $path = Storage::disk('s3')->putFile('/', $request->image, 'public');
        // アップロードした画像のフルパスを取得
        $item->image = Storage::disk('s3')->url($path);
        
        $item->save();
        
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
        
        $item = Item::findOrFail($id);
        
        return view('items.show', [
            'item' => $item,
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
        
        $item = Item::findOrFail($id);
        
        return view('items.edit', [
            'item' => $item,
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
        
        $item = Item::findOrFail($id);
        $item->name = $request->name;
        $item->money = $request->money;
        $item->text = $request->text;
        $item->sour_taste = $request->sour_taste;
        $item->bitter_taste = $request->bitter_taste;
        $item->flavor = $request->flavor;
        $item->user_id = \Auth::id();
        
        if(!empty($request->image)){

        // バケットの`example`フォルダへアップロードする
        $path = Storage::disk('s3')->putFile('/', $request->image, 'public');
        // アップロードした画像のフルパスを取得
        $item->image = Storage::disk('s3')->url($path);
        }
        
        $item->save();

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
        
        $item = Item::findOrFail($id);
        
        // 削除
        $item->delete();

        // リダイレクトさせる
        return redirect('/');
    }
    
 /*   public function adminCheck()
    {
        if(\Auth::user()->admin_flag==0){
            return redirect('/');
        }
    } */
}
