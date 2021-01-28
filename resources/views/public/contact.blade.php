@extends("public.master")
@section("content")
    <div class="wm-mini-header">
        <span class="wm-blue-transparent"></span>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wm-mini-title">
                        <h1>Contact Us</h1>
                    </div>
                    <div class="wm-breadcrumb">
                        <ul>
                            <li><a href="index-2.html">Home</a></li>
                            <li>Contact Us</li>
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
        <div class="wm-main-section wm-contact-full wm-contact-full-inner">
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
                                            <div class="">

                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.7885564297044!2d90.37417781491901!3d23.754918384587246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8ada2664e21%3A0x3c872fd17bc11ddb!2sDaffodil%20International%20University%20(DIU)!5e0!3m2!1sen!2sbd!4v1611853702159!5m2!1sen!2sbd"
                                                    width="600" height="450" frameborder="0" style="border:0;"
                                                    allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="wm-contact-form">
                                                <span>Talk To Us Today</span>
                                                @if ($message = Session::get('success'))
                                                    <div class="alert alert-success alert-block">
                                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @endif
                                                <form action="{{ route("contactus.store") }}" method="post">
                                                    @csrf
                                                    <ul>
                                                        <li>
                                                            <i class="wmicon-black"></i>
                                                            <input type="text" placeholder="Name" name="name" >
                                                        </li>
                                                        <li>
                                                            <i class="wmicon-symbol3"></i>
                                                            <input type="text" placeholder="E-mail"
                                                                 name="email">
                                                        </li>
                                                        <li>
                                                            <i class="wmicon-technology4"></i>
                                                            <input type="text" placeholder="Phone" name="phone" >
                                                        </li>
                                                        <li>
                                                            <i class="wmicon-web2"></i>
                                                            <textarea placeholder="Message" name="message"></textarea>
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
    <!--// Main Content \\-->
@endsection
