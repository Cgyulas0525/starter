@section('css')
    <link rel="stylesheet" href="pubic/css/app.css">
    @include('layouts.costumcss')
@endsection

<!-- Name Field -->
<div class="form-group col-sm-6">
    <div class="row">
        <div class="col-sm-8">
            {!! Form::label('name', __('Név:')) !!}
            {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100,'readonly' => true]) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::label('gender', __('Neme:')) !!}
            {!! Form::text('gender', $clients->genderName, ['class' => 'form-control','readonly' => true]) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            {!! Form::label('birthday', __('Születésnap:')) !!}
            {!! Form::text('birthday', null, ['class' => 'form-control','id'=>'birthday','readonly' => true]) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::label('email', __('Email:')) !!}
            {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 100,'readonly' => true]) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::label('phonenumber', __('Telefonszám:')) !!}
            {!! Form::text('phonenumber', null, ['class' => 'form-control','maxlength' => 25,'readonly' => true]) !!}
        </div>
    </div>
</div>

<!-- Postcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('postcode', __('Cím:')) !!}
    {!! Form::text('settlement_id', $clients->fullAddress, ['class' => 'form-control','readonly' => true]) !!}
    {!! Form::label('addresscardnumber', __('Lakcím kártya szám:')) !!}
    {!! Form::text('addresscardnumber', null, ['class' => 'form-control','maxlength' => 20,'readonly' => true]) !!}
</div>

<div class="col-lg-12 col-md-12 col-xs-12">

    <section class="content-header">
        <h1 class="pull-left">{{ __('Voucherek') }}</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered indextable w-100"></table>
                </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
</div>

@section('scripts')

    @include('functions.js.ajaxsetup')
    @include('functions.js.required')
    @include('functions.js.sweetalert')
    @include('functions.js.readonlyModify')

    <script type="text/javascript">
        $(function () {

            ajaxSetup();

            RequiredBackgroundModify('.form-control')
            ReadonlyBackgroundModify('.form-control')

            var table = $('.indextable').DataTable({
                serverSide: true,
                scrollY: 390,
                scrollX: true,
                order: [[0, 'desc'], [1, 'asc'], [2, 'asc']],
                paging: false,
                buttons: [],
                ajax: "{{ route('cvIndex', ['id' => $clients->id]) }}",
                columns: [
                    // {title: '', data: 'action', sClass: "text-center", width: '200px', name: 'action', orderable: false, searchable: false},
                    {title: 'Küldve', data: 'posted', render: function (data, type, row) { return data ? moment(data).format('YYYY.MM.DD') : ''; }, sClass: "text-center", width:'150px', name: 'posted'},
                    {title: "{{ __('Partner')}}", data: 'partnerName', name: 'partnerName'},
                    {title: "{{ __('Voucher')}}", data: 'voucherName', name: 'voucherName'},
                    {title: 'Felhasználva', data: 'used', render: function (data, type, row) { return data ? moment(data).format('YYYY.MM.DD') : ''; }, sClass: "text-center", width:'150px', name: 'used'},
                ]
            });


        });
    </script>
@endsection
