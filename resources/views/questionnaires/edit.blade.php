@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{ $questionnaires->name }} {{ !empty($questionnaires->qrcode) ? QrCode::size(50)->generate($questionnaires->qrcode) : ''}}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($questionnaires, ['route' => ['questionnaires.update', $questionnaires->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('questionnaires.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit(__('Ment'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('questionnaires.index') }}" class="btn btn-default">{{ __('Kilép') }}</a>
            </div>


           {!! Form::close() !!}



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
                ajax: "{{ route('questionnairedetails.index') }}",
                columns: [
                    {title: '<a class="btn btn-primary" title="Felvitel" href="{!! route('questionnairedetails.create') !!}"><i class="fa fa-plus-square"></i></a>',
                        data: 'action', sClass: "text-center", width: '200px', name: 'action', orderable: false, searchable: false},
                    {title: "{{ __('Név')}}", data: 'name', name: 'name'},
                ]
            });

        });
    </script>
@endsection
