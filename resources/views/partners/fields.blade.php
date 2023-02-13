<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', __('Id:')) !!}
    {!! Form::number('id', null, ['class' => 'form-control']) !!}
</div>


<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Name:')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>


<!-- Partnertype Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('partnertype_id', __('Partnertype Id:')) !!}
    {!! Form::number('partnertype_id', null, ['class' => 'form-control']) !!}
</div>


<!-- Taxnumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('taxnumber', __('Taxnumber:')) !!}
    {!! Form::text('taxnumber', null, ['class' => 'form-control','maxlength' => 15,'maxlength' => 15]) !!}
</div>


<!-- Bankaccount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bankaccount', __('Bankaccount:')) !!}
    {!! Form::text('bankaccount', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30]) !!}
</div>


<!-- Postcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('postcode', __('Postcode:')) !!}
    {!! Form::number('postcode', null, ['class' => 'form-control']) !!}
</div>


<!-- Settlement Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('settlement_id', __('Settlement Id:')) !!}
    {!! Form::number('settlement_id', null, ['class' => 'form-control']) !!}
</div>


<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', __('Address:')) !!}
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>


<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('Email:')) !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>


<!-- Phonenumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phonenumber', __('Phonenumber:')) !!}
    {!! Form::text('phonenumber', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>


<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('Description:')) !!}
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500]) !!}
</div>


<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', __('Active:')) !!}
    {!! Form::number('active', null, ['class' => 'form-control']) !!}
</div>


<!-- Logourl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logourl', __('Logourl:')) !!}
    {!! Form::text('logourl', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
</div>
