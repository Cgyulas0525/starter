<div class="table-responsive">
    <table class="table" id="lotteries-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Lotteriedate</th>
        <th>Content</th>
        <th>Description</th>
        <th>Active</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($lotteries as $lotteries)
            <tr>
                <td>{{ $lotteries->name }}</td>
            <td>{{ $lotteries->lotteriedate }}</td>
            <td>{{ $lotteries->content }}</td>
            <td>{{ $lotteries->description }}</td>
            <td>{{ $lotteries->active }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['lotteries.destroy', $lotteries->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('lotteries.show', [$lotteries->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('lotteries.edit', [$lotteries->id]) }}" class='btn btn-default btn-xs'>
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
