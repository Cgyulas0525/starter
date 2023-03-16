<div class="form-group col-sm-6">
    <div class="row">
        <div class="col-sm-8">
            {!! Form::label('name', __('Név:')) !!}
            {!! Form::text('name', $clients->name, ['class' => 'form-control','maxlength' => 100,'readonly' => true]) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::label('gender', __('Neme:')) !!}
            {!! Form::text('gender', $clients->genderName, ['class' => 'form-control','readonly' => true]) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            {!! Form::label('birthday', __('Születésnap:')) !!}
            {!! Form::date('birthday', $clients->birthday, ['class' => 'form-control','id'=>'birthday','readonly' => true]) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::label('email', __('Email:')) !!}
            {!! Form::email('email', $clients->email, ['class' => 'form-control','maxlength' => 100,'readonly' => true]) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::label('phonenumber', __('Telefonszám:')) !!}
            {!! Form::text('phonenumber', $clients->phonenumber, ['class' => 'form-control','maxlength' => 25,'readonly' => true]) !!}
        </div>
    </div>
</div>

<!-- Postcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('postcode', __('Cím:')) !!}
    {!! Form::text('settlement_id', $clients->fullAddress, ['class' => 'form-control','readonly' => true]) !!}
    {!! Form::label('addresscardnumber', __('Lakcím kártya szám:')) !!}
    {!! Form::text('addresscardnumber', $clients->addresscardnumber, ['class' => 'form-control','maxlength' => 20,'readonly' => true]) !!}
</div>
