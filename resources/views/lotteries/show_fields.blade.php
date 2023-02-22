<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $lotteries->name }}</p>
</div>

<!-- Lotteriedate Field -->
<div class="col-sm-12">
    {!! Form::label('lotteriedate', 'Lotteriedate:') !!}
    <p>{{ $lotteries->lotteriedate }}</p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', 'Content:') !!}
    <p>{{ $lotteries->content }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $lotteries->description }}</p>
</div>

<!-- Active Field -->
<div class="col-sm-12">
    {!! Form::label('active', 'Active:') !!}
    <p>{{ $lotteries->active }}</p>
</div>

