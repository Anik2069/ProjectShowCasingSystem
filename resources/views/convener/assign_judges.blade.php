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
                            <form action="convener/assign_judges" id="result_criteria" method="post">
                                @csrf
                                <div class="card-header">
                                    <h4>Assign Info</h4>
                                </div>
                                <div class="card-body">
                                    <div></div>
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
                                    <div class="col-md-12 mt-3  table-responsive">
                                        @include("convener.assign_judges_data")
                                    </div>
                                    {{-- --}}
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
                                <h4>Assign Information</h4>
                            </div>
                            <div class="card-body" id="insertedData">
                                @include("convener.assign_judges_data_result")
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

        function btnSave() {
            var dropDown =  $("#p_name_0").val();
            if (dropDown == "") {
                alert("Please Select A Program");
            } else {
                var formData = $("#result_criteria").serialize();
                $.ajax({
                    url: '/convener/assign_judges',
                    data: formData,
                    type: 'POST',
                    success: function (data) {
                        alert("Judges are Assigned !!!!");
                        $("#insertedData").html(data);

                    }
                });
            }
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
