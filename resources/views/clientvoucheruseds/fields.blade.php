<!-- Clientvoucher Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clientvoucher_id', __('Clientvoucher Id:')) !!}
    {!! Form::number('clientvoucher_id', null, ['class' => 'form-control','id'=>'clientvoucher_id']) !!}
</div>


<!-- Usedtime Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usedtime', __('Usedtime:')) !!}
    {!! Form::text('usedtime', null, ['class' => 'form-control','id'=>'usedtime']) !!}
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
