<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Information;

class InformationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $information = Information::all();
        
        return view('informations.index', [
            'information' => $information,
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
        $information = Information::all();
        
        return view('informations.create', [
            'information' => $information,
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
        $information = new Information;
        $information->text = $request->text;
        $information->user_id = \Auth::id();
        $information->save();
        
        

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
        $information = Information::findOrFail($id);
        
        return view('informations.show', [
            'information' => $information,
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
        $information = Information::findOrFail($id);
        
        return view('informations.edit', [
            'information' => $information,
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
        $information = Information::findOrFail($id);
        
        // 更新
        $information->text = $request->text;
        $information->save();

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
        $information = Information::findOrFail($id);
        
        // 削除
        $information->delete();

        // リダイレクトさせる
        return redirect('/');
    }
}
