<!-- Questionnaire Id Field -->
<div class="col-sm-12">
    {!! Form::label('questionnaire_id', 'Questionnaire Id:') !!}
    <p>{{ $questionnairedetails->questionnaire_id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $questionnairedetails->name }}</p>
</div>

<!-- Detailtype Id Field -->
<div class="col-sm-12">
    {!! Form::label('detailtype_id', 'Detailtype Id:') !!}
    <p>{{ $questionnairedetails->detailtype_id }}</p>
</div>

<!-- Required Field -->
<div class="col-sm-12">
    {!! Form::label('required', 'Required:') !!}
    <p>{{ $questionnairedetails->required }}</p>
</div>

<!-- Readonly Field -->
<div class="col-sm-12">
    {!! Form::label('readonly', 'Readonly:') !!}
    <p>{{ $questionnairedetails->readonly }}</p>
</div>

<!-- Long Field -->
<div class="col-sm-12">
    {!! Form::label('long', 'Long:') !!}
    <p>{{ $questionnairedetails->long }}</p>
</div>

<!-- Rowcount Field -->
<div class="col-sm-12">
    {!! Form::label('rowcount', 'Rowcount:') !!}
    <p>{{ $questionnairedetails->rowcount }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $questionnairedetails->description }}</p>
</div>

