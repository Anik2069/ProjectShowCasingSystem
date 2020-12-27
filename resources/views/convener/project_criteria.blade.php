@extends("convener.master")

@push("convener_css")
    <link rel="stylesheet" href="../../assets/css/app.min.css">
    <link rel="stylesheet" href="../../assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="../../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="../../assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='../../assets/img/favicon.ico'/>
@endpush
@section("content")
    <div class="main-content" style="min-height: 659px;">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        @include("alert_message")
                        <div class="card">
                            <form action="{{ route("projectSubmissionCriteria.store") }}" id="result_criteria" method="post">
                                @csrf
                                <div class="card-header">
                                    <h4>Submission Info</h4>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="">Programe Name</label>

                                            <select name="p_name" id="p_name_0" class="form-control">
                                                <option value="">Select</option>
                                                @if(!empty($prgram))
                                                    @foreach($prgram as $value)
                                                        <option value="{{$value->id}}">
                                                            {{$value->program_name}}
                                                        </option>
                                                    @endforeach
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                    <table class="col-12">
                                        <tbody id="data-append-to">
                                        <tr id="0">
                                            <td>

                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label for="">Criteria Name</label>
                                                        <input type="text" id="name_0" name="name[]"
                                                               class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">Criteria Description</label>
                                                        <input type="text" id="marks_0" name="marks[]"
                                                               class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">Criteria Priority</label>
                                                        <select class="form-control" id="priority_0"
                                                                name="priority[]">
                                                            <option value="">Select One</option>
                                                            <option value="1">Required</option>
                                                            <option value="2">Non Required</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for=""></label>
                                                        <span id="add_button_0" class="btn btn-danger mt-4"
                                                              onclick="addMedRow(this)">Add</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>


                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="button" onclick="btnSave()">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Criteria Information</h4>
                            </div>
                            <div class="card-body" id="insertedData">
                                @include("convener.project_criteria_data")
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
@push("convener_js")
    <script>
        function addMedRow(thisElement) {
            var row = $(thisElement).parents("tr").clone();
            var oldId = Number($(thisElement).parents("tr").attr("id"));
            var newId = $(thisElement).parents("#data-append-to").find("tr").length + 1;
            row.attr('id', newId);
            row.find('#priority_' + oldId).attr('id', 'priority_' + newId);
            row.find('#priority_' + newId).val($(thisElement).parents('tbody').find('#priority_' + oldId).val());
            row.find('#p_name_' + oldId).attr('id', 'p_name_' + newId);
            row.find('#p_name_' + newId).val($(thisElement).parents('tbody').find('#p_name_' + oldId).val());
            $(thisElement).parents('tbody').find('#p_name_' + oldId).val('');
            $(thisElement).parents('tbody').find('#priority_' + oldId).val('');
            $(thisElement).parents('tbody').find('#marks_' + oldId).val('');
            $(thisElement).parents('tbody').find('#name_' + oldId).val('');


            /*
             row.find('#flat_size_' + newId).val($(thisElement).parents('tbody').find('#flat_size_' + oldId).val());
             $(thisElement).parents('tbody').find('#flat_size_' + oldId).val('');
             $(thisElement).parents('tbody').find('#hdn_report_serial_med_' + oldId).val('');
             $(thisElement).parents('tbody').find('#flat_price_' + oldId).val('');
             $(thisElement).parents('tbody').find('#flat_down_payment_' + oldId).val('');
             $(thisElement).parents('tbody').find('#flat_installment_' + oldId).val('');
             $(thisElement).parents('tbody').find('#flat_int_amount_' + oldId).val('');
             $(thisElement).parents('tbody').find('#flat_name_' + oldId).val('');*/


            row.find('#add_button_' + oldId).attr('id', 'add_button_' + newId);
            $(thisElement).parents("#data-append-to").append(row);

            $('#add_button_' + newId).html("<span class='btn btn-danger' onclick='removeTableRowOnly(this)'> <i class='fa fa-times'></i></span>");

        }

        function removeTableRowOnly(thisElement) {
            if (confirm("Are you sure?")) {
                $(thisElement).parents("tr").remove();
            }
            return;
        }

        function btnSave() {
            var formData = $("#result_criteria").serialize();
            var formaction = $("#result_criteria").attr("action");
            $.ajax({
                url: formaction,
                data: formData,
                type: 'POST',
                success: function (data) {
                    alert("Criteria Added !!!!");
                    $("#insertedData").html(data);

                }
            });

        }

    </script>
    <script src="../../assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="../../assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="../../assets/js/custom.js"></script>
@endpush
