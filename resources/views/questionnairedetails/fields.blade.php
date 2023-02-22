{!! Form::hidden('questionnaire_id', isset($questionnairedetails) ? $questionnairedetails->questionnaire_id : $questionnaire->id, ['class' => 'form-control','id'=>'questionnaire_id', 'readonly' => true]) !!}


<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Név:')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 200,'required' => true]) !!}
    {!! Form::label('detailtype_id', __('Típus:')) !!}
    {!! Form::select('detailtype_id', App\Http\Controllers\DetailTypesController::DDDW(), isset($questionnairedetails) ? $questionnairedetails->detailtype_id : null,
            ['class'=>'select2 form-control', 'id' => 'detailtype_id','required' => true]) !!}
    <div class="row">
        <div class="form-group col-sm-6">
            {!! Form::label('required', __('Kötelező:')) !!}
            {!! Form::select('required', ToolsClass::tfSelect(), 1,
                    ['class'=>'select2 form-control', 'id' => 'required','required' => true]) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('readonly', __('Csak olvasható:')) !!}
            {!! Form::select('readonly', ToolsClass::tfSelect(), 0,
                    ['class'=>'select2 form-control', 'id' => 'readonly','required' => true]) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6">
            {!! Form::label('long', __('Hossz:')) !!}
            {!! Form::number('long', null, ['class' => 'form-control','id'=>'long']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('rowcount', __('Sorok száma:')) !!}
            {!! Form::number('rowcount', null, ['class' => 'form-control','id'=>'rowcount']) !!}
        </div>
    </div>
    {!! Form::label('description', __('Megjegyzés:')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','maxlength' => 500,'rows' => 4]) !!}
</div>
@if (isset($questionnairedetails))
    @if ($questionnairedetails->detailtype->listing == 1)
        <h1>Tételek</h1>
    @endif
@endif

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
