<div class="table-responsive">
    <table class="table" id="clientquestionnariedetails-table">
        <thead>
            <tr>
                <th>Clientquestionnarie Id</th>
        <th>Questionnariedetail Id</th>
        <th>Reply</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientquestionnariedetails as $clientquestionnariedetails)
            <tr>
                <td>{{ $clientquestionnariedetails->clientquestionnarie_id }}</td>
            <td>{{ $clientquestionnariedetails->questionnariedetail_id }}</td>
            <td>{{ $clientquestionnariedetails->reply }}</td>
            <td>{{ $clientquestionnariedetails->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['clientquestionnariedetails.destroy', $clientquestionnariedetails->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clientquestionnariedetails.show', [$clientquestionnariedetails->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('clientquestionnariedetails.edit', [$clientquestionnariedetails->id]) }}" class='btn btn-default btn-xs'>
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
