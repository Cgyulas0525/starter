<div class="table-responsive">
    <table class="table" id="clients-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Email</th>
        <th>Phonenumber</th>
        <th>Birthday</th>
        <th>Password</th>
        <th>Postcode</th>
        <th>Settlement Id</th>
        <th>Address</th>
        <th>Addresscardnumber</th>
        <th>Addresscardurl</th>
        <th>Validated</th>
        <th>Active</th>
        <th>Description</th>
        <th>Gender</th>
        <th>Facebookid</th>
        <th>Facebookname</th>
        <th>Facebookemail</th>
        <th>Gmailid</th>
        <th>Gmailname</th>
        <th>Gmailemail</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clients as $clients)
            <tr>
                <td>{{ $clients->name }}</td>
            <td>{{ $clients->email }}</td>
            <td>{{ $clients->phonenumber }}</td>
            <td>{{ $clients->birthday }}</td>
            <td>{{ $clients->password }}</td>
            <td>{{ $clients->postcode }}</td>
            <td>{{ $clients->settlement_id }}</td>
            <td>{{ $clients->address }}</td>
            <td>{{ $clients->addresscardnumber }}</td>
            <td>{{ $clients->addresscardurl }}</td>
            <td>{{ $clients->validated }}</td>
            <td>{{ $clients->active }}</td>
            <td>{{ $clients->description }}</td>
            <td>{{ $clients->gender }}</td>
            <td>{{ $clients->facebookid }}</td>
            <td>{{ $clients->facebookname }}</td>
            <td>{{ $clients->facebookemail }}</td>
            <td>{{ $clients->gmailid }}</td>
            <td>{{ $clients->gmailname }}</td>
            <td>{{ $clients->gmailemail }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['clients.destroy', $clients->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clients.show', [$clients->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('clients.edit', [$clients->id]) }}" class='btn btn-default btn-xs'>
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
