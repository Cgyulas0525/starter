<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $vouchers->name }}</p>
</div>

<!-- Vouchertype Id Field -->
<div class="col-sm-12">
    {!! Form::label('vouchertype_id', 'Vouchertype Id:') !!}
    <p>{{ $vouchers->vouchertype_id }}</p>
</div>

<!-- Partner Id Field -->
<div class="col-sm-12">
    {!! Form::label('partner_id', 'Partner Id:') !!}
    <p>{{ $vouchers->partner_id }}</p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', 'Content:') !!}
    <p>{{ $vouchers->content }}</p>
</div>

<!-- Validityfrom Field -->
<div class="col-sm-12">
    {!! Form::label('validityfrom', 'Validityfrom:') !!}
    <p>{{ $vouchers->validityfrom }}</p>
</div>

<!-- Validityto Field -->
<div class="col-sm-12">
    {!! Form::label('validityto', 'Validityto:') !!}
    <p>{{ $vouchers->validityto }}</p>
</div>

<!-- Qrcode Field -->
<div class="col-sm-12">
    {!! Form::label('qrcode', 'Qrcode:') !!}
    <p>{{ $vouchers->qrcode }}</p>
</div>

<!-- Discount Field -->
<div class="col-sm-12">
    {!! Form::label('discount', 'Discount:') !!}
    <p>{{ $vouchers->discount }}</p>
</div>

<!-- Discountpercent Field -->
<div class="col-sm-12">
    {!! Form::label('discountpercent', 'Discountpercent:') !!}
    <p>{{ $vouchers->discountpercent }}</p>
</div>

<!-- Usednumber Field -->
<div class="col-sm-12">
    {!! Form::label('usednumber', 'Usednumber:') !!}
    <p>{{ $vouchers->usednumber }}</p>
</div>

<!-- Active Field -->
<div class="col-sm-12">
    {!! Form::label('active', 'Active:') !!}
    <p>{{ $vouchers->active }}</p>
</div>

