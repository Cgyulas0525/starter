@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="public/css/app.css">
    <link rel="stylesheet" href="public/css/Highcharts.css">
    @include('layouts.costumcss')
@endsection

@section('content')
    <div class="content">
        @include('dashboard.dashboardHeader')
        @include('dashboard.dashboardWidget')
        @include('dashboard.dashboardClient')
    </div>
@endsection

@section('scripts')
    @include('functions.js.ajaxsetup')

    <script type="text/javascript">
        $(function () {

            ajaxSetup();

        });
    </script>
@endsection

