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
            <h5 class="modal-title" id="formModal">Mark Info</h5>
            <button type="button" class="close" data-dismiss="modal" onclick="buttonclick()" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="" action="{{ empty($marks)?route("assignResult.store"): route("assignResult.updateData") }}" method="post">
                @csrf
                @if(!empty($resultCriteria))
                    @foreach($resultCriteria as $value)
                        <div class="form-group">
                            <label>Name: {{ ucfirst($value->name) }}, Priority : {{$value->prority }},
                                Marks: {{$value->marks }}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="{{ $value->name }}"
                                       value="{{ isset($custom[$value->name])?$custom[$value->name]:" " }}" required>
                                <input type="hidden" name="old_mark_id[]" value="{{  isset($custom1[$value->name])?$custom1[$value->name]:" " }}">
                            </div>
                        </div>
                    @endforeach
                    <input type="hidden" name="s_id" value="{{$s_id}}">
                    <input type="hidden" name="p_id" value="{{$programId}}">

                @endif

                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit Marks</button>
                <button type="button" class="btn btn-danger m-t-15" onclick="buttonclick()" data-dismiss="modal">Close
                </button>
            </form>
        </div>
    </div>
</div>
