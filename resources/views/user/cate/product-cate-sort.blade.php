@foreach ($products as $product)
<div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_dresses">
    <div class="agile_ecommerce_tab_left dresses_grid">
        <div class="hs-wrapper hs-wrapper2">
            <img src="{{ asset('assets/Hoang_library/user/images/27.jpg') }}" alt=" " class="img-responsive" />
            <img src="{{ asset('assets/Hoang_library/user/images/28.jpg') }}" alt=" " class="img-responsive" />
            <img src="{{ asset('assets/Hoang_library/user/images/29.jpg') }}" alt=" " class="img-responsive" />
            <img src="{{ asset('assets/Hoang_library/user/images/30.jpg') }}" alt=" " class="img-responsive" />
            <img src="{{ asset('assets/Hoang_library/user/images/31.jpg') }}" alt=" " class="img-responsive" />
            <div class="w3_hs_bottom w3_hs_bottom_sub1">
                <ul>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                    </li>
                </ul>
            </div>
        </div>
        <h5><a href="{{ route('show_pdetail', ['product' => $product->id]) }}">{{ $product->name }}</a></h5>
        <div class="simpleCart_shelfItem">
            <p><span></span> <i class="item_price">{{ number_format($product->price_out, 2, '.', ',') }}</i></p>
            <p>
                <span class="item_add">
                    {!! Form::open([
                        'method' => 'POST',
                        'route' => 'storeCart',
                    ]) !!}
                    {!! Form::hidden('product_id',$product->id) !!}
                    {!! Form::submit(trans('settings.layout.homePage.btn_add_to_cart'))!!}
                    {!! Form::close() !!}
                </span>
            </p>
        </div>
        <div class="dresses_grid_pos">
            <h6>{{ trans('custom.product.new') }}</h6>
        </div>
    </div>
</div>
@endforeach
