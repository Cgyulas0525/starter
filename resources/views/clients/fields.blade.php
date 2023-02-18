<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Név:')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100,'readonly' => true]) !!}
    {!! Form::label('gender', __('Neme:')) !!}
    {!! Form::text('gender', $clients->genderName, ['class' => 'form-control','readonly' => true]) !!}
    {!! Form::label('birthday', __('Születésnap:')) !!}
    {!! Form::text('birthday', null, ['class' => 'form-control','id'=>'birthday','readonly' => true]) !!}
    {!! Form::label('email', __('Email:')) !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 100,'readonly' => true]) !!}
    {!! Form::label('phonenumber', __('Telefonszám:')) !!}
    {!! Form::text('phonenumber', null, ['class' => 'form-control','maxlength' => 25,'readonly' => true]) !!}
</div>

<!-- Postcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('postcode', __('Irányító szám:')) !!}
    {!! Form::number('postcode', null, ['class' => 'form-control','readonly' => true]) !!}
    {!! Form::label('settlement_id', __('Settlement Id:')) !!}
    {!! Form::text('settlement_id', $clients->settlement->name, ['class' => 'form-control','readonly' => true]) !!}
    {!! Form::label('address', __('Address:')) !!}
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 200,'readonly' => true]) !!}
    {!! Form::label('addresscardnumber', __('Lakcím kártya szám:')) !!}
    {!! Form::text('addresscardnumber', null, ['class' => 'form-control','maxlength' => 20,'readonly' => true]) !!}
    {!! Form::hidden('addresscardurl', __('Addresscardurl:')) !!}
    {!! Form::hidden('addresscardurl', null, ['class' => 'form-control','maxlength' => 100,'readonly' => true]) !!}
</div>

<!-- Facebookid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facebookid', __('Facebook azonosító:')) !!}
    {!! Form::text('facebookid', null, ['class' => 'form-control','maxlength' => 50,'readonly' => true]) !!}
    {!! Form::label('facebookname', __('Facebook név:')) !!}
    {!! Form::text('facebookname', null, ['class' => 'form-control','maxlength' => 200,'readonly' => true]) !!}
    {!! Form::label('facebookemail', __('Facebook email:')) !!}
    {!! Form::text('facebookemail', null, ['class' => 'form-control','maxlength' => 200,'readonly' => true]) !!}
</div>

<!-- Gmailid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gmailid', __('Gmail azonosító:')) !!}
    {!! Form::text('gmailid', null, ['class' => 'form-control','maxlength' => 50,'readonly' => true]) !!}
    {!! Form::label('gmailname', __('Gmail név:')) !!}
    {!! Form::text('gmailname', null, ['class' => 'form-control','maxlength' => 200,'readonly' => true]) !!}
    {!! Form::label('gmailemail', __('Gmail email:')) !!}
    {!! Form::text('gmailemail', null, ['class' => 'form-control','maxlength' => 200,'readonly' => true]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', __('Megjegyzés:')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','maxlength' => 500,'rows' => 4]) !!}
</div>

{!! Form::hidden('password', null, ['class' => 'form-control','maxlength' => 191]) !!}
{!! Form::hidden('validated', null, ['class' => 'form-control']) !!}
{!! Form::hidden('active', null, ['class' => 'form-control']) !!}
{!! Form::hidden('local', null, ['class' => 'form-control']) !!}
{!! Form::hidden('settlement_id', null, ['class' => 'form-control','readonly' => true]) !!}
{!! Form::hidden('gender', null, ['class' => 'form-control','readonly' => true]) !!}

@section('scripts')

    @include('functions.js.ajaxsetup')
    @include('functions.js.required')
    @include('functions.js.sweetalert')
    @include('functions.js.readonlyModify')

    <script type="text/javascript">
        $(function () {

            ajaxSetup();

            RequiredBackgroundModify('.form-control')
            ReadonlyBackgroundModify('.form-control')

        });
    </script>
@endsection
