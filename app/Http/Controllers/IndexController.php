<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Information;
use App\News;
use App\User;
use App\Order;

class IndexController extends Controller
{
    public function welcome()
    {
        $news = News::all();
        $informations = Information::all();
        
        return view('welcome', [
            'news' => $news,
            'informations' => $informations,
        ]);
    }
    //productsページ
    public function prodeuct()
    {
        $item = Item::all();
        
        return view('products.products', [
            'item' => $item,
        ]);
    }
    
    
    public function method()
    {
        return view('methods.method');
    }
    
    public function access()
    {
        return view('accesses.access');
    }
    
    
    public function mypage()
    {
        return view('mypage.mypage');
    }
    
    
    public function cart()
    {
        
        
        return view('carts.index');
    }
    
    //
    public function delete($id)
    {
        $mypage = User::findOrFail($id);
        return view('mypages.destroy', [
            'mypage' => $mypage,
        ]);
    }
    
    public function manegeritem()
    {
        $items = Item::all();
        return view('mypage.item', [
            'items' => $items,
        ]);
    }
    
    public function manegerinfo()
    {
        $informations = Information::all();
        return view('mypage.information', [
            'informations' => $informations,
        ]);
    }
    
    public function manegernew()
    {
        $news = News::all();
        return view('mypage.news', [
            'news' => $news,
        ]);
    }
    
    public function completepage()
    {
        
        return view('completepage.completepage');
    }
}
