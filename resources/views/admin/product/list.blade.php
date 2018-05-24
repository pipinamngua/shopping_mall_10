@extends('layouts.admin.layout')

@section('title')
    {{ trans('custom.product.title', ['action' => 'List']) }}
@endsection

@section('content')
<div class="row mt">
<div class="col-md-12">
    <div class="content-panel">
        <table class="table table-striped table-advance table-hover">
            <h4><i class="fa fa-angle-right"></i>{{ trans('custom.product.table') }}</h4>
            <hr>
            <thead>
                <tr>
                    <th>{{ trans('custom.product.id') }}</th>
                    <th>{{ trans('custom.product.name') }}</th>
                    <th>{{ trans('custom.product.category') }}</th>
                    <th>{{ trans('custom.product.supplier') }}</th>
                    <th>{{ trans('custom.product.price_in') }}</th>
                    <th>{{ trans('custom.product.price_out') }}</th>
                    <th>{{ trans('custom.product.quantity') }}</th>
                    <th>{{ trans('custom.product.status') }}</th>
                    <th>{{ trans('custom.product.updated_at') }}</th>
                    <th>{{ trans('custom.user_admin.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $categories->get($item->category_id) }}</td>
                    <td>{{ $suppliers->get($item->supplier_id) }}</td>
                    <td>{{ number_format($item->price_in, 3, ',', '.') }}</td>
                    <td>{{ number_format($item->price_out, 3, ',', '.') }}</td>
                    <td>{{ number_format($item->quantity, 2, ',', '.') }}</td>
                    <td>
                        @if ($item->status == config('custom.product.statusTrend'))
                        {{ trans('custom.product.hot') }}
                        @elseif ($item->status == config('custom.product.statusNew'))
                        {{ trans('custom.product.new') }}
                        @elseif ($item->status == config('custom.product.statusOld'))
                        {{ trans('custom.product.old') }}
                        @endif
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <button class="btn btn-primary btn-xs">
                        {{ Html::link(
                            route('product.show', $item->id),
                            '',
                            [
                                'class' => 'fa fa-pencil',
                                'style' => 'color: white',
                            ]
                        ) }}
                        </button>
                        {!! Form::open([
                            'method' => 'delete',
                            'route' => ['product.destroy', $item->id],
                        ]) !!}
                        <button class="btn btn-danger btn-xs" onclick="return confirm('{{ trans('custom.form.sure') }}')"><i class="fa fa-trash-o"></i></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div align="center">
            {{ $products->links() }}
        </div>
        </div>
    </div>
</div>
@endsection
