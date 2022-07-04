@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h2>news</h2>
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
    


@endsection
