@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{ $clients->name }} Aktív: {{ $clients->activeName }}  Helyi lakos: {{ $clients->localName }} Validált: {{ $clients->validatedName }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($clients, ['route' => ['clients.update', $clients->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('clients.clientTableContactDetail', [ 'scriptFile' => 'clients.clientVoucher', 'title' => 'Voucherek'])
                </div>
            </div>

            <div class="card-footer">
{{--                {!! Form::submit(__('Ment'), ['class' => 'btn btn-primary']) !!}--}}
                <a href="{{ route('clients.index') }}" class="btn btn-default">{{ __('Kilép') }}</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
