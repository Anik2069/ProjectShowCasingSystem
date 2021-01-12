<div class="section-body">
    <div class="invoice">
        <div class="invoice-print" id="printableArea">

            <div class="row mt-4">
                <div class="col-md-12">
                    <p class="section-lead">Monthly Report</p>
                    <div class="table-responsive">

                        <table class="table table-striped table-hover table-md">
                            <tr>
                                <th data-width="40">#</th>
                                <th>Porgam Name</th>
                                <th>Organizer Name</th>
                                <th class="text-center">Registration</th>
                                <th class="text-center">Total Number of Registration</th>
                            </tr>
                            <input type="hidden" value="{{$t=0}}">
                            <input type="hidden" value="{{$t1=0}}">
                            @if(!empty($searchData))
                                @foreach($searchData as $st)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$st->program_name}}</td>
                                        <td>{{$st->purpose}}</td>
                                        <td class="text-center">{{$st->lastDateOfRegistration}}</td>
                                        <td class="text-center">{{$st->studentNumber}}</td>

                                    </tr>
                                @endforeach
                            @endif


                        </table>
                    </div>

                </div>
            </div>
        </div>
        <hr>
        <div class="text-md-right">
            <button class="btn btn-warning btn-icon icon-left" onclick="printDiv('printableArea')">
                <i class="fas fa-print"></i> Print
            </button>
        </div>
    </div>
</div>
