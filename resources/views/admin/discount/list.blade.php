@extends('layouts.admin.layout')
@section('content')
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i>{{ trans('custom.discountAdmin.title') }}</h4>
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
                        <th>{{ trans('custom.discountAdmin.id') }}</th>
                        <th>{{ trans('custom.discountAdmin.name') }}</th>
                        <th>{{ trans('custom.discountAdmin.start') }}</th>
                        <th>{{ trans('custom.discountAdmin.end') }}</th>
                        <th>{{ trans('custom.discountAdmin.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($discounts as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->start }}</td>
                        <td>{{ $item->end }}</td>
                        <td>
                            <button class="btn btn-primary btn-xs">
                            {{ Html::link(
                                route('discount.edit',$item->id),
                                '',
                                [
                                    'class' => 'fa fa-pencil',
                                    'style' => 'color:white',
                                ]
                            ) }}
                            </button>
                            {!! Form::open([
                                'method' => 'delete',
                                'route' => ['discount.destroy',$item->id],
                            ]) !!}
                            <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o "></i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div align="center">
                {{ $discounts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
