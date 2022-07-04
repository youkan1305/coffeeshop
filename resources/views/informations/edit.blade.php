@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1>id: {{ $information->id }} のinfotmationの編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($information, ['route' => ['informations.update', $information->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('text', 'information') !!}
                    {!! Form::text('text', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>


@endsection
