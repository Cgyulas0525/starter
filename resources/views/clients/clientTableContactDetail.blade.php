@section('css')
    <link rel="stylesheet" href="pubic/css/app.css">
    @include('layouts.costumcss')
@endsection

@include('clients.clientData')

<div class="col-lg-12 col-md-12 col-xs-12">

    <section class="content-header">
        <h1 class="pull-left">{{ __($title) }}</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="row">
            <div @class([ $col1 ])">
                @include('layouts.indextable')
            </div>
            <div @class([ $col2 ])>
                @include('layouts.indextable', ['tableTitle' => $tTitle, 'class' => "table table-hover table-bordered detailtable w-100"])
            </div>
        </div>

    </div>
</div>
</div>


@section('scripts')
    @include('functions.js.ajaxsetup')
    @include('functions.js.required')
    @include('functions.js.sweetalert')
    @include('functions.js.readonlyModify')


    @include($scriptFile)
@endsection

