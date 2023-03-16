<!-- Clientquestionnarie Id Field -->
<div class="col-sm-12">
    {!! Form::label('clientquestionnarie_id', 'Clientquestionnarie Id:') !!}
    <p>{{ $clientquestionnariedetails->clientquestionnarie_id }}</p>
</div>

<!-- Questionnariedetail Id Field -->
<div class="col-sm-12">
    {!! Form::label('questionnariedetail_id', 'Questionnariedetail Id:') !!}
    <p>{{ $clientquestionnariedetails->questionnariedetail_id }}</p>
</div>

<!-- Reply Field -->
<div class="col-sm-12">
    {!! Form::label('reply', 'Reply:') !!}
    <p>{{ $clientquestionnariedetails->reply }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $clientquestionnariedetails->description }}</p>
</div>

