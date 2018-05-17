@extends('layouts.admin.layout')
@section('content')
<div class="row mt">
<div class="col-md-12">
    <div class="content-panel">
        <table class="table table-striped table-advance table-hover">
            <h4><i class="fa fa-angle-right"></i>{{ trans('custom.order_admin.order_table') }}</h4>
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
                    <th>{{ trans('custom.order_admin.fullname') }}</th>
                    <th>{{ trans('custom.order_admin.email') }}</th>
                    <th>{{ trans('custom.order_admin.phone') }}</th>
                    <th>{{ trans('custom.order_admin.address') }}</th>
                    <th>{{ trans('custom.order_admin.message') }}</th>
                    <th>{{ trans('custom.order_admin.payment') }}</th>
                    <th>{{ trans('custom.order_admin.subtotal') }}</th>
                    <th>{{ trans('custom.order_admin.endtotal') }}</th>
                    <th>{{ trans('custom.order_admin.created_at') }}</th>
                    <th>{{ trans('custom.order_admin.note') }}</th>
                    <th>{{ trans('custom.order_admin.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->fullname }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->message }}</td>
                    <td>{{ $item->payment }}</td>
                    <td>{{ number_format($item->subtotal, 2, ',', '.') }}</td>
                    <td>{{ number_format($item->endtotal, 2, ',', '.') }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        @if ($item->status == config('custom.order.statusDelivering'))
                        {{ trans('custom.order.delevering') }}
                        @elseif ($item->status == config('custom.order.statusDeliveried'))
                        {{ trans('custom.order.deleveried') }}
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ trans('custom.user_admin.action') }}
                            </button>
                            <div class="dropdown-menu">
                                <button class="btn btn-primary btn-xs">
                                {{ Html::link(
                                    route('orderDetail',$item->id),
                                    trans('custom.order_admin.detail'),
                                    ['class' => 'actionOrder']
                                    ) }}
                                </button>
                                {!! Form::open([
                                    'method' => 'POST',
                                    'route' => ['changeStatus', config('custom.order.statusDeliveried'), $item->id],
                                ]) !!}
                                    <button class="btn btn-warning btn-xs" onclick="return confirm('Are you sure?')">{{ trans('custom.order_admin.deliveried') }}</button>
                                {!! Form::close() !!}

                                {!! Form::open([
                                    'method' => 'POST',
                                    'route' => ['changeStatus', config('custom.order.statusDelivering'), $item->id],
                                ]) !!}

                                    <button class="btn btn-warning btn-xs" onclick="return confirm('Are you sure?')">{{ trans('custom.order_admin.delivering') }}</button>

                                {!! Form::close() !!}

                                {!! Form::open([
                                    'method' => 'delete',
                                    'route' => ['destroyOrder', $item->id],
                                ]) !!}
                                    <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o "></i></button>
                                {!! Form::close() !!}
                            </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div align="center">
            {{ $orders->links() }}
        </div>
        </div><!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
</div>
<!-- /row -->
@endsection
