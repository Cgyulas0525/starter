<div class="table-responsive">
    <table class="table" id="questionnaires-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Validityfrom</th>
        <th>Validitato</th>
        <th>Active</th>
        <th>Basicpackage</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($questionnaires as $questionnaires)
            <tr>
                <td>{{ $questionnaires->name }}</td>
            <td>{{ $questionnaires->validityfrom }}</td>
            <td>{{ $questionnaires->validitato }}</td>
            <td>{{ $questionnaires->active }}</td>
            <td>{{ $questionnaires->basicpackage }}</td>
            <td>{{ $questionnaires->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['questionnaires.destroy', $questionnaires->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('questionnaires.show', [$questionnaires->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('questionnaires.edit', [$questionnaires->id]) }}" class='btn btn-default btn-xs'>
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
