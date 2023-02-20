<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Név:')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 200, 'required' => true, 'id' => 'name']) !!}
    {!! Form::label('partner_id', __('Partner:')) !!}
    {!! Form::select('partner_id', App\Http\Controllers\PartnersController::DDDW(), null,
                ['class'=>'select2 form-control', 'id' => 'partner_id', 'required' => true]) !!}
    <div class="row">
        <div class="form-group col-sm-6">
            {!! Form::label('validityfrom', __('Érvényes -tól:')) !!}
            {!! Form::date('validityfrom', isset($vouchers) ? $vouchers->validityfrom : \Carbon\Carbon::now(), ['class' => 'form-control','id'=>'validityfrom', 'required' => true]) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('validityto', __('Érvényes -ig:')) !!}
{{--            {!! Form::date('validityto', isset($vouchers) ? $vouchers->validityto : \Carbon\Carbon::now()->subMonths(-3), ['class' => 'form-control','id'=>'validityto', 'required' => false]) !!}--}}
            {!! Form::date('validityto', isset($vouchers) ? $vouchers->validityto : null, ['class' => 'form-control','id'=>'validityto', 'required' => false]) !!}
        </div>
    </div>
</div>

<!-- Vouchertype Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vouchertype_id', __('Típus:')) !!}
    {!! Form::select('vouchertype_id', App\Http\Controllers\VouchertypesController::DDDW(), null,
                ['class'=>'select2 form-control', 'id' => 'vouchertype_id', 'required' => true]) !!}
    {!! Form::label('qrcode', __('Qrcode:')) !!}
    {!! Form::text('qrcode', null, ['class' => 'form-control','maxlength' => 500, 'required' => false, 'id' => 'qrcode']) !!}
    <div class="row">
        <div class="form-group col-sm-6">
            {!! Form::label('discount', __('Árengedmény ( FT ):')) !!}
            {!! Form::number('discount', isset($vouchers) ? $vouchers->discount : 0, ['class' => 'form-control text-right', 'required' => false, 'id' => 'discount']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('discountpercent', __('Árengedmény ( % ):')) !!}
            {!! Form::number('discountpercent', isset($vouchers) ? $vouchers->discountpercent : 0, ['class' => 'form-control text-right', 'max' => "100", 'required' => false, 'id' => 'discountpercent']) !!}
        </div>
    </div>
</div>

<!-- Content Field -->
<div class="form-group col-sm-12">
    {!! Form::label('content', __('Leírás:')) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control','maxlength' => 500,'rows' => 4, 'id' => 'content']) !!}
</div>

{!! Form::hidden('active', isset($vouchers) ? $vouchers->active : 1, ['class' => 'form-control text-right', 'id' => 'active']) !!}
{!! Form::hidden('usednumber', isset($vouchers) ? $vouchers->usednumber : 0, ['class' => 'form-control text-right', 'id' => 'usednumber']) !!}


@section('scripts')

    @include('functions.js.ajaxsetup')
    @include('functions.js.required')
    @include('functions.js.sweetalert')

    <script type="text/javascript">
        $(function () {

            ajaxSetup();

            RequiredBackgroundModify('.form-control')

            function dateCheck() {
                let from = $('#validityfrom').val();
                let to   = $('#validityto').val();

                if (to != null || to != 0) {
                    if (to < from) {
                        swal.fire( "Hiba",  "A lejárat ig nem lehet hamarabb, mit a tól!",  "error" );
                        $('#validityto').val(null);
                        $('#validityto').focus();
                    }
                }
                console.log(from, to);

            }

            $('#validityfrom').change(function() {
                dateCheck();
            });

            $('#validityto').change(function() {
                dateCheck();
            });

        });
    </script>
@endsection
