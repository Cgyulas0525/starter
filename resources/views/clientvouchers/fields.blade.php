<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', __('Ügyfél:')) !!}
    {!! Form::text('client_id', $clientvouchers->client->name, ['class' => 'form-control','id'=>'client_id', "readonly" => true]) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('voucher_id', __('Partner:')) !!}
    {!! Form::text('voucher_id', $clientvouchers->voucher->partner->name, ['class' => 'form-control','id'=>'voucher_id', "readonly" => true]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('voucher_id', __('Voucher:')) !!}
    {!! Form::text('voucher_id', $clientvouchers->voucher->name, ['class' => 'form-control','id'=>'voucher_id', "readonly" => true]) !!}
</div>
<div class="form-group col-sm-3">
    {!! Form::label('posted', __('Elküldve:')) !!}
    {!! Form::date('posted', $clientvouchers->posted, ['class' => 'form-control','id'=>'posted', "readonly" => true]) !!}
</div>
<div class="form-group col-sm-3">
    {!! Form::label('used', __('Felhasznált:')) !!}
    {!! Form::number('used', $clientvouchers->used, ['class' => 'form-control text-right','id'=>'used', "readonly" => true]) !!}
</div>


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
