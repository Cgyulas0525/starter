<div class="table-responsive">
    <table class="table" id="validpostcodes-table">
        <thead>
            <tr>
                <th>Settlement Id</th>
        <th>Postcode</th>
        <th>Active</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($validpostcodes as $validpostcodes)
            <tr>
                <td>{{ $validpostcodes->settlement_id }}</td>
            <td>{{ $validpostcodes->postcode }}</td>
            <td>{{ $validpostcodes->active }}</td>
            <td>{{ $validpostcodes->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['validpostcodes.destroy', $validpostcodes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('validpostcodes.show', [$validpostcodes->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('validpostcodes.edit', [$validpostcodes->id]) }}" class='btn btn-default btn-xs'>
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
