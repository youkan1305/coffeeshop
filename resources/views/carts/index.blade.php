@extends('layouts.app')

@section('content')

    {{-- 注文する内容 --}}
    
    <div>
        <div>
            <h4><p>注文内容</p></h4>
            <p>合計金額</p>
        
        </div>
    </div>    
        
    {{-- 決済　とりあえず今はまだ実装しない --}}
    <h4>決済方法</h4>
    
        
    <p>注文内容</p>
        {{-- お客様情報　ログインしていたら各場所に登録したものが入る --}}
        <h4>お客様情報</h4>
        
            <div class="form-group">
                <p>お名前</p>　　
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <p>郵便番号</p>　　
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <p>住所</p>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <p>電話番号</p>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <p>メールアドレス</p>
                <input type="text" class="form-control">
            </div>
    　　
    　　
    　　
　　{{-- お届け先情報 --}}
    <h4>お届け先</h4>
        <table class="table table-borderless">
            <thead>
                
            </thead>
            <tr>
                <td class="text-left col-md-2">住所</td>
                <td class="text-left col-md-4">{{ $request_order->delivery_name }}</td>
            </tr>
            <tr>
                <td class="text-left col-md-2">郵便番号</td>
                <td class="text-left col-md-4">{{ $request_order->delivery_address_number }}</td>
            </tr>
            <tr>
                <td class="text-left col-md-2">住所</td>
                <td class="text-left col-md-4">{{ $request_order->delivery_address }}</td>
            </tr>
            <tr>
                <td class="text-left col-md-2">電話番号</td>
                <td class="text-left col-md-4">{{ $request_order->delivery_address_tel }}</td>
            </tr>
            
        <form>
        　　<div class="form-group row">
                <label class="col-2 col-form-label">お名前</label>
                <div class="col-10">
                    <input type="text" class="form-control">
                </div>
     　　　    </div>
     　  　  <div class="form-group row">
                <label class="col-2 col-form-label">郵便番号</label>
                <div class="col-10">
                    <input type="text" class="form-control">
                </div>
     　　　    </div>
      　　    <div class="form-group row">
                <label class="col-2 col-form-label">住所</label>
                <div class="col-10">
                    <input type="text" class="form-control">
                </div>
     　　　    </div>
    　　　　<div class="form-group row">
                <label class="col-2 col-form-label">電話番号</label>
                <div class="col-10">
                    <input type="text" class="form-control">
                </div>
     　　　    </div>
    　　
    　　
    　　{{-- お届け日 --}}
        <h4>お届け日</h4>
        
        　　<div class="form-group row">
                <div class="offset-2 col-10">
                    <button type="submit" class="btn btn-primary">内容確認</button>
                </div>
            </div>
    　　</form>
@endsection
