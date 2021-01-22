@extends("public.master")
@section("content")
    <div class="wm-main-banner">

        <div class="wm-banner-one">
            <div class="wm-banner-one-for">
                @if(!empty($program))
                    @foreach($program as $value)
                        <div class="wm-banner-one-for-layer"><img src="uploads/banner/{{$value->image}}"
                                                                  alt=""></div>
                    @endforeach
                @endif

            </div>
            <div class="wm-banner-one-nav">
                @if(!empty($program))
                    @foreach($program as $value)
                        <div class="wm-banner-one-nav-layer">
                            <h1>{{$value->program_name}}</h1>
                            <p>{{$value->purpose}}</p>
                            <a href="#" class="wm-banner-btn" data-toggle="modal"
                               data-target="#ModalLogin{{$value->id}}">Registrer
                                Now !!!!!</a>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>

    </div>
    <!--// Main Banner \\-->

    <!--// Main Content \\-->
    <div class="wm-main-content">
        <div class="wm-main-section wm-courses-popular-full">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="wm-fancy-title"><h2>Latest <span>program</span></h2></div>
                        <div class="wm-courses wm-courses-popular">
                            <ul class="row">
                                @if(!empty($program))
                                    @foreach($program as $value)
                                        <li class="col-md-3">
                                            <div class="wm-courses-popular-wrap">
                                                <figure><a href="#"><img
                                                            src="uploads/banner/{{$value->image}}"
                                                            alt="">
                                                        <span
                                                            class="wm-popular-hover"> <small>Register Now</small> </span>
                                                    </a>
                                                    <figcaption>
                                                        <img
                                                            src="{{"assets"}}/public/extra-images/papular-courses-thumb-1.jpg"
                                                            alt="">
                                                        <h6><a href="#">{{ $value->org_name }}</a></h6>
                                                    </figcaption>
                                                </figure>
                                                <div class="wm-popular-courses-text">
                                                    <h6><a href="#">{{$value->program_name}}</a></h6>
                                                    <div class="wm-courses-price"><span></span></div>
                                                    <ul>
                                                        <li><a href="#" class="wm-color" title="Number of Total Registration"><i class="wmicon-social7" ></i>
                                                                {{$value->no_of_student}}</a>
                                                        </li>
                                                        <li><a href="#" class="wm-color" title="Judges Number"><i class="wmicon-social6" ></i>
                                                                {{$value->no_of_judges}}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--// Main Section \\-->
        <div class="wm-main-section">
            <div class="container">
                <div class="row">

                    <div class="col-md-4">
                        <div class="wm-search-course">
                            <h3 class="wm-short-title wm-color">Be a Participant</h3>
                            <p>Find a appropriate that match with you</p>
                            <form>
                                <ul>

                                    <li><input type="text" value="Idea Name"
                                               onblur="if(this.value == '') { this.value ='Course Name'; }"
                                               onfocus="if(this.value =='Course Name') { this.value = ''; }"> <i
                                            class="wmicon-search"></i></li>
                                    <li>
                                        <div class="wm-apply-select">
                                            <select>
                                                <option>Idea 1</option>
                                                <option>Idea 2</option>
                                                <option>Idea 3</option>
                                                <option>Idea 4</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li><input type="submit" value="Search IDea"></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="wm-service wm-box-service">
                            <ul>
                                <li>
                                    <div class="wm-box-service-wrap wm-bgcolor">
                                        <i class="wmicon-suitcase"></i>
                                        <h6><a href="#"></a></h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="wm-box-service-wrap wm-bgcolor">
                                        <i class="wmicon-money"></i>
                                        <h6><a href="#"></a></h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="wm-box-service-wrap wm-bgcolor">
                                        <i class="wmicon-school"></i>
                                        <h6><a href="#"></a></h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="wm-box-service-wrap wm-bgcolor">
                                        <i class="wmicon-science"></i>
                                        <h6><a href="#"></a></h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="wm-box-service-wrap wm-bgcolor">
                                        <i class="wmicon-computer"></i>
                                        <h6><a href="#"></a></h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="wm-box-service-wrap wm-bgcolor">
                                        <i class="wmicon-technology3"></i>
                                        <h6><a href="#"></a></h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="wm-box-service-wrap wm-bgcolor">
                                        <i class="wmicon-web3"></i>
                                        <h6><a href="#"></a></h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="wm-box-service-wrap wm-bgcolor">
                                        <i class="wmicon-shape"></i>
                                        <h6><a href="#"></a></h6>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--// Main Section \\-->

        <!--// Main Section \\-->

        <!--// Main Section \\-->

        <!--// Main Section \\-->
        <div class="wm-main-section wm-whychooseus-full">
            <div class="container">
                <div class="row">

                    <div class="col-md-8">
                        <div class="whychooseus-list">
                            <div class="wm-fancy-title"><h2>Why <span>Choose Us</span></h2></div>
                            <ul class="row">
                                <li class="col-md-4">
                                    <span>209</span>
                                    <h6>of our trainees have got a prestigious job</h6>
                                </li>
                                <li class="col-md-4">
                                    <span>91%</span>
                                    <h6>students have established successful business</h6>
                                </li>
                                <li class="col-md-4">
                                    <span>35%</span>
                                    <h6>have already earned their first million</h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="wm-questions-studying">
                            <img src="{{"assets"}}/public/extra-images/ask-questoin-bg.png" alt="">
                            <h3 class="wm-color">Questions about studying with us?</h3>
                            <p>We have a team of student advisers & officers to answer any questions:</p>
                            <a class="wm-banner-btn" href="#">ask us now</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--// Main Section \\-->

        <!--// Main Section \\-->

        <!--// Main Section \\-->

        <!--// Main Section \\-->

        <!--// Main Section \\-->

        <!--// Main Section \\-->
        <div class="wm-main-section wm-testimonial-full">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="wm-fancy-title"><h2>What <span>Clients Say</span></h2>
                            <p>Don't take our word for it, see what our awesome clients say.</p></div>
                        <div class="wm-testimonial-slider">
                            <div class="wm-testimonial-slider-wrap">
                                <p>I chose them because it gave me flexibility. I was working full-time at the same time
                                    I was studying, so the OU gave me that flexibility. Also my Dad, I’m Danish of
                                    origin.</p>
                                <figure>
                                    <a href="#" class="wm-testimonial-thumb"><img
                                            src="extra-images/testimonial-thumb-1.png" alt=""></a>
                                    <figcaption><h5><a href="#">Priya E. Abraham</a></h5> <span>Paris, France</span>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="wm-testimonial-slider-wrap">
                                <p>After completing the MBA study, I had the opportunity to join one of the leading
                                    business schools in the UK in the role of faculty member and senior consultant. I
                                    suppose without the MBA it would have been difficult to make that career step. The
                                    biggest challenge in studying with them.</p>
                                <figure>
                                    <a href="#" class="wm-testimonial-thumb"><img
                                            src="extra-images/testimonial-thumb-2.png" alt=""></a>
                                    <figcaption><h5><a href="#">Priya E. Abraham</a></h5> <span>Paris, France</span>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="wm-testimonial-slider-wrap">
                                <p>I chose them because it gave me flexibility. I was working full-time at the same time
                                    I was studying, so the OU gave me that flexibility. Also my Dad, I’m Danish of
                                    origin.</p>
                                <figure>
                                    <a href="#" class="wm-testimonial-thumb"><img
                                            src="extra-images/testimonial-thumb-1.png" alt=""></a>
                                    <figcaption><h5><a href="#">Priya E. Abraham</a></h5> <span>Paris, France</span>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="wm-testimonial-slider-wrap">
                                <p>After completing the MBA study, I had the opportunity to join one of the leading
                                    business schools in the UK in the role of faculty member and senior consultant. I
                                    suppose without the MBA it would have been difficult to make that career step. The
                                    biggest challenge in studying with them.</p>
                                <figure>
                                    <a href="#" class="wm-testimonial-thumb"><img
                                            src="extra-images/testimonial-thumb-2.png" alt=""></a>
                                    <figcaption><h5><a href="#">Priya E. Abraham</a></h5> <span>Paris, France</span>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--// Main Section \\-->

        <!--// Main Section \\-->
        <div class="wm-main-section wm-ourhistory-full">
            <span class="wm-light-transparent"></span>
            <div class="container">
                <div class="row">


                    <div class="col-md-12">
                        <div class="wm-subscribe-form">
                            <h2>Still not convinced? We can help you!</h2>
                            <p>Fill out the form below and we will contact you.</p>
                            <form>
                                <input type="text" value="Name:" onblur="if(this.value == '') { this.value ='Name:'; }"
                                       onfocus="if(this.value =='Name:') { this.value = ''; }">
                                <input type="email" value="E-mail:"
                                       onblur="if(this.value == '') { this.value ='E-mail:'; }"
                                       onfocus="if(this.value =='E-mail:') { this.value = ''; }">
                                <input type="submit" value="Get Advice">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--// Main Section \\-->

        <!--// Main Section \\-->

        <!--// Main Section \\-->

        <!--// Main Section \\-->

        <!--// Main Section \\-->

        <!--// Main Section \\-->
        <div class="wm-main-section wm-contact-full">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">

                        <div class="wm-contact-tab">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" aria-controls="home" data-toggle="tab">Contact Us</a>
                                </li>
                                <li><a href="#profile" aria-controls="profile" data-toggle="tab">Information Details</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="wm-map">
                                                <div id="map"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="wm-contact-form">
                                                <span>Talk To Us Today</span>
                                                <form>
                                                    <ul>
                                                        <li>
                                                            <i class="wmicon-black"></i>
                                                            <input type="text" value="Name"
                                                                   onblur="if(this.value == '') { this.value ='Name'; }"
                                                                   onfocus="if(this.value =='Name') { this.value = ''; }">
                                                        </li>
                                                        <li>
                                                            <i class="wmicon-symbol3"></i>
                                                            <input type="text" value="E-mail"
                                                                   onblur="if(this.value == '') { this.value ='E-mail'; }"
                                                                   onfocus="if(this.value =='E-mail') { this.value = ''; }">
                                                        </li>
                                                        <li>
                                                            <i class="wmicon-technology4"></i>
                                                            <input type="text" value="Phone"
                                                                   onblur="if(this.value == '') { this.value ='Phone'; }"
                                                                   onfocus="if(this.value =='Phone') { this.value = ''; }">
                                                        </li>
                                                        <li>
                                                            <i class="wmicon-web2"></i>
                                                            <textarea placeholder="Message"></textarea>
                                                        </li>
                                                        <li><input type="submit" value="Send Message"></li>
                                                    </ul>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile">
                                    <span class="wm-contact-title">Contact Info</span>
                                    <div class="wm-contact-service">
                                        <ul class="row">
                                            <li class="col-md-4">
                                                <span class="wm-service-icon"><i class="wmicon-pin"></i></span>
                                                <h5 class="wm-color">Address</h5>
                                                <p>195 Cooks Mine Road Espanola, NM 87532</p>
                                            </li>
                                            <li class="col-md-4">
                                                <span class="wm-service-icon"><i class="wmicon-phone"></i></span>
                                                <h5 class="wm-color">Phone & Fax</h5>
                                                <p>+1 505-753-5656 +1 505-753-4437</p>
                                            </li>
                                            <li class="col-md-4">
                                                <span class="wm-service-icon"><i class="wmicon-letter"></i></span>
                                                <h5 class="wm-color">E-mail</h5>
                                                <p><a href="mailto:name@email.com">Info@university.com</a> <a
                                                        href="mailto:name@email.com">support@university.com</a></p>
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="contact-social-icon">
                                        <li><a href="#"><i class="wm-color wmicon-social5"></i> Facebook</a></li>
                                        <li><a href="#"><i class="wm-color wmicon-social4"></i> Twitter</a></li>
                                        <li><a href="#"><i class="wm-color wmicon-social3"></i> Linkedin</a></li>
                                        <li><a href="#"><i class="wm-color wmicon-vimeo"></i> Vimeo</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--// Main Section \\-->

    </div>


@endsection
