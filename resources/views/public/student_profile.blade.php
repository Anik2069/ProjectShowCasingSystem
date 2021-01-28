@extends("public.master")

@section("content")
<div class="wm-mini-header">
    <span class="wm-blue-transparent"></span>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wm-mini-title">
                    <h1>Student Profile</h1>
                </div>
                <div class="wm-breadcrumb">
                    <ul>
                        <li><a href="index-2.html">Home</a></li>
                        <li><a href="#">Student Profile</a></li>
                        <li>Profile</li>
                    </ul>
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
                <aside class="col-md-4">
                    <div class="wm-student-dashboard-nav">
                        <div class="wm-student-nav">
                            <figure>
                                <a href="#"><img src="{{ asset("assets/img/student.jpg") }}" alt=""></a>
                            </figure>
                            <div class="wm-student-nav-text">
                                <h6>{{ $student_info->name }}</h6>

                            </div>
                         {{--   <ul>
                                <li class="active">
                                    <a href="#">
                                        <i class="wmicon-avatar"></i>
                                        Profile Details
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="wmicon-book"></i>
                                        My Courses
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="wmicon-favorite"></i>
                                        Favorites
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="wmicon-paper"></i>
                                        Statement
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="wmicon-three"></i>
                                        Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="wmicon-arrow"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>--}}
                        </div>
                    </div>
                </aside>
                <div class="col-md-8">
                    <div class="wm-student-profile-info">
                        <div class="wm-student-dashboard-profile">
                            <div class="wm-plane-title">
                                <h2>About </h2>
                            </div>
                            <ul class="row">
                                <li class="col-md-4">
                                    <div class="wm-student-profile">
                                        <a class=wm-circle-icon href="#"><i class="wmicon-technology4"></i></a>
                                        <div class="wm-student-profile-text">
                                            <span>Phone:</span>
                                            <a href="#">{{  $student_info->phone }}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-md-4">
                                    <div class="wm-student-profile">
                                        <a class=wm-circle-icon href="#"><i class="wmicon-web2"></i></a>
                                        <div class="wm-student-profile-text">
                                            <span>Email:</span>
                                            <a href="#">{{  $student_info->email }}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-md-4">
                                    <div class="wm-student-profile">
                                        <a class=wm-circle-icon href="#"><i class="fa fa-graduation-cap"></i></a>
                                        <div class="wm-student-profile-text">
                                            <span>Institution:</span>
                                            <a href="#">{{  $student_info->institution }}</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <p>Becoming a student requires more than a test score. To “be student” requires
                                persistence. And passion. And a desire to give back. It doesn’t matter whether
                                you’re the first in your family to attend college or you’re the latest in a long
                                tradition of educational excellence: You stand up and you stand out.</p>
                        </div>
                        <div class="wm-profile-info">
                            <div class="wm-title-full">
                                <h5>Projects Details</h5>
                            </div>
                            <div class="wm-article">
                                <h4>{{ $project_info->project_name }}</h4>
                                <p>{{ $project_info->description }}</p>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Main Section \\-->

    <!--// Main Section \\-->
</div>
<!--// Main Content \\-->
@endsection
