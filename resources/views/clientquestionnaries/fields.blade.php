<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', __('Client Id:')) !!}
    {!! Form::number('client_id', null, ['class' => 'form-control','id'=>'client_id']) !!}
</div>


<!-- Questionnarie Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('questionnarie_id', __('Questionnarie Id:')) !!}
    {!! Form::number('questionnarie_id', null, ['class' => 'form-control','id'=>'questionnarie_id']) !!}
</div>


<!-- Posted Field -->
<div class="form-group col-sm-6">
    {!! Form::label('posted', __('Posted:')) !!}
    {!! Form::text('posted', null, ['class' => 'form-control','id'=>'posted']) !!}
</div>



<!-- Retrieved Field -->
<div class="form-group col-sm-6">
    {!! Form::label('retrieved', __('Retrieved:')) !!}
    {!! Form::text('retrieved', null, ['class' => 'form-control','id'=>'retrieved']) !!}
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
