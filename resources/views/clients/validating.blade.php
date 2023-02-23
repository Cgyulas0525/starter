@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="pubic/css/app.css">
    @include('layouts.costumcss')
@endsection

@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary" >
            <div class="box-body">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <section class="content-header">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <div class="col-sm-2">
                                    <h4>{{ __('Ügyfél validálás') }}</h4>
                                </div>
                            </div>
                        </div>
                    </section>
                    @include('flash::message')
                    <div class="clearfix"></div>
                    <div class="box box-primary">
                        <div class="box-body"  >
                            <table class="table table-hover table-bordered indextable w-100"></table>
                        </div>
                    </div>
                    <div class="text-center"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    @include('functions.js.ajaxsetup')

    <script type="text/javascript">
        $(function () {

            $.ajaxSetup();

            var table = $('.indextable').DataTable({
                serverSide: true,
                scrollY: 390,
                scrollX: true,
                order: [[1, 'asc']],
                paging: false,
                buttons: [],
                ajax: "{{ route('validating', ['active' => 1, 'validated' => 0]) }}",
                columns: [
                    {{--{title: '<a class="btn btn-primary" title="Felvitel" href="{!! route('clients.create') !!}"><i class="fa fa-plus-square"></i></a>',--}}
                    {{--    data: 'action', sClass: "text-center", width: '200px', name: 'action', orderable: false, searchable: false},--}}
                    {title: '', data: 'action', sClass: "text-center", width: '200px', name: 'action', orderable: false, searchable: false},
                    {title: "{{ __('Név')}}", data: 'name', name: 'name'},
                    {title: 'Cím', data: 'fulladdress', name: 'fulladdress'},
                    {title: 'Email', data: 'email', name: 'email'},
                    {title: 'Telefon', data: 'phonenumber', name: 'phonenumber'},
                ],
                fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                    if (aData.active == 0) {
                        $('td', nRow).css('background-color', 'lightgray');
                    }
                    if (aData.validated == 0) {
                        $('td', nRow).css('background-color', 'yellow');
                    }
                }

            });

        });
    </script>
@endsection


