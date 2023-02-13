<div class="table-responsive">
    <table class="table" id="partners-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Name</th>
        <th>Partnertype Id</th>
        <th>Taxnumber</th>
        <th>Bankaccount</th>
        <th>Postcode</th>
        <th>Settlement Id</th>
        <th>Address</th>
        <th>Email</th>
        <th>Phonenumber</th>
        <th>Description</th>
        <th>Active</th>
        <th>Logourl</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($partners as $partners)
            <tr>
                <td>{{ $partners->id }}</td>
            <td>{{ $partners->name }}</td>
            <td>{{ $partners->partnertype_id }}</td>
            <td>{{ $partners->taxnumber }}</td>
            <td>{{ $partners->bankaccount }}</td>
            <td>{{ $partners->postcode }}</td>
            <td>{{ $partners->settlement_id }}</td>
            <td>{{ $partners->address }}</td>
            <td>{{ $partners->email }}</td>
            <td>{{ $partners->phonenumber }}</td>
            <td>{{ $partners->description }}</td>
            <td>{{ $partners->active }}</td>
            <td>{{ $partners->logourl }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['partners.destroy', $partners->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('partners.show', [$partners->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('partners.edit', [$partners->id]) }}" class='btn btn-default btn-xs'>
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
