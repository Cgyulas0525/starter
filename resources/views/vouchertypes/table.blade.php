<div class="table-responsive">
    <table class="table" id="vouchertypes-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Local</th>
        <th>Localfund</th>
        <th>Localreplay</th>
        <th>Otherfund</th>
        <th>Otherreplay</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($vouchertypes as $vouchertypes)
            <tr>
                <td>{{ $vouchertypes->name }}</td>
            <td>{{ $vouchertypes->local }}</td>
            <td>{{ $vouchertypes->localfund }}</td>
            <td>{{ $vouchertypes->localreplay }}</td>
            <td>{{ $vouchertypes->otherfund }}</td>
            <td>{{ $vouchertypes->otherreplay }}</td>
            <td>{{ $vouchertypes->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['vouchertypes.destroy', $vouchertypes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('vouchertypes.show', [$vouchertypes->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('vouchertypes.edit', [$vouchertypes->id]) }}" class='btn btn-default btn-xs'>
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
