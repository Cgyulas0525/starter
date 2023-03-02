@section('css')
    <link rel="stylesheet" href="pubic/css/app.css">
    @include('layouts.costumcss')
@endsection


<!-- Name Field -->
<div class="form-group col-sm-12">
    <div class="row">
        <div class="form-group col-sm-4">
            {!! Form::label('name', __('Név:')) !!}
            {!! Form::text('name', $questionnaires->name, ['class' => 'form-control','maxlength' => 200,'id' => 'name', 'readonly' => true]) !!}
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('validityfrom', __('Érvényes -tól:')) !!}
            {!! Form::date('validityfrom', $questionnaires->validityfrom, ['class' => 'form-control','id'=>'validityfrom', 'readonly' => true]) !!}
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('validityto', __('Érvényes -ig:')) !!}
            {!! Form::date('validityto', $questionnaires->validityto, ['class' => 'form-control','id'=>'validityto', 'readonly' => true]) !!}
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('basicpackage', __('Alapcsomag:')) !!}
            {!! Form::text('basicpackageText', ($questionnaires->basicpackage == 0) ? 'Nem' : 'Igen', ['class' => 'form-control','maxlength' => 500, 'readonly' => true, 'id' => 'basicpackageText', 'readonly' => true]) !!}
            {!! Form::hidden('basicpackage', $questionnaires->basicpackage, ['class'=>'form-control', 'id' => 'basicpackage', 'readonly' => true]) !!}
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('qrcode', __('Qr kód:')) !!}
            {!! Form::text('qrcode', $questionnaires->qrcode, ['class' => 'form-control','maxlength' => 500, 'readonly' => true, 'id' => 'qrcode', 'readonly' => true]) !!}
        </div>
    </div>
</div>


<div class="form-group col-sm-12 ">
    @include('layouts.indextable', ['title' => 'Partnerek'])
</div>

@section('scripts')

    @include('functions.js.ajaxsetup')
    @include('functions.js.required')
    @include('functions.js.sweetalert')
    @include('functions.js.dtControl')
    @include('functions.js.readonlyModify')

    <script type="text/javascript">
        $(function () {

            // $('[data-widget="pushmenu"]').PushMenu('collapse');

            ajaxSetup();

            RequiredBackgroundModify('.form-control')
            ReadonlyBackgroundModify('.form-control')

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
            }

            $('#validityfrom').change(function() {
                dateCheck();
            });

            $('#validityto').change(function() {
                dateCheck();
            });

            function trueFalse(value) {
                return (value == 0) ? 'Hamis' : 'Igaz';
            }

            var table = $('.indextable').DataTable({
                serverSide: true,
                scrollY: 390,
                scrollX: true,
                order: [[1, 'asc']],
                paging: false,
                select: false,
                buttons: [],
                ajax: "{{ route('qpIndex', $questionnaires->id) }}",
                columns: [
                    {title: '<a class="btn btn-primary" title="Felvitel" href="{!! route('qdCreate', ['id' => $questionnaires->id ]) !!}"><i class="fa fa-plus-square"></i></a>',
                        data: 'action', sClass: "text-center", width: '100px', name: 'action', orderable: false, searchable: false},
                    {title: "{{ __('Űrlap')}}", data: 'questionnarieName', name: 'questionnarieName'},
                    {title: "{{ __('Partner')}}", data: 'partnerName', name: 'partnerName'},
                ],
            });
        });
    </script>
@endsection
