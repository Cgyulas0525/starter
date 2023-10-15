@section('css')
    @include('layouts.costumcss')
@endsection

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Név:')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 191]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('Email:')) !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 191]) !!}
</div>

@if (!isset($users))
    <!-- Email Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('password', __('Jelszó:')) !!}
        {!! Form::text('password', null, ['class' => 'form-control']) !!}
    </div>
@endif


<!-- Usertypes Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usertype', __('Státusz:')) !!}
    {!! Form::select('usertype', RolesEnum::Options(), isset($users) ? $users->usertype->name : RolesEnum::USER->name,
                ['class'=>'select2 form-control', 'id' => 'usertype', 'required' => true]) !!}
</div>

<!-- Commit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('commit', __('Megjegyzés:')) !!}
    {!! Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500, 'rows' => 4]) !!}
</div>

<div class="form-group col-sm-6">
    <div class="row">
        <div class="mylabel col-sm-2">
            {!! Form::label('image_url', __('Kép:')) !!}
        </div>
        <div class="mylabel col-sm-4">
            <label class="image__file-upload">{{ __('Válasszon') }}
                {!! Form::file('image_url',['class'=>'d-none']) !!}
            </label>
        </div>
    </div>
</div>

@if (isset($users))
    <div class="form-group col-sm-6">
        {!! Form::hidden('password', __('Jelszó:')) !!}
        {!! Form::hidden('password', $users->password, ['class' => 'form-control']) !!}
    </div>
@endif
