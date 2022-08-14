<div>
    {!! Form::open(['route' => 'carts.store']) !!}

        <div class="form-group">
            {!! Form::label('delivery_name', 'お届け先') !!}
            {!! Form::text('delivery_name', null, ['class' => 'form-control']) !!}
            
            {!! Form::label('delivery_address_number', '郵便番号') !!}
            {!! Form::text('delivery_address_number', null, ['class' => 'form-control']) !!}
            
            {!! Form::label('delivery_address', 'お届け先住所') !!}
            {!! Form::text('delivery_address', null, ['class' => 'form-control']) !!}
            
            {!! Form::label('delivery_address_tel', '電話番号') !!}
            {!! Form::text('delivery_address_tel', null, ['class' => 'form-control']) !!}
            
            
        </div>

        {!! Form::submit('追加', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
</div>