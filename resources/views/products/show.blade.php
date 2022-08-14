@extends('layouts.app')

@section('content')
    @if (Auth::check())
        
        @if (Auth::id() == $user->id)
            
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
                                    <th colspan="3"><p>合計金額</p><br><p>¥{{ $total }}</p></th>
                                </tr>
                            </tbody>
                        </table>    
                    
                @else
                
                
                <div>
                    <p>カートの中は空です。</p>
                </div>
                @endif
               
        @endif
        
        
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
            <div>
                {!! Form::open(['route' => 'carts.store']) !!}
            
                    <div class="form-group col-sm-6">
                        {!! Form::label('delivery_name', 'お名前') !!}
                        {!! Form::text('delivery_name', null, ['class' => 'form-control']) !!}
                        
                        {!! Form::label('delivery_address_number', '郵便番号') !!}
                        {!! Form::text('delivery_address_number', null, ['class' => 'form-control']) !!}
                        
                        {!! Form::label('delivery_address', 'お届け先住所') !!}
                        {!! Form::text('delivery_address', null, ['class' => 'form-control']) !!}
                        
                        {!! Form::label('delivery_address_tel', '電話番号') !!}
                        {!! Form::text('delivery_address_tel', null, ['class' => 'form-control']) !!}
                        
                        
                    </div>
            
                    {!! Form::submit('注文内容を確認する', ['class' => 'btn btn-primary']) !!}
            
                {!! Form::close() !!}
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