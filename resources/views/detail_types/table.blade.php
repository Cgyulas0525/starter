<div class="table-responsive">
    <table class="table" id="detailTypes-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Listing</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($detailTypes as $detailTypes)
            <tr>
                <td>{{ $detailTypes->name }}</td>
            <td>{{ $detailTypes->listing }}</td>
            <td>{{ $detailTypes->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['detailTypes.destroy', $detailTypes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('detailTypes.show', [$detailTypes->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('detailTypes.edit', [$detailTypes->id]) }}" class='btn btn-default btn-xs'>
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
