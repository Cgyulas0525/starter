@section('css')
    @include('layouts.costumcss')
@endsection

<!-- Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('name', __('Név:')) !!}
    {!! Form::text('name', $partners->name, ['class' => 'form-control','maxlength' => 100, 'readonly' => true]) !!}
</div>


<!-- Partnertype Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('partnertype_id', __('Típus:')) !!}
    {!! Form::text('partnertype_id', $partners->partnertype->name, ['class'=>'select2 form-control', 'readonly' => true]) !!}
</div>


<!-- Taxnumber Field -->
<div class="form-group col-sm-4">
    {!! Form::label('taxnumber', __('Adószám:')) !!}
    {!! Form::text('taxnumber', $partners->taxnumber, ['class' => 'form-control', 'readonly' => true]) !!}
</div>


<!-- Bankaccount Field -->
<div class="form-group col-sm-3">
    {!! Form::label('bankaccount', __('Bank számla:')) !!}
    {!! Form::text('bankaccount', $partners->bankaccount, ['class' => 'form-control', 'readonly' => true]) !!}
</div>


<!-- Postcode Field -->
<div class="form-group col-sm-2">
    {!! Form::label('postcode', __('Irányító szám:')) !!}
    {!! Form::text('postcode', $partners->postcode, ['class' => 'form-control', 'readonly' => true]) !!}
</div>

<!-- Settlement Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('settlement_id', __('Település:')) !!}
    {!! Form::text('settlement_id', $partners->settlementName, ['class' => 'form-control', 'readonly' => true])  !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-4">
    {!! Form::label('address', __('Cím:')) !!}
    {!! Form::text('address', $partners->address, ['class' => 'form-control','readonly' => true]) !!}
</div>


<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('Email:')) !!}
    {!! Form::text('email', $partners->email, ['class' => 'form-control','readonly' => true]) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('phonenumber', __('Telefonszám:')) !!}
    {!! Form::text('phonenumber', $partners->phonenumber, ['class' => 'form-control','readonly' => true]) !!}
</div>
<!-- Description Field -->

@section('scripts')
    @include('functions.js.ajaxsetup')
    @include('functions.js.required')
    @include('functions.js.sweetalert')

    <script type="text/javascript">
        $(function () {

            ajaxSetup();

            RequiredBackgroundModify('.form-control');

            var table = $('.indextable').DataTable({
                serverSide: true,
                scrollY: 390,
                scrollX: true,
                order: [[1, 'asc']],
                paging: false,
                buttons: [],
                ajax: "{{ route('partnerContactsIndex', ['partner' => $partners->id, 'active' => 1]) }}",
                columns: [
                    {title: '<a class="btn btn-primary" title="Felvitel" href="{!! route('partnerContactCreate', ['id' => $partners->id]) !!}"><i class="fa fa-plus-square"></i></a>',
                        data: 'action', sClass: "text-center", width: '200px', name: 'action', orderable: false, searchable: false},
                    {title: "{{ __('Név')}}", data: 'name', name: 'name'},
                    {title: "{{ __('Email')}}", data: 'email', name: 'email'},
                    {title: "{{ __('Telefonszám')}}", data: 'phonenumber', name: 'phonenumber'},
                ],
                fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                    if (aData.active == 0) {
                        $('td', nRow).css('background-color', 'lightgray');
                    }
                }

            });

            $('#active').change(function () {
                let url = '{{ route('partnerContactsIndex', [":partner", ":active"]) }}';
                url = url.replace(':partner', {{ $partners->id }});
                url = url.replace(':active', $('#active').val());
                table.ajax.url(url).load();
            })

        });
    </script>

@endsection

