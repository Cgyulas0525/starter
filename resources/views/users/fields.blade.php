@section('css')
    @include('layouts.costumcss')
@endsection

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Név:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 191]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 191]) !!}
</div>

@if (!isset($users))
    <!-- Email Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('password', 'Jelszó:') !!}
        {!! Form::text('password', null, ['class' => 'form-control']) !!}
    </div>
@endif


<!-- Usertypes Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usertypes_id', 'Típus:') !!}
    {!! Form::select('usertypes_id', \App\Http\Controllers\UsertypesController::DDDW(), null,
                ['class'=>'select2 form-control', 'id' => 'usertypes_id', 'required' => true]) !!}
</div>

<!-- Commit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('commit', 'Megjegyzés:') !!}
    {!! Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500, 'rows' => 4]) !!}
</div>

<div class="form-group col-sm-6">
    <div class="row">
        <div class="mylabel col-sm-2">
            {!! Form::label('image_url', 'Kép:') !!}
        </div>
        <div class="mylabel col-sm-4">
            <label class="image__file-upload">Válasszon
                {!! Form::file('image_url',['class'=>'d-none']) !!}
            </label>
        </div>
    </div>
</div>

@if (isset($users))
    <div class="form-group col-sm-6">
        {!! Form::hidden('password', 'Jelszó:') !!}
        {!! Form::hidden('password', $users->password, ['class' => 'form-control']) !!}
    </div>
@endif
