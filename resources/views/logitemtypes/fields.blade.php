<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Név:')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100, 'required' => true]) !!}
    {!! Form::label('description', __('Megjegyzés:')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','maxlength' => 500,'rows' => 4]) !!}
</div>

@section('scripts')
    <script src="{{ asset('/public/jsfiles/ajaxsetup.js') }} " type="text/javascript"></script>
    <script src="{{ asset('/public/jsfiles/required.js') }} " type="text/javascript"></script>
    <script src="{{ asset('/public/jsfiles/sweetalert.js') }} " type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {

            ajaxSetup();

            RequiredBackgroundModify('.form-control')

        });
    </script>
@endsection

