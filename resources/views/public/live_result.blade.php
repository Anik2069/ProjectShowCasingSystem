@extends("public.master")

@section("content")
    <div class="wm-mini-header">
        <span class="wm-blue-transparent"></span>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wm-mini-title">
                        <h1>Live Result</h1>
                    </div>
                    <div class="wm-breadcrumb">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Mini Header \\-->

    <!--// Main Content \\-->
    <div class="wm-main-content">

        <!--// Main Section \\-->
        <div class="wm-main-section">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        {{--   <figure class="wm-event-countdown"><img src="{{ asset("assets/public/extra-images/event-detail-1.jpg") }}" alt="">

                           </figure>--}}
                    </div>
                    <div class="col-md-9">
                        <!--// Editore \\-->
                        <div class="wm-detail-editore wm-custom-space">
                            <h3>{{$programDetails->program_name}}</h3>
                            <img class="wm-sharethumb" src="extra-images/share-img.png" alt="">
                            <p>{{$programDetails->purpose}}</p>

                        </div>
                        <div class="wm-section-title-two"><h2>Live <span>Result</span></h2></div>
                        <div class="wm-event-register-list">
                            <div class="event-register-wrap">
                                <div class="table table-responsive event-register-inner">
                                    <table class="table-responsive ">
                                        <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Participant</th>
                                            <th>Project Name</th>
                                            <th>Supervisor Name</th>
                                            <th>Result</th>
                                            <th>Action</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @if(!empty($student))
                                            @foreach($student as $stu)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{$stu->name}}</td>
                                                    <td>{{$stu->project_name}}</td>
                                                    <td>{{$stu->members_name}}</td>
                                                    <td>{{ isset($marks_array[$stu->program_id][$stu->id])? $marks_array[$stu->program_id][$stu->id] : "0" }}</td>
                                                    <td>
                                                        <a href="/student_profile/{{ $stu->id }}/{{ $stu->program_id }}/{{ $stu->user_no_fk }}" class="btn btn-info"> Details</a>
                                                    </td>
                                                </tr>

                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>


                                    {{--   <ul class="wm-title-list">
                                           <li>Ranking</li>
                                           <li>Participant</li>
                                           <li>Project Name</li>
                                           <li>Supervisor Name</li>
                                           <li>Result</li>
                                           <li>Action</li>
                                       </ul>
                                       <ul class="wm-simple-list">
                                           <li>Package 1</li>
                                           <li>Jan 20, 2016</li>
                                           <li>$20.99</li>
                                           <li>$1.99</li>
                                           <li>
                                               <button id="wm-dec"><i class="fa fa-caret-left"></i></button>
                                               <input type="text" name="qty" value="0">
                                               <button id="wm-inc"><i class="fa fa-caret-right"></i></button>
                                           </li>
                                           <li>111</li>
                                       </ul>--}}
                                </div>

                            </div>
                        </div>
                        <!--// Register Now \\-->
                        <!--// Related Events \\-->
                        <!--// Related Events \\-->
                    </div>
                    <aside class="col-md-3">
                        <div class="wm-event-options">
                            <ul>
                                <li>
                                    <img
                                        src="data:image/png;base64,{{DNS1D::getBarcodePNG($programDetails->id, 'C39')}}"
                                        alt="barcode"/><br>
                                    <small >Program Code: {{ $programDetails->id }} </small>
                                </li>
                                <li>
                                    <i class="wmicon-time2"></i>
                                    <span>Date:</span>
                                    <p>{{ date("d M,Y",strtotime($programDetails->program_date)) }}</p>
                                </li>
                                <li>
                                    <i class="wmicon-clock2"></i>
                                    <span>Registration Date:</span>
                                    <p>{{ date("d M,Y",strtotime($programDetails->lastDateOfRegistration)) }}</p>
                                </li>
                                <li>
                                    <i class="wmicon-location"></i>
                                    <span>Available Seats:</span>
                                    <p>{{ $programDetails->no_of_student }}</p>
                                </li>
                                <li>
                                    <i class="fa fa-folder-open-o"></i>
                                    <span>Number of Judges</span>
                                    <p>{{ $programDetails->no_of_judges }}</p>
                                </li>


                            </ul>
                        </div>

                    </aside>

                </div>
            </div>
        </div>
        <!--// Main Section \\-->

    </div>
@endsection
