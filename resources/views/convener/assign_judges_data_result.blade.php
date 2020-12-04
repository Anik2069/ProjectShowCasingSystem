<table class="table table-bordered  ">
    <thead>
    <th>#</th>
    <th>Assign Date</th>
    <th>Program ID</th>
    <th>Program Name</th>
    <th>Judges Name</th>
    <th>Phone Number</th>
    <th>Email</th>
    <th>Job</th>
    <th>Program Date</th>
    </thead>
    <tbody>
    @if(!empty($information))
        @foreach($information as $result)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ date("d M,Y",strtotime($result->created_at)) }}</td>
                <td>PSHC_{{$result->id}}</td>
                <td>{{$result->program_name}}</td>
                <td>{{$result->name}}</td>
                <td>{{$result->phone_number}}</td>
                <td>{{$result->email}}</td>
                <td>{{$result->job}}</td>
                <td>{{ date("d M,Y",strtotime($result->program_date)) }}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
