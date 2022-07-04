@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1>id = {{ $information->id }} の編集ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $information->id }}</td>
        </tr>
        <tr>
            <th>メッセージ</th>
            <td>{{ $information->text }}</td>
        </tr>
    </table>
    
    {{-- 編集ページへのリンク --}}
    {!! link_to_route('informations.edit', 'このinformationを編集', ['information' => $information->id], ['class' => 'btn btn-light']) !!}

    {{-- 削除フォーム --}}
    {!! Form::model($information, ['route' => ['informations.destroy', $information->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection
