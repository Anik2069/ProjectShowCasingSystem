@extends("public.master")
@section("content")
    <div class="wm-mini-header">
        <span class="wm-blue-transparent"></span>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wm-mini-title">
                        <h1>Our Project Idea</h1>
                    </div>
                    <div class="wm-breadcrumb">
                        <ul>
                            <li><a href="index-2.html">Home</a></li>
                            <li><a href="index-2.html">Prject Idea</a></li>
                            <li>List</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wm-main-content">

        <!--// Main Section \\-->
        <div class="wm-main-section">
            <div class="container">
                <div class="row">

                    <aside class="col-md-3">
                        <div class="widget wm-search-course">
                            <h3 class="wm-short-title wm-color">Find Your Project Idea</h3>
                            <p>Find your Project Idea here:</p>
                            <form>
                                <ul>
                                    <li>
                                        <div class="wm-radio">
                                            <div class="wm-radio-partition">
                                                <input id="male" type="radio" name="gender" value="male">
                                                <label for="male">by ID</label>
                                            </div>
                                            <div class="wm-radio-partition">
                                                <input id="female" type="radio" name="gender" value="female">
                                                <label for="female">by name</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <input type="text" value="Course Name"
                                               onblur="if(this.value == '') { this.value ='Course Name'; }"
                                               onfocus="if(this.value =='Course Name') { this.value = ''; }"> <i
                                            class="wmicon-search"></i></li>
                                    <li>
                                        <div class="wm-apply-select">
                                            <select>
                                                <option>Category</option>
                                                <option>Category</option>
                                                <option>Category</option>
                                                <option>Category</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li><input type="submit" value="Search course"></li>
                                </ul>
                            </form>
                        </div>
                    </aside>

                    <div class="col-md-9">
                        <div class="wm-courses wm-courses-popular wm-courses-mediumsec">
                            <ul class="row">
                                @if(!empty($report_Data))
                                    @foreach($report_Data as $data)
                                        <li class="col-md-12">
                                            <div class="wm-courses-popular-wrap">
                                                <figure><a href="/idea_details/{{$data->student_id}}/{{ $data-> program_id  }}"><img
                                                            src="{{ asset("assets/public/extra-images/papular-courses-1.jpg") }}"
                                                            alt=""> <span
                                                            class="wm-popular-hover"> <small>See Details</small> </span>
                                                    </a>
                                                    <figcaption>
                                                        <img src="extra-images/papular-courses-thumb-1.jpg" alt="">
                                                        <h6><a href="#">

                                                            </a></h6>
                                                    </figcaption>
                                                </figure>
                                                <div class="wm-popular-courses-text">
                                                    <h6><a href="#">{{ $data->project_name }}</a></h6>
                                                    <p>{{ $data->description }}</p>

                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif

                            </ul>
                        </div>
                        <div class="wm-pagination">

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--// Main Section \\-->

    </div>
@endsection
