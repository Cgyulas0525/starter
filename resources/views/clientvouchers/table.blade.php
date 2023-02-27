<div class="table-responsive">
    <table class="table" id="clientvouchers-table">
        <thead>
            <tr>
                <th>Client Id</th>
        <th>Voucher Id</th>
        <th>Posted</th>
        <th>Used</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientvouchers as $clientvouchers)
            <tr>
                <td>{{ $clientvouchers->client_id }}</td>
            <td>{{ $clientvouchers->voucher_id }}</td>
            <td>{{ $clientvouchers->posted }}</td>
            <td>{{ $clientvouchers->used }}</td>
            <td>{{ $clientvouchers->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['clientvouchers.destroy', $clientvouchers->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clientvouchers.show', [$clientvouchers->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('clientvouchers.edit', [$clientvouchers->id]) }}" class='btn btn-default btn-xs'>
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
