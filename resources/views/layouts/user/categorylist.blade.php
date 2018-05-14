<ul class="dropdown-menu multi-column columns-3">
    <div class="row">
        @if (isset($parents) && !empty($parents))
        @foreach($parents as $value)
        {{ $i=0 }}
        <div class="col-sm-3">
            <ul class="multi-column-dropdown">
                <h6>{{ $value }}</h6>
                @if (isset($categories[$i]) && !empty($categories[$i]))
                @foreach($categories[$i] as $category)
                <li><a href="#"> 
                    @if (fmod($category->id, 3) == 0)
                        <span>{{ trans('settings.layout.homePage.new') }}</span>
                    @endif
                    </a>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
        {{ $i++ }}
        @endforeach
        @endif
        <div class="col-sm-3">
            <div class="w3ls_products_pos">
                <h4>{{ trans('settings.layout.homePage.sale_off') }}<i></i></h4>
                <img src="{{ asset('images/home/1.jpg') }}" alt=" " class="img-responsive" />
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</ul>
