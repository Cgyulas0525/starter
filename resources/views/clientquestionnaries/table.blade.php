<div class="table-responsive">
    <table class="table" id="clientquestionnaries-table">
        <thead>
            <tr>
                <th>Client Id</th>
        <th>Questionnarie Id</th>
        <th>Posted</th>
        <th>Retrieved</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientquestionnaries as $clientquestionnaries)
            <tr>
                <td>{{ $clientquestionnaries->client_id }}</td>
            <td>{{ $clientquestionnaries->questionnarie_id }}</td>
            <td>{{ $clientquestionnaries->posted }}</td>
            <td>{{ $clientquestionnaries->retrieved }}</td>
            <td>{{ $clientquestionnaries->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['clientquestionnaries.destroy', $clientquestionnaries->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clientquestionnaries.show', [$clientquestionnaries->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('clientquestionnaries.edit', [$clientquestionnaries->id]) }}" class='btn btn-default btn-xs'>
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
