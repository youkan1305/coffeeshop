@extends('layouts.app')

@section('content')

    @if (Auth::id() == $user->id)
       
            <h4>注文内容一覧</h4>
            @if(count($orders) > 0)
                @foreach($orders as $order)
                    <div class="item-body">
                            <div>{{ $order->item->name }}</div>

                            <div>{{ $order->weight }}</div>
                            <div>{{ $order->roasting }}</div>
                            <div>{{ $order->grind }}</div>
                            <div>{{ $order->quantity }}</div>
                    </div>
                
                    
                    
                @endforeach
            @else
            <div>
                <p>カートの中は空です。</p>
            </div>
            @endif
           
    @endif
    
        
    

    <div>
        <p>合計金額</p>
    
    </div>
    
    
    {{-- 決済　とりあえず --}}
    <h4>決済方法</h4>
    
    
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
            {!! Form::open(['route' => ['carts.update' $cart->id], 'method' => 'put']) !!}
        
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
　　
@endsection
