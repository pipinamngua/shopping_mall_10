<div class="w3l_related_products">
    <div class="container">
        <h3>{{ trans('product.title.related_products') }}</h3>
        <ul id="flexiselDemo2">         
            <li>
                <div class="w3l_related_products_grid">
                    <div class="agile_ecommerce_tab_left dresses_grid">
                        <div class="hs-wrapper hs-wrapper3">
                            <img src={{ asset('assets/Hoang_library/user/images/ss1.jpg') }} alt=" " class="img-responsive">
                            <img src={{ asset('assets/Hoang_library/user/images/ss2.jpg') }} alt=" " class="img-responsive">
                            <img src={{ asset('assets/Hoang_library/user/images/ss3.jpg') }} alt=" " class="img-responsive">
                            <img src={{ asset('assets/Hoang_library/user/images/ss4.jpg') }} alt=" " class="img-responsive">
                            <img src={{ asset('assets/Hoang_library/user/images/ss5.jpg') }} alt=" " class="img-responsive">
                            <img src={{ asset('assets/Hoang_library/user/images/ss6.jpg') }} alt=" " class="img-responsive">
                            <img src={{ asset('assets/Hoang_library/user/images/ss7.jpg') }} alt=" " class="img-responsive">
                            <img src={{ asset('assets/Hoang_library/user/images/ss8.jpg') }} alt=" " class="img-responsive">
                            <div class="w3_hs_bottom">
                                <div class="flex_ecommerce">
                                    <a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                </div>
                            </div>
                        </div>
                        <h5><a href="{{ route('show_pdetail', ['product' => $item->id]) }}">{{ $item->name }}</a></h5>
                        <div class="simpleCart_shelfItem">
                            <p class="flexisel_ecommerce_cart"><span></span> <i class="item_price">{{ $item->price_out }}</i></p>
                            <p><a class="item_add" href="#">{{ trans('product.title.btn_add_to_cart') }}</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
