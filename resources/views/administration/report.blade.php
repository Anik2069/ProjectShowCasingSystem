@extends("administration.master")
@section("content")
    <div class="main-content">

        <section class="section">
            <div class="section-body">
                <form class="" id="search_form"  method="post"> @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>From</label>
                                            <input type="date" name="date1" class="form-control">


                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>To</label>
                                            <input type="date" name="date2"  class="form-control">
                                        </div>


                                        <div class="card-footer float-right">
                                            <button type="button" onclick="searchReport()" name="submit" class="btn btn-primary">Go</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </section>
        <section class="section" id="searchData">
           @include("administration.report_data")
        </section>


    </div>

    <script>
        function searchReport() {
            $.ajax({
                url: '{{ route('searchReport') }}',
                data: $("#search_form").serialize(),
                type: 'POST',
                success: function (data) {
                    // do something with the result
                    $("#searchData").html(data);
                }
            });

        }
    </script>
@endsection
