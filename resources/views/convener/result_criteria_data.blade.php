<table class="table table-bordered  ">
    <thead>
    <th>Program Name</th>
    <th>Criteria Name</th>
    <th>Criteria Marks</th>
    <th>Criteria Prority</th>
    </thead>
    <tbody>
    @if(!empty($result_criteria))
        @foreach($result_criteria as $result)
            <tr>
                <td>{{$result->program_name}}</td>
                <td>{{$result->name}}</td>
                <td>{{$result->marks}}</td>
                <td>{{$result->prority}}</td>
            </tr>
        @endforeach
    @endif


    </tbody>

</table>
