<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $questionnaires->name }}</p>
</div>

<!-- Validityfrom Field -->
<div class="col-sm-12">
    {!! Form::label('validityfrom', 'Validityfrom:') !!}
    <p>{{ $questionnaires->validityfrom }}</p>
</div>

<!-- Validitato Field -->
<div class="col-sm-12">
    {!! Form::label('validitato', 'Validitato:') !!}
    <p>{{ $questionnaires->validitato }}</p>
</div>

<!-- Active Field -->
<div class="col-sm-12">
    {!! Form::label('active', 'Active:') !!}
    <p>{{ $questionnaires->active }}</p>
</div>

<!-- Basicpackage Field -->
<div class="col-sm-12">
    {!! Form::label('basicpackage', 'Basicpackage:') !!}
    <p>{{ $questionnaires->basicpackage }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $questionnaires->description }}</p>
</div>

