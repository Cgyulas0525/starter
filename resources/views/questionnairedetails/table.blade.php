<div class="table-responsive">
    <table class="table" id="questionnairedetails-table">
        <thead>
            <tr>
                <th>Questionnaire Id</th>
        <th>Name</th>
        <th>Detailtype Id</th>
        <th>Required</th>
        <th>Readonly</th>
        <th>Long</th>
        <th>Rowcount</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($questionnairedetails as $questionnairedetails)
            <tr>
                <td>{{ $questionnairedetails->questionnaire_id }}</td>
            <td>{{ $questionnairedetails->name }}</td>
            <td>{{ $questionnairedetails->detailtype_id }}</td>
            <td>{{ $questionnairedetails->required }}</td>
            <td>{{ $questionnairedetails->readonly }}</td>
            <td>{{ $questionnairedetails->long }}</td>
            <td>{{ $questionnairedetails->rowcount }}</td>
            <td>{{ $questionnairedetails->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['questionnairedetails.destroy', $questionnairedetails->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('questionnairedetails.show', [$questionnairedetails->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('questionnairedetails.edit', [$questionnairedetails->id]) }}" class='btn btn-default btn-xs'>
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
