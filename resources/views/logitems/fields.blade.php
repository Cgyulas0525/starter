<!-- Logitemtype Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logitemtype_id', __('Logitemtype Id:')) !!}
    {!! Form::number('logitemtype_id', null, ['class' => 'form-control']) !!}
</div>


<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', __('Client Id:')) !!}
    {!! Form::number('client_id', null, ['class' => 'form-control']) !!}
</div>


<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('User Id:')) !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>


<!-- Partnercontact Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('partnercontact_id', __('Partnercontact Id:')) !!}
    {!! Form::number('partnercontact_id', null, ['class' => 'form-control']) !!}
</div>


<!-- Datatable Field -->
<div class="form-group col-sm-6">
    {!! Form::label('datatable', __('Datatable:')) !!}
    {!! Form::text('datatable', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>


<!-- Eventdatetime Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eventdatetime', __('Eventdatetime:')) !!}
    {!! Form::text('eventdatetime', null, ['class' => 'form-control','id'=>'eventdatetime']) !!}
</div>



<!-- Remoteaddress Field -->
<div class="form-group col-sm-6">
    {!! Form::label('remoteaddress', __('Remoteaddress:')) !!}
    {!! Form::text('remoteaddress', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>


@section('scripts')
    <script src="{{ asset('/public/js/ajaxsetup.js') }} " type="text/javascript"></script>
    <script src="{{ asset('/public/js/required.js') }} " type="text/javascript"></script>
    <script src="{{ asset('/public/js/sweetalert.js') }} " type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {

            ajaxSetup();

            RequiredBackgroundModify('.form-control')

        });
    </script>
@endsection
