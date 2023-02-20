<div class="table-responsive">
    <table class="table" id="vouchers-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Vouchertype Id</th>
        <th>Partner Id</th>
        <th>Content</th>
        <th>Validityfrom</th>
        <th>Validityto</th>
        <th>Qrcode</th>
        <th>Discount</th>
        <th>Discountpercent</th>
        <th>Usednumber</th>
        <th>Active</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($vouchers as $vouchers)
            <tr>
                <td>{{ $vouchers->name }}</td>
            <td>{{ $vouchers->vouchertype_id }}</td>
            <td>{{ $vouchers->partner_id }}</td>
            <td>{{ $vouchers->content }}</td>
            <td>{{ $vouchers->validityfrom }}</td>
            <td>{{ $vouchers->validityto }}</td>
            <td>{{ $vouchers->qrcode }}</td>
            <td>{{ $vouchers->discount }}</td>
            <td>{{ $vouchers->discountpercent }}</td>
            <td>{{ $vouchers->usednumber }}</td>
            <td>{{ $vouchers->active }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['vouchers.destroy', $vouchers->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('vouchers.show', [$vouchers->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('vouchers.edit', [$vouchers->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
