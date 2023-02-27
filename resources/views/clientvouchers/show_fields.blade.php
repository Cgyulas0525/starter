<!-- Client Id Field -->
<div class="col-sm-12">
    {!! Form::label('client_id', 'Client Id:') !!}
    <p>{{ $clientvouchers->client_id }}</p>
</div>

<!-- Voucher Id Field -->
<div class="col-sm-12">
    {!! Form::label('voucher_id', 'Voucher Id:') !!}
    <p>{{ $clientvouchers->voucher_id }}</p>
</div>

<!-- Posted Field -->
<div class="col-sm-12">
    {!! Form::label('posted', 'Posted:') !!}
    <p>{{ $clientvouchers->posted }}</p>
</div>

<!-- Used Field -->
<div class="col-sm-12">
    {!! Form::label('used', 'Used:') !!}
    <p>{{ $clientvouchers->used }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $clientvouchers->description }}</p>
</div>

