<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', __('Client Id:')) !!}
    {!! Form::number('client_id', null, ['class' => 'form-control','id'=>'client_id']) !!}
</div>


<!-- Voucher Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('voucher_id', __('Voucher Id:')) !!}
    {!! Form::number('voucher_id', null, ['class' => 'form-control','id'=>'voucher_id']) !!}
</div>


<!-- Posted Field -->
<div class="form-group col-sm-6">
    {!! Form::label('posted', __('Posted:')) !!}
    {!! Form::text('posted', null, ['class' => 'form-control','id'=>'posted']) !!}
</div>



<!-- Used Field -->
<div class="form-group col-sm-6">
    {!! Form::label('used', __('Used:')) !!}
    {!! Form::text('used', null, ['class' => 'form-control','id'=>'used']) !!}
</div>



<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('Description:')) !!}
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500]) !!}
</div>


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
