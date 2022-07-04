@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h2>infromation</h2>
     {{-- 作成ページへのリンク --}}
    {!! link_to_route('informations.create', '新規インフォメーション追加', [], ['class' => 'btn btn-primary']) !!}
    @if (count($information) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>information</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($information as $info)
                <tr>
                    {{-- 詳細ページへのリンク --}}
                    <td>{!! link_to_route('informations.show', $info->id, ['information' => $info->id]) !!}</td>
                    <td>{{ $info->text }}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    
    
   





@endsection
