<div class="form-group col-sm-6">
    {!! Form::label('name', __('Név:')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100, 'required' => true]) !!}
    {!! Form::label('password', __('Jelszó:')) !!}
    {!! Form::password('password', ['class' => 'form-control','maxlength' => 20]) !!}
    {!! Form::label('email', __('Email:')) !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 100]) !!}
    {!! Form::label('phonenumber', __('Telefonszám:')) !!}
    {!! Form::text('phonenumber', null, ['class' => 'form-control','maxlength' => 25, 'id' => 'phonenumber', 'data-inputmask'=>"'mask': '9999-99-999-9999'"]) !!}
    {!! Form::label('description', __('Description:')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','maxlength' => 500,'rows' => 4]) !!}
</div>

{!! Form::hidden('partner_id', $partner->id, ['class' => 'form-control']) !!}
{!! Form::hidden('active', isset($parnercontacts) ? $partnercontacts->active : 1, ['class' => 'form-control']) !!}

@section('scripts')

    @include('functions.js.ajaxsetup')
    @include('functions.js.required')
    @include('functions.js.sweetalert')

    <script type="text/javascript">
        $(function () {

            ajaxSetup();

            RequiredBackgroundModify('.form-control')

            $('#phonenumber').inputmask();

        });
    </script>
@endsection
