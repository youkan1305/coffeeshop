@extends('layouts.app')

@section('content')

        <div class="center jumbotron">
            <div class="text-center">
                <h1>SAZANAMI coffee shop</h1>
            </div>
        </div>
        <div class="row ">
            <div class="card col-sm-6">
                <div class="card-header">
                    Information
                </div>
                <div class="card-body">
                @foreach ($informations as $info)    
                    <div>{{ $info->text }}</div>
                @endforeach
                </div>
            </div>
            
            <div class="card col-sm-6 ">
                <div class="card-header">
                    News
                </div>
                <div class="card-body">
                @foreach ($news as $new)    
                    <div>{{ $new->text }}</div>
                @endforeach
                </div>
            </div>
        </div>
        
        <div class="col-10 p-4">
            
            <p>お客様に鮮度の良いものをお届けするため、<br>
               ご注文を頂いてから焙煎するコーヒー専門店です。</p>
            <p class="text-right">品種や農園、美味しさにこだわった、<br>
                美味しいコーヒー豆を取り揃えております。</p>
            <img src="image_coffee/coffee_top1.jpg" class="rounded float-start p-4" width="256" height="384">
            
        </div>
        
        <div>
            
        </div>
        
        <div>
            
        </div>
       
       
@endsection
