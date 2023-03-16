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
            ajax: "{{ route('cvIndex', ['id' => $clients->id]) }}",
            columns: [
                {title: 'Küldve', data: 'posted', render: function (data, type, row) { return data ? moment(data).format('YYYY.MM.DD') : ''; }, sClass: "text-center", width:'150px', name: 'posted'},
                {title: "{{ __('Partner')}}", data: 'partnerName', name: 'partnerName'},
                {title: "{{ __('Voucher')}}", data: 'voucherName', name: 'voucherName'},
                {title: 'Felhasználva', data: 'used', render: $.fn.dataTable.render.number( '.', ',', 0), sClass: "text-right", width:'50px', name: 'used'},
                {title: 'Id', data: 'id', name: 'id'},
            ],
            columnDefs: [
                {
                    visible: false,
                    targets: [4]
                },
            ],
            buttons: [
                {
                    text: 'Felhasználások',
                    action: function () {
                        var row = this.rows( { selected: true } ).data();
                        let url = '{{ route('clientVoucherUsedindex', [ ':id']) }}';
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
            ajax: "{{ route('clientVoucherUsedindex', -9999) }}",
            columns: [
                {title: 'Dátum', data: 'usedtime', render: function (data, type, row) { return data ? moment(data).format('YYYY.MM.DD hh:mm:ss') : ''; }, sClass: "text-center", name: 'usedtime'},
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
