<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class MypageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mypage = User::findOrFail($id);
        
        return view('mypages.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
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
        $mypage = User::findOrFail($id);
        
        return view('mypages.show', [
            'mypages' => $mypage,
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
        $mypage = User::findOrFail($id);
        
        return view('mypages.edit', [
            'mypage' => $mypage,
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
        $mypage = User::findOrFail($id);
        
        $mypage->name = $request->name;
        $mypage->email = $request->email;
        $mypage->adress_number = $request->adress_number;
        $mypage->address = $request->address;
        $mypage->tel = $request->tel;
        
        $mypage->save();
        
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
        $mypage = User::findOrFail($id);
        
        $mypage->delete();
        
        return redirect('/');
    }
}
