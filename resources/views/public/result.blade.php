@extends("public.master")

@section("content")
    <div class="wm-mini-header">
        <span class="wm-blue-transparent"></span>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wm-mini-title">
                        <h1>Live Program List</h1>
                    </div>
                    <div class="wm-breadcrumb">
                        <ul>
                            <li><a href="index-2.html">Home</a></li>
                            <li><a href="index-2.html">Program List</a></li>
                            <li>List</li>
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

                    <div class="col-md-12">
                        <div class="wm-courses wm-courses-popular wm-courses-mediumsec">
                            <ul class="row">
                                @if(!empty($program))
                                    @foreach($program as $pro)
                                        <li class="col-md-12">
                                            <div class="wm-courses-popular-wrap">
                                                <figure><a href="/gotolive/{{ $pro->id  }}/{{  $pro->program_name }}"><img src="{{ asset("uploads/banner/".$pro->image) }}"
                                                                         alt=""> <span
                                                            class="wm-popular-hover"> <small>See Live Result</small> </span>
                                                    </a>
                                                    <figcaption>
                                                        <img src="extra-images/papular-courses-thumb-1.jpg" alt="">
                                                        <h6><a href="#">Shelly T. Forrester</a></h6>
                                                    </figcaption>
                                                </figure>
                                                <div class="wm-popular-courses-text">
                                                    <h6><a href="#">{{  $pro->program_name }}</a></h6>
                                                    <p>{{ $pro->purpose }}</p>
                                                    <div class="wm-courses-price"><span>    </span></div>
                                                 {{--   <ul>
                                                        <li><a href="#" class="wm-color"><i class="wmicon-social7"></i>
                                                                342</a>
                                                        </li>
                                                        <li><a href="#" class="wm-color"><i class="wmicon-social6"></i>
                                                                10</a>
                                                        </li>
                                                        <li><a href="#" class="wm-color"><i class="wmicon-time2"></i> 1
                                                                year</a>
                                                        </li>
                                                        <li><a href="#" class="wm-color"><i class="wmicon-location"></i>
                                                                Campus
                                                                L2</a></li>
                                                    </ul>--}}
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif


                            </ul>
                        </div>
                        <div class="wm-pagination">
                            <ul>
                                <li><a href="#" aria-label="Previous"> <i class="wmicon-arrows4"></i> Previous</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li>...</li>
                                <li><a href="#">18</a></li>
                                <li><a href="#" aria-label="Next"> <i class="wmicon-arrows4"></i> Next</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--// Main Section \\-->

    </div>
@endsection
