@extends("student.master")

@push("convener_css")
    <link rel="stylesheet" href="{{ asset("assets/css/app.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/bundles/datatables/datatables.min.css") }}">
    <link rel="stylesheet"
          href="{{ asset("assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css") }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/components.css") }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset("assets/css/custom.css") }}">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset("assets/img/favicon.ico") }}'/>
@endpush


@section("content")
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Program Info</h4>
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
                                            <th>Purpose</th>
                                            <th>Project Name</th>
                                            <th>Program Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!empty($program))
                                            @foreach($program as $value)
                                                <tr>
                                                    <td>
                                                        {{$loop->iteration}}
                                                    </td>
                                                    <td>{{ $value->program_name  }}</td>
                                                    <td class="align-middle">
                                                        {{ $value->purpose  }}
                                                    </td>
                                                    <td>
                                                        {{ $value->project_name }}
                                                    </td>
                                                    <td>
                                                        {{ date("d M,Y",strtotime( $value->program_date))  }}
                                                    </td>



                                                    <td>
                                                        @if(date("d M,Y",strtotime( $value->program_date))== date("d-M,Y"))
                                                            <div class="badge badge-success badge-shadow">Today Is
                                                                Program Date
                                                            </div>
                                                        @elseif(date("d M,Y",strtotime( $value->program_date))> date("d-M,Y"))
                                                            <div class="badge badge-warning badge-shadow">Pending</div>
                                                        @else
                                                            <div class="badge badge-danger badge-shadow">Over</div>
                                                        @endif
                                                    </td>
                                                    <input type="hidden" id="program_id" value="{{$value->id}}">
                                                    <td><a href="{{ route("student.program_details",$value->id) }}"
                                                           class="btn btn-warning">Details</a>
                                                        /
                                                        <button data-toggle="modal" data-target="#exampleModal"
                                                                 onclick="openFollowModal(this)"
                                                           class="btn btn-primary">check Followup</button>

                                                    @if($type ==1)
                                                            <a href="{{ route("student.submit_project",[$value->id]) }}"
                                                               class="btn btn-success">Submit Project</a>
                                                    @endif
                                                    </td>
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
        @include("student.open_modal")
    </div>


@endsection

@push("convener_js")

    <script>

        function openFollowModal(element) {
            var programId = $("#program_id").val();

            $.ajax({
                url: '/students/open_followup',
                data: {programId: programId  },
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
    <script src="{{ asset("assets/js/app.min.js") }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset("assets/bundles/datatables/datatables.min.js") }}"></script>
    <script src="{{ asset("assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js") }}"></script>
    <script src="{{ asset("assets/bundles/jquery-ui/jquery-ui.min.js") }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset("assets/js/page/datatables.js") }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset("assets/js/scripts.js") }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset("assets/js/custom.js") }}"></script>
@endpush
