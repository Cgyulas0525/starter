<div class="form-group col-sm-6">
    {!! Form::label('value', __('Érték:')) !!}
    {!! Form::text('value', null, ['class' => 'form-control','maxlength' => 200,'required' => true]) !!}
</div>

{!! Form::hidden('questionnariedetail_id',
        isset($questionnairedetailitems) ? $questionnairedetailitems->questionnariedetail_id : $questionnairedetail->id,
        ['class' => 'form-control','id'=>'questionnariedetail_id']) !!}


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
