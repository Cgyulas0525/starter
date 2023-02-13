<div class="table-responsive">
    <table class="table" id="logitems-table">
        <thead>
            <tr>
                <th>Logitemtype Id</th>
        <th>Client Id</th>
        <th>User Id</th>
        <th>Partnercontact Id</th>
        <th>Datatable</th>
        <th>Eventdatetime</th>
        <th>Remoteaddress</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($logitems as $logitems)
            <tr>
                <td>{{ $logitems->logitemtype_id }}</td>
            <td>{{ $logitems->client_id }}</td>
            <td>{{ $logitems->user_id }}</td>
            <td>{{ $logitems->partnercontact_id }}</td>
            <td>{{ $logitems->datatable }}</td>
            <td>{{ $logitems->eventdatetime }}</td>
            <td>{{ $logitems->remoteaddress }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['logitems.destroy', $logitems->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('logitems.show', [$logitems->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('logitems.edit', [$logitems->id]) }}" class='btn btn-default btn-xs'>
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
