<div class="wm-main-header">
    <div class="" style="margin-left: 131px;">
        <div class="row">
            <div class="col-md-3"><a href="/" class="wm-logo"><img
                        src="{{asset("assets/public/images/diu.png")}}"
                        alt=""></a></div>
            <div class="col-md-9">
                <!--// Navigation \\-->
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar-collapse-1" aria-expanded="true">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/">Home</a>
                            </li>
                            <li class="active"><a href="{{ route("public.programList") }}">Program List</a>
                            </li>
                            <li class="active"><a href="/result">Result</a>
                            </li>
                            <li class="active"><a href="{{ route("projectIdea") }}">Project Idea</a>
                            </li>
                            <li class="active"><a href="{{ route("login") }}">Login</a>
                            </li>
                            <li class="active"><a href="{{ route("registration") }}">Registration</a>
                            </li>

                            <li class="wm-megamenu-li"><a href="{{ route("contactus.index") }}">Contact</a>
                                <ul class="wm-megamenu">
                                    <li class="row">
                                        <div class="col-md-2">
                                            <h4>Links 1</h4>
                                            <ul class="wm-megalist">
                                                <li><a href="contact-us.html">Contact Us</a></li>
                                                <li><a href="404-page.html">404 Error Page</a></li>
                                                <li><a href="shop-list.html">Shop List</a></li>
                                                <li><a href="shop-grid.html">Shop Grid</a></li>
                                                <li><a href="shop-single-product.html">Shop Detail</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-5">
                                            <h4>Artists text</h4>
                                            <div class="wm-mega-text">
                                                <p>Your work is going to fill a large part of your life, and the
                                                    only way to be truly satisfied is to do what you believe is
                                                    great work. And the only way to do great work is to
                                                    love.</p>
                                                <p>If you haven't found it yet, keep looking. Don't settle. As
                                                    with all matters of the heart, you'll know when you find
                                                    it.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <h4>sub category widget</h4>
                                            <a href="#" class="wm-thumbnail">
                                                <img src="extra-images/mega-menuadd.jpg" alt=""/>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!--// Navigation \\-->

            </div>
        </div>
    </div>
</div>
