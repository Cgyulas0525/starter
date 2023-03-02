<div class="table-responsive">
    <table class="table" id="partnerquestionnaries-table">
        <thead>
            <tr>
                <th>Partner Id</th>
        <th>Questionnarie Id</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($partnerquestionnaries as $partnerquestionnaries)
            <tr>
                <td>{{ $partnerquestionnaries->partner_id }}</td>
            <td>{{ $partnerquestionnaries->questionnarie_id }}</td>
            <td>{{ $partnerquestionnaries->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['partnerquestionnaries.destroy', $partnerquestionnaries->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('partnerquestionnaries.show', [$partnerquestionnaries->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('partnerquestionnaries.edit', [$partnerquestionnaries->id]) }}" class='btn btn-default btn-xs'>
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
