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
                        <th>{{ trans('custom.orderUser.title') }}</th>
                        <th>{{ trans('custom.orderUser.total') }}</th>
                        <th>{{ trans('custom.orderUser.dateOrder') }}</th>
                        <th>{{ trans('custom.orderUser.action') }}</th>
                    </tr>
                    @foreach (Auth::user()->orders as $key => $item)
                        <tr>
                            <td>{{ $key + 1}}</td>
                            <td>{{ number_format($item->endtotal, 2, '.', ',') }}</td>
                            <td>{{ date_format($item->created_at, 'd-m-Y') }}</td>
                            <td>
                                {!! Form::open([
                                    'method' => 'POST',
                                    'route' => ['orderDetailUser', $item->id]
                                ]) !!}

                                {!! Form::hidden('order_id', $item->id) !!}
                                {!! Form::submit(trans('custom.orderUser.detail')) !!}
                                {!! Form::close() !!}
                            </td>
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
