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

            <div class="card-body">
                <div class="row">
                    @include('questionnaires.questionnariePartnersfields')
                </div>
            </div>

            <div class="card-footer">
                <a href="{{ route('questionnaires.index') }}" class="btn btn-default">{{ __('Kilép') }}</a>
            </div>


            {!! Form::close() !!}



        </div>
    </div>
@endsection

