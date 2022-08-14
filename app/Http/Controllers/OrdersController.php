<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Order;
use App\User;
use App\Requestorder;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = \Auth::user();
        
        $user->loadRelationshipCounts();
        
        $orders = $user->orders()->get();
        
        $item = Item::all();
        
        return view('products.show', [
            'user' => $user,
            'orders' => $orders,
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
        $order = new Order;
        
        return view('products.products', [
            'order' => $order,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        
        
        $order = new Order;
        
        $order->item_id = $id;
        $order->user_id = \Auth::id();
        
        $order->weight = $request->weight;
        $order->roasting = $request->roasting;
        $order->grind = $request->grind;
        $order->quantity = $request->quantity;
        
        $order->save();
        
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $user = \Auth::user();
        $item = Item::all();
        
        $user->loadRelationshipCounts();
        $orders = $user->orders()->get();
        $total = 0;
        foreach($orders as $order) {
            $tanka_goukei = $order->quantity * $order->item->money;
            $total += $tanka_goukei;
        }
        
        $orders = $user->orders()->where('request_id', NULL)->get();

        return view('products.show', [
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
        $order = Order::findOrFail($id);
        
        if (\Auth::id() === $order->user_id) {
            $order->delete();
        }
        
        return back();
    }
    
    function goukei($a, $b) {
        
        $orders = $user->orders()->get();
        $item = Item::all();
        
        $a = $order->quantity()->get();
        $b = $item->money();
        return $a * $b;
    }

}
