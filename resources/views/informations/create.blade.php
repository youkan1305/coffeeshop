@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h3>information新規作成ページ</h3>

    <div class="row">
        <div class="col-6">
            {!! Form::model($information, ['route' => 'informations.store']) !!}

                <div class="form-group">
                    {!! Form::label('text', '詳細') !!}
                    {!! Form::text('text', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('追加', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection
