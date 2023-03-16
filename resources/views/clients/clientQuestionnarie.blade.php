<script type="text/javascript">
    $(function () {

        ajaxSetup();

        RequiredBackgroundModify('.form-control')
        ReadonlyBackgroundModify('.form-control')

        var table = $('.indextable').DataTable({
            serverSide: true,
            scrollY: 390,
            scrollX: true,
            order: [[0, 'desc'], [1, 'asc'], [2, 'asc']],
            paging: false,
            ajax: "{{ route('cqIndex', ['id' => $clients->id]) }}",
            columns: [
                // {title: '', data: 'action', sClass: "text-center", width: '200px', name: 'action', orderable: false, searchable: false},
                {title: '{{ __('Küldve')}}', data: 'posted', render: function (data, type, row) { return data ? moment(data).format('YYYY.MM.DD') : ''; }, sClass: "text-center", width:'100px', name: 'posted'},
                {title: "{{ __('Partner')}}", data: 'partnerName', name: 'partnerName'},
                {title: "{{ __('Űrlap')}}", data: 'questionnarieName', name: 'questionnarieName'},
                {title: '{{ __('Válaszolt')}}', data: 'retrieved', render: function (data, type, row) { return data ? moment(data).format('YYYY.MM.DD') : ''; }, sClass: "text-center", width:'100px', name: 'retrieved'},
            ],
            buttons: [
                {
                    text: 'Sorok',
                    action: function () {
                        var row = this.rows( { selected: true } ).data();
                        let url = '{{ route('cqdIndex', [ ':id']) }}';
                        if (row.length > 0 && row.length < 2 ) {
                            url = url.replace(':id',  row[0].id);
                        } else {
                            let id = -999999;
                            url = url.replace(':id', id);
                        }
                        datailtable.ajax.url(url).load();
                    }
                }
            ],

        });

        var datailtable = $('.detailtable').DataTable({
            serverSide: true,
            scrollY: 390,
            scrollX: true,
            order: [0, 'desc'],
            paging: false,
            buttons: [],
            select: false,
            ajax: "{{ route('cqdIndex', -9999) }}",
            columns: [
                {title: '{{ __('Dátum')}}', data: 'usedtime', render: function (data, type, row) { return data ? moment(data).format('YYYY.MM.DD hh:mm:ss') : ''; }, sClass: "text-center", name: 'usedtime'},
                {title: 'Id', data: 'id', name: 'id'},
            ],
            columnDefs: [
                {
                    visible: false,
                    targets: [1]
                },
            ]
        });


    });
</script>
