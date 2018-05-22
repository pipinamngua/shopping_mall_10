@if(isset($products) && !empty($products))   
    @foreach ($products as $product)
    <div class="col-md-4 agile_ecommerce_tab_left">
        <div class="hs-wrapper">
            @if(isset($product->images) && !empty($product->images) && $product->images->count() > 1)
                @foreach($product->images as $image)
                    <img src="{{ asset('storage/images/product/' . $image->url) }}" alt="" class="img-responsive" />
                @endforeach
            @else
                <img src="{{ asset('images/home/6.jpg') }}" alt="" class="img-responsive" />
                <img src="{{ asset('images/home/2.jpg') }}" alt="" class="img-responsive" />
                <img src="{{ asset('images/home/3.jpg') }}" alt="" class="img-responsive" />
                <img src="{{ asset('images/home/4.jpg') }}" alt="" class="img-responsive" />
                <img src="{{ asset('images/home/5.jpg') }}" alt="" class="img-responsive" />
            @endif
            <div class="w3_hs_bottom">
                <ul>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <h5><a href="{{ route('show_pdetail', ['product' => $product->id]) }}" class="item-name">{{ $product->name }}</a></h5>
        <div class="simpleCart_shelfItem">
            <p><span>{{ '$' . $product->price_out }}</span> <i class="item_price">{{ '$' . $product->price_out }}</i></p>
            <p><a class="item_add" href="#">{{ trans('settings.layout.homePage.btn_add_to_cart') }}</a></p>
        </div>
    </div>
    @endforeach
@endif
