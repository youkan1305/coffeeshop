@extends('layouts.app')

@section('content')
    <div class="text-left">
        <h1>Log in</h1>
    </div>

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
@endsection