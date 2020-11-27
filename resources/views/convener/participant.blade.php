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
                                <h4>Student Info</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Programe Name</th>
                                            <th>Student Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Institution</th>
                                            <th>Project Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!empty($studentlist))
                                            @foreach($studentlist as $value)
                                                <tr>
                                                    <td>
                                                        {{$loop->iteration}}
                                                    </td>
                                                    <td>
                                                        {{ $value->program_name }}

                                                    </td>
                                                    <td class="align-middle">
                                                        {{$value->name   }}
                                                    </td>
                                                    <td>
                                                        {{$value->email  }}
                                                    </td>

                                                    <td>
                                                        {{$value->phone  }}
                                                    </td>
                                                    <td>
                                                        {{$value->institution  }}
                                                    </td>
                                                    <td>
                                                        {{$value->project_name  }}
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-primary" data-toggle="modal"
                                                                data-target=".bd-example-modal-lg{{$value->id}}">
                                                            Project Details
                                                        </button> &nbsp; /
                                                        &nbsp;
                                                        @if(!empty($value->supervisor_id))
                                                            <button class="btn btn-info" data-toggle="modal"
                                                                    data-target="#exampleModal{{ $value->id  }}"
                                                                    disabled> Assign
                                                                Supervisor
                                                            </button>
                                                        @else
                                                            <button class="btn btn-info" data-toggle="modal"
                                                                    data-target="#exampleModal{{ $value->id  }}"> Assign
                                                                Supervisor
                                                            </button>
                                                        @endif
                                                    </td>
                                                    {{--   <td><a href="#" class="btn btn-primary">Detail</a></td>--}}
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if(!empty($studentlist))
            @foreach($studentlist as $value)
                <div class="modal fade bd-example-modal-lg{{$value->id}}" tabindex="-1" role="dialog"
                     aria-labelledby="myLargeModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myLargeModalLabel">Project Info</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <tr>
                                        <td><strong>Project Name</strong></td>
                                        <td>{{ $value->project_name  }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Project Description</strong></td>
                                        <td>{{ $value->description  }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Project Supervisor</strong></td>
                                        <td>
                                            @if(!empty($value->supervisor_id))
                                                <span class="badge badge-success">Assign</span>
                                            @else

                                                <span class="badge badge-danger">Not Assign</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        @if(!empty($studentlist))
            @foreach($studentlist as $value)
                <div class="modal fade" id="exampleModal{{$value->id}}" tabindex="-1" role="dialog"
                     aria-labelledby="formModal"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formModal">Assign SuperVisor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="" action="{{ route("supervisor.store") }}" method="post"
                                      id="assignSupervisor">@csrf
                                    <div class="form-group">
                                        <label>Username</label>
                                        <div class="input-group">
                                            {{--<div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>--}}
                                            <select name="supervisorID" id="supervisorID" class="form-control" required>
                                                <option value="">Select</option>
                                                @if(!empty($supervisor))
                                                    @foreach($supervisor as $data_info)
                                                        <option value="{{$data_info->id}}">{{$data_info->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <input type="hidden" name="id" value="{{$value->id}}">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary m-t-15 waves-effect"
                                            onclick="assignSuperVisor()">Assign
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
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
                                <input type="radio" name="value" value="1"
                                       class="selectgroup-input-radio select-layout"
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
                                <input type="radio" name="icon-input" value="2"
                                       class="selectgroup-input select-sidebar"
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


@endsection

@push("convener_js")

    <script>
        function assignSuperVisor() {
            var formData = $("#assignSupervisor").serialize();
            var actionRoute  =  $("#assignSupervisor").attr("action");
            var actionMethod  =  $("#assignSupervisor").attr("method");
            $.ajax({
                url: actionRoute,
                data: formData,
                type: 'POST',
                success: function (data) {
                    // do something with the result
                    alert("Supervise Assign Successfully");
/*
                    $('#exampleModal'+post_id).modal('hide');
*/
                    window.location.reload();
                    /* window.location.reload();*/
                }
            });

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
