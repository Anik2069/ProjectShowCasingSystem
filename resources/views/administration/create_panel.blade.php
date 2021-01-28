@extends("administration.master")
@section("content")
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        @include("alert_message")
                        <div class="card">
                            <form class="needs-validation" novalidate="" action="{{ route("panel.store") }}"
                                  method="post">
                                @csrf
                                <div class="card-header">
                                    <h4>Create Panel</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Program or Organization Name</label>
                                        <input type="text" class="form-control" name="org_name" required="">
                                        <div class="invalid-feedback">
                                            What's Program or Organization Name name?
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Purpose</label>
                                        <textarea class="form-control" id="" name="purpose" cols="30"
                                                  rows="10"></textarea>
                                        <div class="invalid-feedback">
                                            What's Program or Organization Name name?
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label>Number of Poster</label>
                                            <input type="number" name="poster" class="form-control">
                                            <div class="valid-feedback">
                                                Good job!
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Number of Sub Program or Program</label>
                                            <input type="number" name="sub_program" class="form-control">
                                            <div class="valid-feedback">
                                                Good job!
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <label>Number of Participant</label>
                                            <input type="number" name="participant" class="form-control">
                                            <div class="valid-feedback">
                                                Good job!
                                            </div>
                                        </div>


                                    </div>


                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label>Number of Supervisor</label>
                                            <input type="number" name="noofsupervisor" class="form-control">
                                            <div class="valid-feedback">
                                                Good job!
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Number of Judges</label>
                                            <input type="number" name="judges" class="form-control">
                                            <div class="valid-feedback">
                                                Good job!
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Number of SubAdmins</label>
                                            <input type="number" name="subadmin" class="form-control">
                                            <div class="valid-feedback">
                                                Good job!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label>Payment Status</label>
                                            <select class="form-control" name="p_status">
                                                <option value="Paid">Paid</option>
                                                <option value="No Paid">Non Paid</option>
                                            </select>
                                            <div class="valid-feedback">
                                                Good job!
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Payment Method</label>
                                            <select name="p_method" class="form-control">
                                                <option value="Bkash">Bkash</option>
                                            </select>
                                            <div class="valid-feedback">
                                                Good job!
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>TxID</label>
                                            <input type="text" name="txid" class="form-control" disabled>
                                            <div class="valid-feedback">
                                                Good job!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label>Assign Sub Admin</label>
                                            <select class="form-control" name="assign_subadmin">
                                                <option value="">Select One</option>
                                                @if(!empty($conveners))
                                                    @foreach($conveners as $value)
                                                        <option value="{{$value["id"]}}">{{$value["name"]}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <div class="valid-feedback">
                                                Good job!
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <input type="checkbox" id="status" name="status">
                                            <label for="status">Status</label>
                                        </div>
                                    </div>

                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
