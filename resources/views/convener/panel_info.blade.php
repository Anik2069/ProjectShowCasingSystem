@extends("convener.master")

@section("content")
    <div class="main-content" style="min-height: 655px;">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Basic DataTables</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="table-1_wrapper"
                                         class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="table-1_length"><label>Show <select
                                                            name="table-1_length" aria-controls="table-1"
                                                            class="form-control form-control-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> entries</label></div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div id="table-1_filter" class="dataTables_filter"><label>Search:<input
                                                            type="search" class="form-control form-control-sm"
                                                            placeholder="" aria-controls="table-1"></label></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-striped dataTable no-footer" id="table-1"
                                                       role="grid" aria-describedby="table-1_info">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="text-center sorting_asc" tabindex="0"
                                                            aria-controls="table-1" rowspan="1" colspan="1"
                                                            style="width: 35.9167px;" aria-sort="ascending" aria-label="
                              #
                            : activate to sort column descending">
                                                            #
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="table-1"
                                                            rowspan="1" colspan="1" style="width: 182.117px;"
                                                            aria-label="Task Name: activate to sort column ascending">
                                                            Task Name
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 96.4833px;" aria-label="Progress">Progress
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 248.333px;" aria-label="Members">Members
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="table-1"
                                                            rowspan="1" colspan="1" style="width: 111.75px;"
                                                            aria-label="Due Date: activate to sort column ascending">Due
                                                            Date
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="table-1"
                                                            rowspan="1" colspan="1" style="width: 134.233px;"
                                                            aria-label="Status: activate to sort column ascending">
                                                            Status
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="table-1"
                                                            rowspan="1" colspan="1" style="width: 92.3667px;"
                                                            aria-label="Action: activate to sort column ascending">
                                                            Action
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>


                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            1
                                                        </td>
                                                        <td>Create a mobile app</td>
                                                        <td class="align-middle">
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar bg-success width-per-40">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img alt="image" src="assets/img/users/user-5.png"
                                                                 width="35">
                                                        </td>
                                                        <td>2018-01-20</td>
                                                        <td>
                                                            <div class="badge badge-success badge-shadow">Completed
                                                            </div>
                                                        </td>
                                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">
                                                            2
                                                        </td>
                                                        <td>Redesign homepage</td>
                                                        <td class="align-middle">
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar width-per-60"></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img alt="image" src="assets/img/users/user-1.png"
                                                                 width="35">
                                                            <img alt="image" src="assets/img/users/user-3.png"
                                                                 width="35">
                                                            <img alt="image" src="assets/img/users/user-4.png"
                                                                 width="35">
                                                        </td>
                                                        <td>2018-04-10</td>
                                                        <td>
                                                            <div class="badge badge-info badge-shadow">Todo</div>
                                                        </td>
                                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            3
                                                        </td>
                                                        <td>Backup database</td>
                                                        <td class="align-middle">
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar bg-warning width-per-70"></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img alt="image" src="assets/img/users/user-1.png"
                                                                 width="35">
                                                            <img alt="image" src="assets/img/users/user-2.png"
                                                                 width="35">
                                                        </td>
                                                        <td>2018-01-29</td>
                                                        <td>
                                                            <div class="badge badge-warning badge-shadow">In Progress
                                                            </div>
                                                        </td>
                                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">
                                                            4
                                                        </td>
                                                        <td>Input data</td>
                                                        <td class="align-middle">
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar bg-success width-per-90"></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img alt="image" src="assets/img/users/user-2.png"
                                                                 width="35">
                                                            <img alt="image" src="assets/img/users/user-5.png"
                                                                 width="35">
                                                            <img alt="image" src="assets/img/users/user-4.png"
                                                                 width="35">
                                                            <img alt="image" src="assets/img/users/user-1.png"
                                                                 width="35">
                                                        </td>
                                                        <td>2018-01-16</td>
                                                        <td>
                                                            <div class="badge badge-success badge-shadow">Completed
                                                            </div>
                                                        </td>
                                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            5
                                                        </td>
                                                        <td>Create a mobile app</td>
                                                        <td class="align-middle">
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar bg-success width-per-40">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img alt="image" src="assets/img/users/user-5.png"
                                                                 width="35">
                                                        </td>
                                                        <td>2018-01-20</td>
                                                        <td>
                                                            <div class="badge badge-success badge-shadow">Completed
                                                            </div>
                                                        </td>
                                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">
                                                            6
                                                        </td>
                                                        <td>Redesign homepage</td>
                                                        <td class="align-middle">
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar width-per-60"></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img alt="image" src="assets/img/users/user-1.png"
                                                                 width="35">
                                                            <img alt="image" src="assets/img/users/user-3.png"
                                                                 width="35">
                                                            <img alt="image" src="assets/img/users/user-4.png"
                                                                 width="35">
                                                        </td>
                                                        <td>2018-04-10</td>
                                                        <td>
                                                            <div class="badge badge-info badge-shadow">Todo</div>
                                                        </td>
                                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            7
                                                        </td>
                                                        <td>Backup database</td>
                                                        <td class="align-middle">
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar bg-warning width-per-70"></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img alt="image" src="assets/img/users/user-1.png"
                                                                 width="35">
                                                            <img alt="image" src="assets/img/users/user-2.png"
                                                                 width="35">
                                                        </td>
                                                        <td>2018-01-29</td>
                                                        <td>
                                                            <div class="badge badge-warning badge-shadow">In Progress
                                                            </div>
                                                        </td>
                                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">
                                                            8
                                                        </td>
                                                        <td>Input data</td>
                                                        <td class="align-middle">
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar bg-success width-per-90"></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img alt="image" src="assets/img/users/user-2.png"
                                                                 width="35">
                                                            <img alt="image" src="assets/img/users/user-5.png"
                                                                 width="35">
                                                            <img alt="image" src="assets/img/users/user-4.png"
                                                                 width="35">
                                                            <img alt="image" src="assets/img/users/user-1.png"
                                                                 width="35">
                                                        </td>
                                                        <td>2018-01-16</td>
                                                        <td>
                                                            <div class="badge badge-success badge-shadow">Completed
                                                            </div>
                                                        </td>
                                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            9
                                                        </td>
                                                        <td>Create a mobile app</td>
                                                        <td class="align-middle">
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar bg-success width-per-40">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img alt="image" src="assets/img/users/user-5.png"
                                                                 width="35">
                                                        </td>
                                                        <td>2018-01-20</td>
                                                        <td>
                                                            <div class="badge badge-success badge-shadow">Completed
                                                            </div>
                                                        </td>
                                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">
                                                            10
                                                        </td>
                                                        <td>Redesign homepage</td>
                                                        <td class="align-middle">
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar width-per-60"></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img alt="image" src="assets/img/users/user-1.png"
                                                                 width="35">
                                                            <img alt="image" src="assets/img/users/user-3.png"
                                                                 width="35">
                                                            <img alt="image" src="assets/img/users/user-4.png"
                                                                 width="35">
                                                        </td>
                                                        <td>2018-04-10</td>
                                                        <td>
                                                            <div class="badge badge-info badge-shadow">Todo</div>
                                                        </td>
                                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info" id="table-1_info" role="status"
                                                     aria-live="polite">Showing 1 to 10 of 12 entries
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="dataTables_paginate paging_simple_numbers"
                                                     id="table-1_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled"
                                                            id="table-1_previous"><a href="#" aria-controls="table-1"
                                                                                     data-dt-idx="0" tabindex="0"
                                                                                     class="page-link">Previous</a></li>
                                                        <li class="paginate_button page-item active"><a href="#"
                                                                                                        aria-controls="table-1"
                                                                                                        data-dt-idx="1"
                                                                                                        tabindex="0"
                                                                                                        class="page-link">1</a>
                                                        </li>
                                                        <li class="paginate_button page-item "><a href="#"
                                                                                                  aria-controls="table-1"
                                                                                                  data-dt-idx="2"
                                                                                                  tabindex="0"
                                                                                                  class="page-link">2</a>
                                                        </li>
                                                        <li class="paginate_button page-item next" id="table-1_next"><a
                                                                href="#" aria-controls="table-1" data-dt-idx="3"
                                                                tabindex="0" class="page-link">Next</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
            <div class="settingSidebar-body ps-container ps-theme-default"
                 style="overflow: hidden; outline: currentcolor none medium;" tabindex="2">
                <div class=" fade show active">
                    <div class="setting-panel-header">Setting Panel
                    </div>
                    <div class="p-15 border-bottom">
                        <h6 class="font-medium m-b-10">Select Layout</h6>
                        <div class="selectgroup layout-color w-50">
                            <label class="selectgroup-item">
                                <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout"
                                       checked="">
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
                                       checked="">
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
            <div id="ascrail2001" class="nicescroll-rails nicescroll-rails-vr"
                 style="width: 8px; z-index: 999; cursor: default; position: absolute; top: 0px; left: 272px; height: 520px; display: block; opacity: 0;">
                <div
                    style="position: relative; top: 0px; float: right; width: 6px; height: 443px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;"
                    class="nicescroll-cursors"></div>
            </div>
            <div id="ascrail2001-hr" class="nicescroll-rails nicescroll-rails-hr"
                 style="height: 8px; z-index: 999; top: 512px; left: 0px; position: absolute; cursor: default; display: none; width: 272px; opacity: 0;">
                <div
                    style="position: absolute; top: 0px; height: 6px; width: 280px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px; left: 0px;"
                    class="nicescroll-cursors"></div>
            </div>
        </div>
    </div>
@endsection
<script src="../../assets/bundles/datatables/datatables.min.js"></script>
<script src="../../assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/js/page/datatables.js"></script>
