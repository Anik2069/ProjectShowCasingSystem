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
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Student List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" > {{--id="table-1"--}}
                                        <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Programe Name</th>
                                            <th>Student Name</th>
                                            <th>Project Name</th>
                                            <th>Student Institution</th>
                                            <th>Student Email</th>
                                            <th>Total Marks</th>

                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!empty($studentlist))
                                            @foreach($studentlist as $student)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td>{{ $student->program_name }}</td>
                                                    <td>{{ $student->name }}</td>
                                                    <td>{{ $student->project_name }}</td>
                                                    <td>{{ $student->institution }}</td>
                                                    <td>{{ $student->email }}</td>
                                                    <td>{{ isset($marks_array[$student->program_id][$student->id])? $marks_array[$student->program_id][$student->id] : "0" }}</td>

                                                    <td>
                                                        <button type="button" class="btn btn-info"
                                                                data-toggle="modal" data-target="#exampleModal"
                                                                    onclick="openCheckMarkModal(this)" data-program-id= "{{ $student->program_id }}"
                                                                data-id="{{ $student->id }}">Check Marks
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="8" class="text-center"> <a class="btn btn-success"
                                                                                        href="/convener/final_result/{{ $programId ?? '' }} ">
                                                        Resutl Finalize</a></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="settingSidebar">
            <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
            </a>
            <div class="settingSidebar-body ps-container ps-theme-default">
                <div class=" fade show active">
                    <div class="setting-panel-header">Setting Panel
                    </div>
                    <div class="p-15 border-bottom">
                        <h6 class="font-medium m-b-10">Select Layout</h6>
                        <div class="selectgroup layout-color w-50">
                            <label class="selectgroup-item">
                                <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout"
                                       checked>
                                <span class="selectgroup-button">Light</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="value" value="2"
                                       class="selectgroup-input-radio select-layout">
                                <span class="selectgroup-button">Dark</span>
                            </label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <h6 class="font-medium m-b-10">Sidebar Color</h6>
                        <div class="selectgroup selectgroup-pills sidebar-color">
                            <label class="selectgroup-item">
                                <input type="radio" name="icon-input" value="1"
                                       class="selectgroup-input select-sidebar">
                                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar"
                                       checked>
                                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                            </label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <h6 class="font-medium m-b-10">Color Theme</h6>
                        <div class="theme-setting-options">
                            <ul class="choose-theme list-unstyled mb-0">
                                <li title="white" class="active">
                                    <div class="white"></div>
                                </li>
                                <li title="cyan">
                                    <div class="cyan"></div>
                                </li>
                                <li title="black">
                                    <div class="black"></div>
                                </li>
                                <li title="purple">
                                    <div class="purple"></div>
                                </li>
                                <li title="orange">
                                    <div class="orange"></div>
                                </li>
                                <li title="green">
                                    <div class="green"></div>
                                </li>
                                <li title="red">
                                    <div class="red"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <div class="theme-setting-options">
                            <label class="m-b-0">
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                       id="mini_sidebar_setting">
                                <span class="custom-switch-indicator"></span>
                                <span class="control-label p-l-10">Mini Sidebar</span>
                            </label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <div class="theme-setting-options">
                            <label class="m-b-0">
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                       id="sticky_header_setting">
                                <span class="custom-switch-indicator"></span>
                                <span class="control-label p-l-10">Sticky Header</span>
                            </label>
                        </div>
                    </div>
                    <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                        <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                            <i class="fas fa-undo"></i> Restore Default
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
         aria-hidden="true">
        @include("judges.open_modal")
    </div>


@endsection

@push("convener_js")
    <script>

        function openCheckMarkModal(element) {
            var programId = $(element).attr("data-program-id");
            var s_id = $(element).attr("data-id");
            $.ajax({
                url: '/convener/check_marks_modal',
                data: {programId: programId, s_id:s_id  },
                type: 'get',
                success: function (data) {

                    $("#exampleModal").html(data);

                }
            });
        }
        function buttonclick() {
            location.reload();
        }
    </script>




    <script src="../../assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="../../assets/bundles/datatables/datatables.min.js"></script>
    <script src="../../assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="../../assets/js/page/datatables.js"></script>
    <!-- Template JS File -->
    <script src="../../assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="../../assets/js/custom.js"></script>
@endpush
