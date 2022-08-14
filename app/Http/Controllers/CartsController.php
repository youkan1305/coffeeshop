<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Order;
use App\User;
use App\Requestorder;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $request_order = Requestorder::all();
        
        return view('carts.index', [
            'request_order' => $request_order,
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
        $cart = new Requestorder;
        
        return view('carts.create', [
            'cart' => $cart,
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
        $request_order = new Requestorder;
        
        $user = \Auth::user();
        
        $user->loadRelationshipCounts();
        $orders = $user->orders()->get();
        $item = Item::all();
        
        $request_order->user_id = \Auth::id();
        $request_order->delivery_name = $request->delivery_name;
        $request_order->delivery_address_number = $request->delivery_address_number;
        $request_order->delivery_address = $request->delivery_address;
        $request_order->delivery_address_tel = $request->delivery_address_tel;
        
        $request_order->save();
        
        // $request_order->idが今回新たに保存された注文（配送先情報）のid
        $user->orders()->where('request_id', NULL)->update(['request_id' => $request_order->id]);
        
        return view('carts.show', [
            'request_order' => $request_order,
            'user' => $user,
            'orders' => $orders,
            'item' => $item,
        ]);
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
        $user = \Auth::user();
        $item = Item::all();
        $request_order = Requestorder::findOrFail($id);
        $user->loadRelationshipCounts();
        $orders = $user->orders()->get();
        $total = 0;
        foreach($orders as $order) {
            $tanka_goukei = $order->quantity * $order->item->money;
            $total += $tanka_goukei;
        }
        
        $orders = $user->orders()->where('request_id', NULL)->get();
        
        
        
        return view('carts.show', [
            'request_order' => $request_order,
            'user' => $user,
            'orders' => $orders,
            'item' => $item,
            'total' => $total,
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
        $user = \Auth::user();
        $cart = Requestorder::findOrFail($id);
        
        $user->loadRelationshipCounts();
        $orders = $user->orders()->get();
        $item = Item::all();
        
        return view('carts.edit', [
            'cart' => $cart,
            'user' => $user,
            'orders' => $orders,
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
        $user = \Auth::user();
        
        $cart = Requestorder::findOrFail($id);
        
        $user->loadRelationshipCounts();
        $orders = $user->orders()->get();
        $item = Item::all();
        
        $cart->user_id = \Auth::id();
        $cart->delivery_name = $request->delivery_name;
        $cart->delivery_address_number = $request->delivery_address_number;
        $cart->delivery_address = $request->delivery_address;
        $cart->delivery_address_tel = $request->delivery_address_tel;
        
        $cart->save();
    
        
        return view('carts.show', [
            'cart' => $cart,
            'user' => $user,
            'orders' => $orders,
            'item' => $item,
        ]);
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
