@extends('layouts.admin.layout')

@section('title')
    {{ trans('settings.supplier.title') }}
@endsection

@section('content')
<div class="row mt">
<div class="col-md-12">
    <div class="content-panel">
        <table class="table table-striped table-advance table-hover">
            <h4><i class="fa fa-angle-right"></i>{{ trans('custom.supplier.table') }}</h4>
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
                    <th>{{ trans('custom.supplier.id') }}</th>
                    <th>{{ trans('custom.supplier.name') }}</th>
                    <th>{{ trans('custom.supplier.address') }}</th>
                    <th>{{ trans('custom.supplier.phone') }}</th>
                    <th>{{ trans('custom.supplier.email') }}</th>
                    <th>{{ trans('custom.supplier.update_at') }}</th>
                    <th>{{ trans('custom.supplier.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->created_at }}</td>
                   <td>
                    <button class="btn btn-primary btn-xs">
                    {{ Html::link(
                        route('supplier.show', $item->id),
                        '',
                        [
                            'class' => 'fa fa-pencil',
                            'style' => 'color:white',
                        ]
                    ) }}
                    </button>
                    {!! Form::open([
                        'method' => 'delete',
                        'route' => ['supplier.destroy',$item->id],
                    ]) !!}
                    <button class="btn btn-danger btn-xs" onclick="return confirm('{{ trans('custom.form.sure') }}')"><i class="fa fa-trash-o "></i></button>
                    {!! Form::close() !!}
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div align="center">
            {{ $suppliers->links() }}
        </div>
        </div>
    </div>
</div>
@endsection
