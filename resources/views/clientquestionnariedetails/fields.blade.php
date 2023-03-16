<!-- Clientquestionnarie Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clientquestionnarie_id', __('Clientquestionnarie Id:')) !!}
    {!! Form::number('clientquestionnarie_id', null, ['class' => 'form-control','id'=>'clientquestionnarie_id']) !!}
</div>


<!-- Questionnariedetail Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('questionnariedetail_id', __('Questionnariedetail Id:')) !!}
    {!! Form::number('questionnariedetail_id', null, ['class' => 'form-control','id'=>'questionnariedetail_id']) !!}
</div>


<!-- Reply Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reply', __('Reply:')) !!}
    {!! Form::text('reply', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500]) !!}
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
