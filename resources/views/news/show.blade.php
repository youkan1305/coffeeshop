@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

    <h1>id = {{ $news->id }} の編集ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $news->id }}</td>
        </tr>
        <tr>
            <th>news</th>
            <td>{{ $news->text }}</td>
        </tr>
    </table>
    
    {{-- 編集ページへのリンク --}}
    {!! link_to_route('news.edit', 'このnewsを編集', ['news' => $news->id], ['class' => 'btn btn-light']) !!}

    {{-- 削除フォーム --}}
    {!! Form::model($news, ['route' => ['news.destroy', $news->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}


@endsection