<!-- Settlement Id Field -->
<div class="col-sm-12">
    {!! Form::label('settlement_id', 'Settlement Id:') !!}
    <p>{{ $validpostcodes->settlement_id }}</p>
</div>

<!-- Postcode Field -->
<div class="col-sm-12">
    {!! Form::label('postcode', 'Postcode:') !!}
    <p>{{ $validpostcodes->postcode }}</p>
</div>

<!-- Active Field -->
<div class="col-sm-12">
    {!! Form::label('active', 'Active:') !!}
    <p>{{ $validpostcodes->active }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $validpostcodes->description }}</p>
</div>

