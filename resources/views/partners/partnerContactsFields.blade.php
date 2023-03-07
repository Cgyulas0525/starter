@section('css')
    @include('layouts.costumcss')
@endsection

@include('partners.partnerData')

@section('scripts')
    @include('functions.js.ajaxsetup')
    @include('functions.js.required')
    @include('functions.js.sweetalert')

    <script type="text/javascript">
        $(function () {

            ajaxSetup();

            RequiredBackgroundModify('.form-control');

            var table = $('.indextable').DataTable({
                serverSide: true,
                scrollY: 390,
                scrollX: true,
                order: [[1, 'asc']],
                paging: false,
                buttons: [],
                ajax: "{{ route('partnerContactsIndex', ['partner' => $partners->id, 'active' => 1]) }}",
                columns: [
                    {title: '<a class="btn btn-primary" title="Felvitel" href="{!! route('partnerContactCreate', ['id' => $partners->id]) !!}"><i class="fa fa-plus-square"></i></a>',
                        data: 'action', sClass: "text-center", width: '200px', name: 'action', orderable: false, searchable: false},
                    {title: "{{ __('Név')}}", data: 'name', name: 'name'},
                    {title: "{{ __('Email')}}", data: 'email', name: 'email'},
                    {title: "{{ __('Telefonszám')}}", data: 'phonenumber', name: 'phonenumber'},
                ],
                fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                    if (aData.active == 0) {
                        $('td', nRow).css('background-color', 'lightgray');
                    }
                }

            });

            $('#active').change(function () {
                let url = '{{ route('partnerContactsIndex', [":partner", ":active"]) }}';
                url = url.replace(':partner', {{ $partners->id }});
                url = url.replace(':active', $('#active').val());
                table.ajax.url(url).load();
            })

        });
    </script>

@endsection

