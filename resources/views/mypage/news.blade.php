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
                    <a href="{{ route('mypages.destroy') }}" class="nav-link">退会</a>
                @endif
            </div>
            <div class="col-9">
                     {{-- 作成ページへのリンク --}}
                    {!! link_to_route('news.create', '新規news追加', [], ['class' => 'btn btn-primary']) !!}
                    @if (count($news) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>news</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $new)
                                <tr>
                                    {{-- 詳細ページへのリンク --}}
                                    <td>{!! link_to_route('news.show', $new->id, ['news' => $new->id]) !!}</td>
                                    <td>{{ $new->text }}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
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