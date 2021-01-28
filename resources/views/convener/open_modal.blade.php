<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModal">Mark Info</h5>
            <button type="button" class="close" data-dismiss="modal" onclick="buttonclick()" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">


            <div class="form-group table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>Date</td>
                        <td>Judges Name</td>
                        <td>Given Marks</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($marks as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ date("Y-m-d",strtotime($value->created_at))  }}</td>
                            <td>{{ $value->name  }}</td>
                            <td>{{ $value->total_marks  }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
<script>
    function checkAssignMark(element) {
        var marks = parseFloat($(element).attr("data-id"));
        var givenMark = parseFloat($(element).val());

        if (givenMark > marks) {
            alert("You are given More marks");
            $(element).val("");
        }
    }
</script>
