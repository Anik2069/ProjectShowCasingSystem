@php
    $custom =  $custom1=[];
    if(!empty($marks)){
    foreach ($marks as $data){
    $custom[$data->c_name] = $data->marks;
    $custom1[$data->c_name] = $data->id;
    }
    }
@endphp
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModal">Follow Up info</h5>
            <button type="button" class="close" data-dismiss="modal" onclick="buttonclick()" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Follow History</a>
                    </li>
                </ul><!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-2" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">Serial</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center" style="width: 50%">Note</th>
                                </tr>
                                @if(!empty($followup))
                                    @foreach($followup as $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ date("d M,Y",strtotime($value->date)) }}</td>
                                            <td>{{ $value->note }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                       <td rowspan="3">No Data Found</td>
                                    </tr>
                                @endif
                                </thead>

                            </table>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>

