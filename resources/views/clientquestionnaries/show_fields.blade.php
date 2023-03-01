<!-- Client Id Field -->
<div class="col-sm-12">
    {!! Form::label('client_id', 'Client Id:') !!}
    <p>{{ $clientquestionnaries->client_id }}</p>
</div>

<!-- Questionnarie Id Field -->
<div class="col-sm-12">
    {!! Form::label('questionnarie_id', 'Questionnarie Id:') !!}
    <p>{{ $clientquestionnaries->questionnarie_id }}</p>
</div>

<!-- Posted Field -->
<div class="col-sm-12">
    {!! Form::label('posted', 'Posted:') !!}
    <p>{{ $clientquestionnaries->posted }}</p>
</div>

<!-- Retrieved Field -->
<div class="col-sm-12">
    {!! Form::label('retrieved', 'Retrieved:') !!}
    <p>{{ $clientquestionnaries->retrieved }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $clientquestionnaries->description }}</p>
</div>

