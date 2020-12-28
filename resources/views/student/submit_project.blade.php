@extends("student.master")
@push("convener_css")
    <link rel="stylesheet" href="{{ asset("assets/css/app.min.css") }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/components.css") }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset("assets/css/custom.css") }}">
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
                            <div class="card-body">
                                <div id="wizard_horizontal">
                                    <h2>First Step</h2>
                                    <section>
                                        <p>In to am attended desirous raptures declared diverted confined at. Collected
                                            instantly
                                            remaining up certainly to necessary as. Over walk dull into son boy door went
                                            new.
                                            At or happiness commanded daughters as. Is handsome an declared at received in
                                            extended
                                            vicinity subjects. Into miss on he over been late pain an. Only week bore boy
                                            what
                                            fat case left use. Match round scale now sex style far times. Your me past an
                                            much.
                                        </p>
                                    </section>
                                    <h2>Second Step</h2>
                                    <section>
                                        <p>New the her nor case that lady paid read. Invitation friendship travelling eat
                                            everything
                                            the out two. Shy you who scarcely expenses debating hastened resolved. Always
                                            polite
                                            moment on is warmth spirit it to hearts. Downs those still witty an balls so
                                            chief
                                            so. Moment an little remain no up lively no. Way brought may off our regular
                                            country
                                            towards adapted cheered.</p>
                                    </section>
                                    <h2>Third Step</h2>
                                    <section>
                                        <p>Husbands ask repeated resolved but laughter debating. She end cordial visitor
                                            noisier
                                            fat subject general picture. Or if offering confined entrance no. Nay rapturous
                                            him
                                            see something residence. Highly talked do so vulgar. Her use behaved spirits
                                            and
                                            natural attempt say feeling. Exquisite mr incommode immediate he something
                                            ourselves
                                            it of. Law conduct yet chiefly beloved examine village proceed.</p>
                                    </section>
                                    <h2>Forth Step</h2>
                                    <section>
                                        <p>An country demesne message it. Bachelor domestic extended doubtful as concerns
                                            at. Morning
                                            prudent removal an letters by. On could my in order never it. Or excited
                                            certain
                                            sixteen it to parties colonel. Depending conveying direction has led immediate.
                                            Law
                                            gate her well bed life feet seen rent. On nature or no except it sussex.</p>
                                    </section>
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
                                <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                                <span class="selectgroup-button">Light</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                                <span class="selectgroup-button">Dark</span>
                            </label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <h6 class="font-medium m-b-10">Sidebar Color</h6>
                        <div class="selectgroup selectgroup-pills sidebar-color">
                            <label class="selectgroup-item">
                                <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
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
