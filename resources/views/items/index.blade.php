@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h2>商品一覧</h2>
     {{-- 作成ページへのリンク --}}
    {!! link_to_route('items.create', '新規商品追加', [], ['class' => 'btn btn-primary']) !!}
    @if (count($item) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>商品</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($item as $item)
                <tr>
                    {{-- 詳細ページへのリンク --}}
                    <td>{!! link_to_route('items.show', $item->id, ['item' => $item->id]) !!}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->image }}</td>
                    <td>{{ $item->money }}</td>
                    <td>{{ $item->text }}</td>
                    <td>{{ $item->sour_taste }}</td>
                    <td>{{ $item->bitter_taste }}</td>
                    <td>{{ $item->flavor }}</td>
                    
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif


@endsection
