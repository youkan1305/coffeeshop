@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h3>商品　新規作成ページ</h3>

    <div class="row">
        <div class="col-6">
            {!! Form::model($item, ['route' => 'items.store']) !!}

                <div class="form-group">
                    {!! Form::label('name', '商品名') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    
                    {!! Form::label('image', '商品画像') !!}
                    {!! Form::text('image', null, ['class' => 'form-control']) !!}
                    
                    {!! Form::label('money', '金額') !!}
                    {!! Form::text('money', null, ['class' => 'form-control']) !!}
                    
                    {!! Form::label('text', '商品詳細') !!}
                    {!! Form::text('text', null, ['class' => 'form-control']) !!}
                    
                    {!! Form::label('sour_taste', '酸味') !!}
                    {!! Form::text('sour_taste', null, ['class' => 'form-control']) !!}
                    
                    {!! Form::label('bitter_taste', '苦味') !!}
                    {!! Form::text('bitter_taste', null, ['class' => 'form-control']) !!}
                    
                    {!! Form::label('flavor', '風味') !!}
                    {!! Form::text('flavor', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('追加', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection
