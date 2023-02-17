@section('css')
    @include('layouts.costumcss')
@endsection

<!-- Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('name', __('Név:')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100, 'required' => true,
                                        'readonly' => isset($partners) ? ($partners->active == 1 ? false : true)  : false]) !!}
</div>


<!-- Partnertype Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('partnertype_id', __('Típus:')) !!}
    {!! Form::select('partnertype_id', App\Http\Controllers\PartnerTypesController::DDDW(), null,
                ['class'=>'select2 form-control', 'id' => 'partnertype_id', 'required' => true, 'readonly' => isset($partners) ? ($partners->active == 1 ? false : true)  : false]) !!}
</div>


<!-- Taxnumber Field -->
<div class="form-group col-sm-4">
    {!! Form::label('taxnumber', __('Adószám:')) !!}
    {!! Form::text('taxnumber', null, ['class' => 'form-control','maxlength' => 15, 'data-inputmask'=>"'mask': '99999999-9-99'", 'readonly' => isset($partners) ? ($partners->active == 1 ? false : true)  : false]) !!}
</div>


<!-- Bankaccount Field -->
<div class="form-group col-sm-3">
    {!! Form::label('bankaccount', __('Bank számla:')) !!}
    {!! Form::text('bankaccount', null, ['class' => 'form-control','maxlength' => 26, 'data-inputmask'=>"'mask': '99999999-99999999-99999999'", 'readonly' => isset($partners) ? ($partners->active == 1 ? false : true)  : false]) !!}
</div>


<!-- Postcode Field -->
<div class="form-group col-sm-2">
    {!! Form::label('postcode', __('Irányító szám:')) !!}
    @if (isset($partners) && $partners->active == 0)
        {!! Form::text('postcode', $partners->postcode, ['class' => 'form-control', 'readonly' => true]) !!}
    @else
        {!! Form::select('postcode', App\Classes\SettlementsClass::settlementsPostcodeDDDW(), null,
                    ['class'=>'select2 form-control', 'id' => 'postcode', 'readonly' => isset($partners) ? ($partners->active == 1 ? false : true)  : false]) !!}
    @endif
</div>

<!-- Settlement Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('settlement_id', __('Település:')) !!}
    @if (isset($partners) && $partners->active == 0)
        {!! Form::text('settlement_id', $partners->settlementName, ['class' => 'form-control', 'readonly' => true])  !!}
    @else
        {!! Form::select('settlement_id', App\Classes\SettlementsClass::settlementsDDDW(), null,
            ['class'=>'select2 form-control', 'id' => 'settlement_id', 'readonly' => isset($partners) ? ($partners->active == 1 ? false : true)  : false]) !!}
    @endif
</div>


<!-- Address Field -->
<div class="form-group col-sm-4">
    {!! Form::label('address', __('Cím:')) !!}
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 100]) !!}
</div>


<!-- Email Field -->
<div class="form-group col-sm-6">
    <div class="form-group col-sm-12">
        {!! Form::label('email', __('Email:')) !!}
        {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 50]) !!}
        {!! Form::label('phonenumber', __('Telefonszám:')) !!}
        {!! Form::text('phonenumber', null, ['class' => 'form-control', 'id' => 'phonenumber','maxlength' => 20, 'data-inputmask'=>"'mask': '9999-99-999-9999'", 'readonly' => isset($partners) ? ($partners->active == 1 ? false : true)  : false]) !!}

        <div class="form-group col-sm-6">
            <div class="row">
                <div class="mylabel col-sm-2">
                    {!! Form::label('logourl', __('Logó:')) !!}
                </div>
                <div class="mylabel col-sm-4">
                    <label class="image__file-upload">{{ __('Válasszon') }}
                        {!! Form::file('logo_url',['class'=>'d-none']) !!}
                    </label>
                </div>
            </div>
        </div>

{{--        {!! Form::label('logourl', __('Logo:')) !!}--}}
{{--        {!! Form::text('logourl', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}--}}
    </div>
</div>
<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('Megjegyzés:')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','maxlength' => 500,'rows' => 7]) !!}
    {!! Form::hidden('active', __('Active:')) !!}
    {!! Form::hidden('active', isset($partner) ? $partners->active : 1, ['class' => 'form-control']) !!}
    {!! Form::hidden('logourl', isset($partner) ? $partners->logourl : '', ['class' => 'form-control']) !!}
</div>

@section('scripts')
    @include('functions.js.ajaxsetup')
    @include('functions.js.required')
    @include('functions.js.sweetalert')

    <script type="text/javascript">
        $(function () {

            ajaxSetup();

            $('#taxnumber').inputmask();
            $('#bankaccount').inputmask();
            $('#phonenumber').inputmask();

            RequiredBackgroundModify('.form-control')

            $('#postcode').change(function() {
                let postcode = $('#postcode').val() != 0 ? $('#postcode').val() : -99999;
                let settlement_id = $('#settlement_id').val() != 0 ? $('#settlement_id').val() : -99999;
                if( postcode != -99999 ){
                    $.ajax({
                        type:"GET",
                        url:"{{url('postcodeSettlementDDDW')}}?postcode="+postcode,
                        success:function(res){
                            if(res){
                                console.log(res)
                                $("#settlement_id").empty();
                                // $("#settlement_id").append('<option></option>');
                                $.each(res,function(key,value){
                                    $("#settlement_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                                });

                                if ( settlement_id != -99999 ) {
                                    $('#settlement_id').val(settlement_id);
                                }

                            }else{
                                $("#settlement_id").empty();
                            }
                        }
                    });
                }else{
                    $("#settlement_id").empty();
                }
            });

            $('#btnLive').click(function (e) {
                swal.fire({
                    title: "Partner kikapcsolás!",
                    text: "Biztosan kikapcsolja a tételt?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Kikapcsolás",
                    cancelButtonText: "Kilép",
                }).then((result) => {
                    if (result.isConfirmed) {
                        var rows = table.rows({ selected: true } ).data();
                        for ( i = 0; i < rows.length; i++) {
                            $.ajax({
                                type:"GET",
                                url:"{{url('api/copyCustomerOrderDetailToShoppingCart')}}",
                                data: { Id: rows[i].Id, Product: rows[i].Product},
                                success: function (response) {
                                    console.log('Error:', response);
                                },
                                error: function (response) {
                                    console.log('Error:', response);
                                    alert('nem ok');
                                }
                            });
                        }
                    }
                });
            });
        });
    </script>

@endsection

