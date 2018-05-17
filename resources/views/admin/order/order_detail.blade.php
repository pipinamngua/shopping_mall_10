@extends('layouts.admin.layout')
@section('content')
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel" id="informUser">
            <div class="col-md-3">
                @if ($order->user_id == config('custom.user.user_id')) 
                <img  src="{{ asset(config('custom.image.avatar_default')) }}" class="avatar-user">
                @else
                <img src="{{ asset(config('custom.image.path_avatar') . '/' . $order->user->avatar) }}" class="avatar-user">
                @endif
            </div>
            <div class="col-md-9">
                <table>
                    <tr>
                        <th>
                            <h2>{{ trans('custom.order_detail.information') }}</h2>
                        </th>
                    </tr>
                    <tr>
                        <td>{{ trans('custom.order_detail.name') }}</td>
                        <td>{{ $order->fullname }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('custom.order_detail.phone') }}</td>
                        <td>{{ $order->phone }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('custom.order_detail.address') }}</td>
                        <td>{{ $order->address}}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('custom.order_detail.email') }}</td>
                        <td>{{ $order->email }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i>{{ trans('custom.order_detail.title') }}</h4>
                @if (Session::has('success'))
                <div class="alert alert-success">
                    <i>
                        <p>{{ Session::get('success')}}</p>
                    </i>
                </div>
                @endif
                <hr>
                <thead>
                    <tr>
                        <th>{{ trans('custom.order_admin.id') }}</th>
                        <th>{{ trans('custom.order_detail.productName') }}</th>
                        <th>{{ trans('custom.order_detail.qty') }}</th>
                        <th>{{ trans('custom.order_detail.price') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderDetails as $key => $item)
                    <tr>
                        <td>{{ $key +1 }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price , 2, ',' , '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
</div>
<!-- /row -->
@endsection
