<ul class="row">
    @if(!empty($program))
        @foreach($program as $pro)
            <li class="col-md-3 php">
                <figure><a href="#"><img src="{{ asset("uploads/banner/".$pro->image) }}"
                                         alt=""> <span
                            class="wm-event-transparent-hover wm-bgcolor"></span></a>
                </figure>
                <div class="wm-latest-event-text">
                    <h6><a href="#" class="wm-color">{{  $pro->program_name }}</a>
                    </h6>
                    <time datetime="2008-02-14 20:00">Date: {{ $pro->program_date }}</time>
                    <p> {{ $pro->purpose }} </p>
                    <a href="#" class="wm-banner-btn">check event</a>
                </div>
            </li>
        @endforeach
    @endif

</ul>
