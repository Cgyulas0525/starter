<!-- Name Field -->
<div class="form-group col-sm-6">
    <div class="row">
        <div class="form-group col-sm-9">
            {!! Form::label('name', __('Név:')) !!}
            {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 200,'required' => true]) !!}
        </div>
        <div class="form-group col-sm-3">
            {!! Form::label('lotteriedate', __('Dátum:')) !!}
            {!! Form::date('lotteriedate', isset($lotteries) ? $lotteries->lotteriedate : \Carbon\Carbon::now(), ['class' => 'form-control','id'=>'lotteriedate', 'required' => true]) !!}
        </div>
    </div>
    {!! Form::label('content', __('Leírás:')) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control','maxlength' => 500,'rows' => 4]) !!}
    {!! Form::label('description', __('Description:')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','maxlength' => 500,'rows' => 4]) !!}
</div>

{!! Form::hidden('active', isset($lotteries) ? $lotteries->validityto : 1, ['class' => 'form-control','id'=>'active']) !!}


@section('scripts')

    @include('functions.js.ajaxsetup')
    @include('functions.js.required')
    @include('functions.js.sweetalert')

    <script type="text/javascript">
        $(function () {

            ajaxSetup();

            RequiredBackgroundModify('.form-control')

        });
    </script>
@endsection
