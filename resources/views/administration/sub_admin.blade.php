@extends("administration.master")
@section("content")
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">

                    <div class="col-12 col-md-12 col-lg-12">
                       @include("alert_message")
                        <div class="card">
                            <form class="needs-validation" novalidate="" action="{{ route("convener.store") }}"
                                  method="post">
                                @csrf
                                <div class="card-header">
                                    <h4>Convener Registration</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Convener Name</label>
                                        <input type="text" class="form-control" required="" name="name">
                                        <div class="invalid-feedback">
                                            What's Program or Organization Name name?
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Convener Email</label>
                                        <input type="email" class="form-control" required="" name="email">
                                        <div class="invalid-feedback">
                                            What's Your email?
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Convener Mobile Number</label>
                                        <input type="text" class="form-control" required="" name="mobile">
                                        <div class="invalid-feedback">
                                            What's Program or Organization Name name?
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" id="" cols="30" rows="10" ></textarea>
                                        <div class="invalid-feedback">
                                            What's Program or Address?
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label>DOB</label>
                                            <input type="date" name="dob" class="form-control">
                                            <div class="valid-feedback">
                                                Good job!
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Organization</label>
                                            <input type="text" name="organization" class="form-control">
                                            <div class="valid-feedback">
                                                Good job!
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <label>Org Address</label>
                                            <input type="text" class="form-control" name="org_address">
                                            <div class="valid-feedback">
                                                Good job!
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <hr>
                                            <label for="">System Information </label>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label>User Name</label>
                                            <input type="text" name="username" class="form-control ">
                                            <div class="valid-feedback">
                                                Good job!
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control ">
                                            <div class="valid-feedback">
                                                Good job!
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Confirm Password</label>
                                            <input type="password" name="" class="form-control ">
                                            <div class="valid-feedback">
                                                Good job!
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <input  type="checkbox" value="1" name="status"> <label> Status</label>
                                        </div>

                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary">Submit</button>
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
                                <input type="radio" name="value" value="1"
                                       class="selectgroup-input-radio select-layout" checked>
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
                                       class="selectgroup-input select-sidebar" checked>
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
