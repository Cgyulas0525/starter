<div class="table-responsive">
    <table class="table" id="clientvoucheruseds-table">
        <thead>
            <tr>
                <th>Clientvoucher Id</th>
        <th>Usedtime</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientvoucheruseds as $clientvoucherused)
            <tr>
                <td>{{ $clientvoucherused->clientvoucher_id }}</td>
            <td>{{ $clientvoucherused->usedtime }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['clientvoucheruseds.destroy', $clientvoucherused->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clientvoucheruseds.show', [$clientvoucherused->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('clientvoucheruseds.edit', [$clientvoucherused->id]) }}" class='btn btn-default btn-xs'>
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
