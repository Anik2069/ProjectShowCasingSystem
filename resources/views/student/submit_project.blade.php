@extends("student.master")
@push("convener_css")
    <link rel="stylesheet" href="{{ asset("assets/css/app.min.css") }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/components.css") }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset("assets/css/custom.css") }}">
    <style>
        #my_camera {
            width: 320px;
            height: 240px;
            border: 1px solid black;
        }
    </style>
@endpush

@section("content")
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Project Submission</h4>
                            </div>
                            <form action="" method="">
                                @csrf
                                <div class="card-body">
                                    <div id="">
                                        <h4>Instruction</h4>
                                        <section>
                                            <ol>
                                                <li>According to Converner, Criteria are ready</li>
                                                <li>You have to Fill those Criteria, otherwise you will fail</li>
                                                <li>System Will take a screenshot as a evidence</li>
                                            </ol>
                                        </section>
                                        <h4>Submission Criteria</h4>
                                        <section>
                                            @if(!empty($submission_criteria))
                                                @foreach($submission_criteria as $submission)
                                                    <div class="form-group">
                                                        <label for=""> {{ $submission["name"] }}</label>
                                                        <input type="text" class="form-control" placeholder="{{ $submission["name"] }}">
                                                    </div>
                                                @endforeach
                                            @endif
                                        </section>

                                        <h4>Capture Image</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div id="my_camera"></div>
                                                {{--  <input type=button value="Take Snapshot" onClick="take_snapshot()">--}}

                                            </div>
                                            <div class="col-md-4">
                                                <div id="results"></div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-group pt-3">
                                        <button type="button" class="btn btn-success" onClick="take_snapshot()">Save
                                        </button>
                                        <button type="button" class="btn btn-primary">Cancel</button>
                                    </div>
                                </div>
                            </form>

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

@endsection
@push("convener_js")
    <script type="text/javascript" src="{{ asset("webcamjs/webcam.min.js") }}"></script>

    <!-- Configure a few settings and attach camera -->
    <script language="JavaScript">
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera');
    </script>
    <!-- A button for taking snaps -->

    <!-- Code to handle taking the snapshot and displaying it locally -->
    <script language="JavaScript">

        function take_snapshot() {

            // take snapshot and get image data
            Webcam.snap(function (data_uri) {
                // display results in page
                document.getElementById('results').innerHTML =
                    '<img src="' + data_uri + '"/>';
            });
        }
    </script>
    <script src="{{ asset("assets/js/app.min.js") }}"></script>
    <script src="{{ asset("assets/bundles/jquery-validation/dist/jquery.validate.min.js")  }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset("assets/bundles/jquery-steps/jquery.steps.min.js") }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset("assets/js/page/form-wizard.js") }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset("assets/js/scripts.js") }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset("assets/js/custom.js") }}"></script>


@endpush
