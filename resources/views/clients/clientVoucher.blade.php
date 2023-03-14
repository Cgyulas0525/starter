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
            buttons: [],
            ajax: "{{ route('cvIndex', ['id' => $clients->id]) }}",
            columns: [
                {title: '', data: 'action', sClass: "text-center", width: '50px', name: 'action', orderable: false, searchable: false},
                {title: 'Küldve', data: 'posted', render: function (data, type, row) { return data ? moment(data).format('YYYY.MM.DD') : ''; }, sClass: "text-center", width:'150px', name: 'posted'},
                {title: "{{ __('Partner')}}", data: 'partnerName', name: 'partnerName'},
                {title: "{{ __('Voucher')}}", data: 'voucherName', name: 'voucherName'},
                {title: 'Felhasználva', data: 'used', render: $.fn.dataTable.render.number( '.', ',', 0), sClass: "text-right", width:'50px', name: 'used'},
            ]
        });


    });
</script>
