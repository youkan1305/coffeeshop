@extends('layouts.app')



@section('content')
    @if (Auth::check())
        <div class="row">
            <div class="list col-3">
                @if(Auth::user()->admin_flag==1)
                    <p>{{ Auth::user()->name }}</p>
                    <a href="{{ route('mypage.index') }}" class="nav-link">会員情報</a>
                    <a href="{{ route('mypage.item') }}" class="nav-link">商品登録</a>
                    <a href="{{ route('mypage.information') }}" class="nav-link">information登録</a>
                    <a href="{{ route('mypage.news') }}" class="nav-link">news登録</a>
                    <br><br><br>
                @else
                    <p>{{ Auth::user()->name }}</p>
                    <a href="{{ route('mypage.index') }}" class="nav-link">会員情報</a>
                    <br><br><br>
                    <a href="/" class="nav-link">退会</a>
                @endif
                
            </div>
            <div class="col-9">
                <div class="row">
                        <h6 class='text col-sm-2'>会員情報</h6><br>
                                <div class='text col-9'>
                                    {!! Form::model($mypage, ['route' => ['mypages.update', Auth::user()->id], 'method' => 'put']) !!}
                                        <div class="form-group">
                                            <div class='row'>
                                                <p class='col-sm-3'>お名前</p>
                                                <p>{{ Auth::user()->name }}</p>
                                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                            </div>
                                            <div class='row'>
                                                <p class='col-sm-3'>e-mail</p>
                                                <p>{{ Auth::user()->email }}</p>
                                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                            </div>
                                            <div class='row'>
                                                <p class='col-sm-3'>郵便番号</p>
                                                <p>{{ Auth::user()->adress_number }}</p>
                                                {!! Form::text('adress_number', null, ['class' => 'form-control']) !!}
                                            </div>
                                            <div class='row'>
                                                <p class='col-sm-3'>ご住所</p>
                                                <p>{{ Auth::user()->address }}</p>
                                                {!! Form::text('address', null, ['class' => 'form-control']) !!}
                                            </div>
                                            <div class='row'>
                                                <p class='col-sm-3'>電話番号</p>
                                                <p>{{ Auth::user()->tel }}</p>
                                                {!! Form::text('tel', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        
                                        {!! Form::submit('更新', ['class' => 'btn btn-outline-primary me-2']) !!}
                                        
                                    {!! Form::close() !!}
                                </div>
                            
                         
                        
                        
                </div>
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
                <p class="mt-2"><h5>会員登録しますか？</h5></p><br><br>
                <button type="button" class="btn btn-outline-primary me-2">{!! link_to_route('signup.get', '会員登録はこちら') !!}</button>
            
            
            </div>
        </div>
    
    
    @endif


@endsection
