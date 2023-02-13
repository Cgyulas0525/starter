<!-- Settlement Id Field -->
<div class="form-group col-sm-6">
    @if (!isset($validpostcodes))
        {!! Form::label('settlement_id', __('Település:')) !!}
        {!! Form::select('settlement_id', SettlementsClass::distinctSettlments(), null,
                  ['class'=>'select2 form-control', 'id' => 'settlement_id', 'required' => true,
                  'readonly' => isset($validpostcodes) ? ($validpostcodes->active == 1 ? false : true)  : false]) !!}
    @endif
    {!! Form::label('description', __('Megjegyzés:')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','maxlength' => 500,'rows' => 4]) !!}

    {!! Form::hidden('postcode', isset($validpostcodes) ? $validpostcodes->postcode : null, ['class' => 'form-control', 'id' => 'postcode', 'required' => true]) !!}
    {!! Form::hidden('active', isset($validpostcodes) ? $validpostcodes->avtive : null, ['class' => 'form-control']) !!}
</div>

@section('scripts')
    <script src="{{ asset('/public/js/ajaxsetup.js') }} " type="text/javascript"></script>
    <script src="{{ asset('/public/js/required.js') }} " type="text/javascript"></script>
    <script src="{{ asset('/public/js/sweetalert.js') }} " type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {

            ajaxSetup();

            RequiredBackgroundModify('.form-control')

            $('#settlement_id').change(function () {
                let settlement = $(this).val();
                console.log(settlement);
                let url = "{{url('/validpostcodes')}}";
                if (settlement != null && settlement != 0 && settlement != ' ' ) {
                    swal.fire({
                        title: "Érvényeségi körzetek!",
                        text: "Felveszi az összes irányító számot a településhez?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Felvesz",
                        cancelButtonText: "Kilép",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type:"GET",
                                url:"{{url('insertValidPostcodesRecord')}}",
                                data: { settlement: settlement},
                                success: function (response) {
                                    window.location.href = url;
                                },
                                error: function (response) {
                                    console.log('Error:', response);
                                    alert('nem ok');
                                }
                            });
                        } else {
                            window.location.href = url;
                        }
                    });

                }
            })

        });
    </script>
@endsection
