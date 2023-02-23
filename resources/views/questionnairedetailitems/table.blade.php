<div class="table-responsive">
    <table class="table" id="questionnairedetailitems-table">
        <thead>
            <tr>
                <th>Questionnariedetail Id</th>
        <th>Value</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($questionnairedetailitems as $questionnairedetailitems)
            <tr>
                <td>{{ $questionnairedetailitems->questionnariedetail_id }}</td>
            <td>{{ $questionnairedetailitems->value }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['questionnairedetailitems.destroy', $questionnairedetailitems->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('questionnairedetailitems.show', [$questionnairedetailitems->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('questionnairedetailitems.edit', [$questionnairedetailitems->id]) }}" class='btn btn-default btn-xs'>
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
