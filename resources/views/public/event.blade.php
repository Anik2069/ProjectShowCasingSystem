@extends("public.master")

@section("content")

    <div class="wm-mini-header">
        <span class="wm-blue-transparent"></span>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wm-mini-title">
                        <h1>Our Programs</h1>
                    </div>
                    <div class="wm-breadcrumb">
                        <ul>
                            <li><a href="index-2.html">Home</a></li>
                            <li>Our Programs</li>
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

                    <div class="col-md-12">
                        <div class="wm-filterable-link">
                            <ul>
                                <li><a id="today" onclick="getProgramInfo(this)" data-type="1" class="active">Today's
                                        Program's</a></li>
                                <li><a id="upcoming" onclick="getProgramInfo(this)" data-type="2" class="">Upcoming
                                        Program's</a></li>
                                <li><a id="expired" onclick="getProgramInfo(this)" data-type="3" class="">Expired
                                        Program's</a></li>
                            </ul>
                        </div>
                        <div class="wm-event wm-latest-event wm-filter-event" id="load_data">
                            @include("public.event_list")
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

    <script>
        function getProgramInfo(element) {
            $(element).addClass("active");
            var data_type = $(element).attr("data-type");
            if (data_type == 2) {
                $("#today").removeClass("active");
                $("#expired").removeClass("active");
            } else if (data_type == 1) {
                $("#upcoming").removeClass("active");
                $("#expired").removeClass("active");
            } else if (data_type == 3) {
                $("#today").removeClass("active");
                $("#upcoming").removeClass("active");
            }
            $.ajax({
                url: '/getProgramInfo',
                data: { data_type:data_type },
                type: 'get',
                success: function (data) {
                    //alert("Criteria Added !!!!");
                    $("#load_data").html(data);

                }
            });

        }
    </script>
@endsection
