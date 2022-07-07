@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1>id = {{ $item->id }} の編集ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $item->id }}</td>
        </tr>
        <tr>
            <th>商品名</th>
            <td>{{ $item->name }}</td>
        </tr>
        <tr>
            <th>画像</th>
            <td>{{ $item->image }}</td>
        </tr>
        <tr>
            <th>金額</th>
            <td>{{ $item->money }}</td>
        </tr>
        <tr>
            <th>詳細</th>
            <td>{{ $item->text }}</td>
        </tr>
        <tr>
            <th>酸味</th>
            <td>{{ $item->sour_taste }}</td>
        </tr>
        <tr>
            <th>苦味</th>
            <td>{{ $item->bitter_taste }}</td>
        </tr>
        <tr>
            <th>風味</th>
            <td>{{ $item->flavor }}</td>
        </tr>
        
    </table>
    
    {{-- 編集ページへのリンク --}}
    {!! link_to_route('items.edit', 'この商品を編集', ['item' => $item->id], ['class' => 'btn btn-light']) !!}

    {{-- 削除フォーム --}}
    {!! Form::model($item, ['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection
