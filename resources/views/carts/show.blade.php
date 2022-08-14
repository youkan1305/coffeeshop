@extends('layouts.app')

@section('content')

    @if (Auth::check())
       
            <h4>注文内容一覧</h4>
            @if(count($orders) > 0)
                
                    
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>商品名</t>
                                    <th>グラム数</th>
                                    <th>焙煎度合い</th>
                                    <th>豆の挽き方</th>
                                    <th>個数</th>
                                    <th>価格</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            
                                <tr>
                                    <th>{{ $order->item->name }}</th>
                                    <th>{{ $order->weight }}</th>
                                    <th>{{ $order->roasting }}</th>
                                    <th>{{ $order->grind }}</th>
                                    <th>{{ $order->quantity }}</th>
                                    <th>{{ $order->item->money }}</th>
                                </tr>
                            @endforeach
                
                                <tr>
                                    <th colspan="3"></th>
                                    <th colspan="3"><p>合計金額</p><br><p>¥</p></th>
                                </tr>
                            </tbody>
                        </table>    
                    
                    
                
            
            @endif
           
    
    
        {{-- 注文する内容 --}}
    

    
    
    
    {{-- 決済　とりあえず --}}
    <h4>決済方法</h4>
        <div class="p-6">
                <p>デモサイトのため決済は省きます。</p>
                <br><br><br>
        </div>
    
    {{-- お客様情報　ログインしていたら各場所に登録したものが入る --}}
    <h4>お客様情報</h4>
        <div class='text col-9'>
                        <div class='row'>
                            <p class='col-sm-3'>お名前</p>
                            <p>{{ Auth::user()->name }}</p>
                        </div>
                        <div class='row'>
                            <p class='col-sm-3'>郵便番号</p>
                            <p>{{ Auth::user()->adress_number }}</p>
                        </div>
                        <div class='row'>
                            <p class='col-sm-3'>ご住所</p>
                            <p>{{ Auth::user()->address }}</p>
                        </div>
                        <div class='row'>
                            <p class='col-sm-3'>電話番号</p>
                            <p>{{ Auth::user()->tel }}</p>
                        </div>
                        <br><br>
                        
                        
                </tr>
                    </div>

　　
　　
　　{{-- お届け先情報 --}}
    <h4>お届け先情報</h4>
        <div class='text col-9'>
                        <div class='row'>
                            <p class='col-sm-3'>お名前</p></p>
                            <p>{{ $request_order->delivery_name }}</p>
                        </div>
                        <div class='row'>
                            <p class='col-sm-3'>郵便番号</p>
                            <p>{{ $request_order->delivery_address_number }}</p>
                        </div>
                        <div class='row'>
                            <p class='col-sm-3'>ご住所</p>
                            <p>{{ $request_order->delivery_address }}</p>
                        </div>
                        <div class='row'>
                            <p class='col-sm-3'>電話番号</p>
                            <p>{{ $request_order->delivery_address_tel }}</p>
                        </div>
                        <br><br>
                        
                        
                </tr>
        </div>
        
        {{-- 注文編集ページ --}}
        <div>
            
        </div>
        
        {{-- 注文完了ページ --}}
        <div>
            <div class="nav-item">
                <a href="{{ route('complete.page') }}" class="nav-link col-3 btn btn-primary">注文完了します</a>
            </div>
        </div>
        
        
        
    @else
        <div class="row">
            <div class="col-sm-6 offset-between">
    
                {!! Form::open(['route' => 'login.post']) !!}
                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    </div>
    
                    <div class="form-group">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
    
                    {!! Form::submit('Log in', ['class' => 'col-sm-3 btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-sm-6 text-center">
                {{-- ユーザ登録ページへのリンク --}}
                <p class="mt-2"><h5>会員登録しますか？</h5></p><br><br>
                <button type="button" class="btn btn-outline-primary me-2">{!! link_to_route('signup.get', '会員登録はこちら') !!}</button>
            </div>
        </div>
    
    
    
　　@endif
　　
@endsection