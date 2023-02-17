<div class="table-responsive">
    <table class="table" id="partnercontacts-table">
        <thead>
            <tr>
                <th>Partner Id</th>
        <th>Name</th>
        <th>Password</th>
        <th>Email</th>
        <th>Phonenumber</th>
        <th>Active</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($partnercontacts as $partnercontacts)
            <tr>
                <td>{{ $partnercontacts->partner_id }}</td>
            <td>{{ $partnercontacts->name }}</td>
            <td>{{ $partnercontacts->password }}</td>
            <td>{{ $partnercontacts->email }}</td>
            <td>{{ $partnercontacts->phonenumber }}</td>
            <td>{{ $partnercontacts->active }}</td>
            <td>{{ $partnercontacts->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['partnercontacts.destroy', $partnercontacts->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('partnercontacts.show', [$partnercontacts->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('partnercontacts.edit', [$partnercontacts->id]) }}" class='btn btn-default btn-xs'>
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
