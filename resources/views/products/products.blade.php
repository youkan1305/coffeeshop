@extends('layouts.app')

@section('content')
    <h3>焙煎豆</h3>
        <dir class="item">
            
                <div class="">
                    <div>
                        @if (count($item) > 0)
                           
                           
                            @foreach ($item as $item)
                                
                                <div class="d-flex bd-highlight mb-3">
                                        <div class="p-2 bd-highlight">
                                            <img src="{{ $item->image }}"  >
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <h5 class="">{{ $item->name }}</h5>
                                            <div><text>¥</text>{{ $item->money }}</div>
                                            <div>{{ $item->text }}</div>
                                                <div class="d-flex justify-content-around">
                                                    <text>酸味---{{ $item->sour_taste }}</text>
                                                    <text>苦味---{{ $item->bitter_taste }}</text>
                                                    <text>風味---{{ $item->flavor }}</text>
                                                </div>
                                        </div>
                                        <div class="ml-auto p-2 bd-highlight">
                                        {!! Form::open(['route' => ['orders.store', $item->id ]]) !!}
                                            <div>{{Form::select('weight', ['グラム（価格）', '100g' => '100g', '200g' => '200g', '300g' => '300g', '400g' => '400g'])}}</div>
                                            <div>{{Form::select('roasting', ['焙煎度合い', 'ミディアムロースト' => 'ミディアムロースト', 'ハイロースト' => 'ハイロースト', 'シティロースト' => 'シティロースト', 'フルシティロースト' => 'フルシティロースト', 'フレンチロースト' => 'フレンチロースト', 'イタリアンロースト' => 'イタリアンロースト'])}}</div>
                                            <div>{{Form::select('grind', ['豆の挽き方', '極細挽き' => '極細挽き', '細挽き' => '細挽き', '中細挽き' => '中細挽き', '中挽き' => '中挽き', '粗挽き' => '粗挽き'])}}</div>
                                            <div>{{Form::select('quantity', ['数量', 1 => '１個', 2 => '２個', 3 => '３個', 4 => '４個', 5 => '５個'])}}</div>
                                            <div class="col-auto my-1">
                                                {!! Form::submit('カートへ', ['class' => 'btn btn-primary']) !!}</div>
                                        
                                    
                                        {!! Form::close() !!}
                                        </div>
                                </div>
                                       
                            @endforeach
                       
                       
                       
                        @endif
                
                    </div>
                    
                    
                    
                    
                </div>
            
        </dir>


@endsection
