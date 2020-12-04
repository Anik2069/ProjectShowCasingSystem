<table class="table table-bordered  ">
    <thead>
    <th>#</th>
    <th>Judges Name</th>
    <th>Phone Number</th>
    <th>Email</th>
    <th>Job</th>
    </thead>
    <tbody>
    @if(!empty($member))
        @foreach($member as $result)
            <tr>
                <td><input type="checkbox" name="memberid[]" value="{{ $result->id  }}"></td>
                <td>{{$result->name}}</td>
                <td>{{$result->phone_number}}</td>
                <td>{{$result->email}}</td>
                <td>{{$result->job}}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
