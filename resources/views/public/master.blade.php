<!DOCTYPE html>
<html lang="en">

<!-- index18:21  -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Daffodil International University</title>

    <!-- Css Files -->
    <link href="{{ asset("assets/public/css/bootstrap.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/public/css/font-awesome.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/public/css/flaticon.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/public/css/slick-slider.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/public/css/prettyphoto.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/public/build/mediaelementplayer.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/public/style.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/public/css/color.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/public/css/color-two.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/public/css/color-three.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/public/css/color-four.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/public/css/responsive.css") }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!--// Main Wrapper \\-->
<div class="wm-main-wrapper">

    <!--// Header \\-->
    <header id="wm-header" class="wm-header-one">

        <!--// TopStrip \\-->
        <div class="wm-topstrip">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wm-language">
                            <ul>
                                <li><a href="/">English</a></li>

                            </ul>
                        </div>
                        <ul class="wm-stripinfo">
                            <li><i class="wmicon-location"></i> Dhanmondi, Dhaka</li>
                            <li><i class="wmicon-technology4"></i> +01687893691</li>
                            <li><i class="wmicon-clock2"></i> Mon - fri: 7:00am - 6:00pm</li>
                        </ul>
                        <ul class="wm-adminuser-section">
                            <li>
                                <a href="#" data-toggle="modal" data-target="#ModalLogin">login</a>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                            <li>
                                <a href="#" class="wm-search-btn" data-toggle="modal" data-target="#ModalSearch"><i
                                        class="wmicon-search"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--// TopStrip \\-->

        <!--// MainHeader \\-->
       @include("public.nav")
        <!--// MainHeader \\-->

    </header>

    @yield("content")

    <footer id="wm-footer" class="wm-footer-one">

        <!--// FooterNewsLatter \\-->
        <div class="wm-footer-newslatter">
            {{--<div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form>
                            <i class="wmicon-interface2"></i>
                            <input type="text" value="Enter your e-mail address"
                                   onblur="if(this.value == '') { this.value ='Enter your e-mail address'; }"
                                   onfocus="if(this.value =='Enter your e-mail address') { this.value = ''; }">
                            <input type="submit" value="Subscribe to our newsletter">
                        </form>
                    </div>
                </div>
            </div>--}}
        </div>
        <!--// FooterNewsLatter \\-->

        <!--// FooterWidgets \\-->
        <div class="wm-footer-widget">
            <div class="container">

            </div>
        </div>
        <!--// FooterWidgets \\-->

        <!--// FooterCopyRight \\-->
        <div class="wm-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6"><span><i class="wmicon-nature"></i> </span></div>
                    <div class="col-md-6"><p><a target="_blank" href="https://www.templateshub.net">DIU</a>
                        </p></div>
                </div>
            </div>
        </div>
        <!--// FooterCopyRight \\-->

    </footer>
    <!--// Footer \\-->

    <div class="clearfix"></div>
</div>
<!--// Main Wrapper \\-->

<!-- ModalLogin Box -->

@if(!empty($program))
    @foreach($program as $value)
        <div class="modal fade" id="ModalLogin{{$value->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">


                        <div class="wm-modallogin-form wm-login-popup">
                            <span class="wm-color">Make A Registration For this Course</span>
                            <form method="post" action="{{route("project_idea")}}" >
                                @csrf
                                <ul>
                                    <li>Project Information</li>
                                    <input type="hidden" name="program_id" value="{{ $value->id }}">
                                    <li><input type="text" name=""  placeholder="Project Name" value=" {{$value->program_name}}" disabled></li>
                                    <li><input type="text" name="p_name"  placeholder="Project Name"></li>
                                    <li>
                                        <textarea name="p_description" id="" cols="20" rows="8" class="form-control"></textarea>
                                    </li>
                                    <li><button type="submit" id="register" class="btn btn-success">Register</button></li>
                                </ul>
                            </form>

                            {{-- <p>Already a member? <a href="#">Sign-in Here!</a></p>--}}
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    @endforeach
@endif
<!-- ModalLogin Box -->

<!-- ModalSearch Box -->
<div class="modal fade" id="ModalSearch" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="wm-modallogin-form">
                    <span class="wm-color">Search Your KeyWord</span>
                    <form>
                        <ul>
                            <li><input type="text" value="Keywords..."
                                       onblur="if(this.value == '') { this.value ='Keywords...'; }"
                                       onfocus="if(this.value =='Keywords...') { this.value = ''; }"></li>
                            <li><input type="submit" value="Search"></li>
                        </ul>
                    </form>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- ModalSearch Box -->
<script>
    function storeStudent(element){
        var post_id = $("#"+element).attr("data-element");
        var data = $("#student_form"+post_id).serialize();
        //   var formData = new form
        var respondUrl = $("#student_form"+post_id).attr('action');


        $.ajax({
            url: respondUrl,
            data: data,
            type: 'POST',
            success: function (data) {
                // do something with the result
                alert("Good job! Registration Done", "Submitted!", "success");
                $('#ModalLogin'+post_id).modal('hide');
                /* window.location.reload();*/
            }
        });



    }
</script>
<!-- jQuery (necessary for JavaScript plugins) -->
<script type="text/javascript" src="{{asset("assets/public/script/jquery.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/public/script/modernizr.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/public/script/bootstrap.min.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/public/script/jquery.prettyphoto.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/public/script/jquery.countdown.min.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/public/script/fitvideo.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/public/script/skills.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/public/script/slick.slider.min.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/public/script/waypoints-min.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/public/build/mediaelement-and-player.min.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/public/script/isotope.min.js")}}"></script>
<script type="text/javascript" src="s{{asset("assets/public/cript/jquery.nicescroll.min.js")}}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript" src="{{asset("assets/public/script/functions.js")}}"></script>

</body>

<!-- index18:22  -->
</html>
