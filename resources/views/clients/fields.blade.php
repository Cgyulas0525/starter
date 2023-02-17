<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Név:')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100,'readonly' => true]) !!}
    {!! Form::label('gender', __('Neme:')) !!}
    {!! Form::number('gender', null, ['class' => 'form-control']) !!}
    {!! Form::label('birthday', __('Születésnap:')) !!}
    {!! Form::text('birthday', null, ['class' => 'form-control','id'=>'birthday']) !!}
    {!! Form::label('email', __('Email:')) !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
    {!! Form::label('phonenumber', __('Telefonszám:')) !!}
    {!! Form::text('phonenumber', null, ['class' => 'form-control','maxlength' => 25,'maxlength' => 25]) !!}
</div>

<!-- Postcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('postcode', __('Postcode:')) !!}
    {!! Form::number('postcode', null, ['class' => 'form-control']) !!}
    {!! Form::label('settlement_id', __('Settlement Id:')) !!}
    {!! Form::number('settlement_id', null, ['class' => 'form-control']) !!}
    {!! Form::label('address', __('Address:')) !!}
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
    {!! Form::label('addresscardnumber', __('Lakcím kártya szám:')) !!}
    {!! Form::text('addresscardnumber', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
    {!! Form::label('addresscardurl', __('Addresscardurl:')) !!}
    {!! Form::text('addresscardurl', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Facebookid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facebookid', __('Facebook azonosító:')) !!}
    {!! Form::text('facebookid', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
    {!! Form::label('facebookname', __('Facebook név:')) !!}
    {!! Form::text('facebookname', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
    {!! Form::label('facebookemail', __('Facebook email:')) !!}
    {!! Form::text('facebookemail', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
</div>

<!-- Gmailid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gmailid', __('Gmail azonosító:')) !!}
    {!! Form::text('gmailid', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
    {!! Form::label('gmailname', __('Gmail név:')) !!}
    {!! Form::text('gmailname', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
    {!! Form::label('gmailemail', __('Gmail email:')) !!}
    {!! Form::text('gmailemail', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
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

@section('scripts')

    @include('functions.js.ajaxsetup')
    @include('functions.js.required')
    @include('functions.js.sweetalert')

    <script type="text/javascript">
        $(function () {

            ajaxSetup();

            RequiredBackgroundModify('.form-control')

        });
    </script>
@endsection
