@extends('layouts.user.layout')
@section('content')
<!-- mail -->
<div class="mail">
    <div class="container">
        <h3>{{ trans('custom.myOrder') }}</h3>
        <div class="agile_mail_grids">
            <div class="col-md-3 contact-left">
                <h4>{{ trans('custom.myAccount') }}</h4>
                {!! Html::image(config('custom.image.path_avatar') . '/' . Auth::user()->avatar, 'avatar',
                ['id' => 'imageAvatar']
                )!!}
                <ul>
                    <li>{!! Html::linkRoute('profile.index', trans('custom.myAccount')) !!}</li>
                    <li>{!! Html::linkRoute('changePass', trans('custom.formLogin.changePassword')) !!}</li>
                    <li>{!! Html::linkRoute('indexOrderUser', trans('custom.order.myOrder')) !!}</li>
                </ul>
            </div>
            <div class="col-md-9 contact-left">
                <h4>{{ trans('custom.orderUser.orderList') }}</h4>
                <div class="bs-docs-example">
                    <table class="table table-hover">
                        <tr>
                            <th>{{ trans('custom.orderUser.productName') }}</th>
                            <th>{{ trans('custom.orderUser.price') }}</th>
                            <th>{{ trans('custom.orderUser.qty') }}</th>
                            <th>{{ trans('custom.orderUser.total') }}</th>
                        </tr>
                        @foreach ($order->orderDetails as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ number_format($item->product->price_out, 2, '.', ',') }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price, 2, '.', ',') }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //mail -->
@endsection
