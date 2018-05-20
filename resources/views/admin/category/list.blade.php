@extends('layouts.admin.layout')

@section('title')
    {{ trans('custom.category.table') }}
@endsection

@section('content')
<div class="row mt">
<div class="col-md-12">
    <div class="content-panel">
        <table class="table table-striped table-advance table-hover">
            <h4><i class="fa fa-angle-right"></i>{{ trans('custom.category.table') }}</h4>
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
                    <th>{{ trans('custom.category.id') }}</th>
                    <th>{{ trans('custom.category.name') }}</th>
                    <th>{{ trans('custom.category.parent') }}</th>
                    <th>{{ trans('custom.category.update_at') }}</th>
                    <th>{{ trans('custom.category.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $parents->get($item->parent_id) }}</td>
                    <td>{{ $item->created_at }}</td>
                   <td>
                    <button class="btn btn-primary btn-xs">
                    {{ Html::link(
                        route('category.show', $item->id),
                        '',
                        [
                            'class' => 'fa fa-pencil',
                            'style' => 'color:white',
                        ]
                    ) }}
                    </button>
                    {!! Form::open([
                        'method' => 'delete',
                        'route' => ['category.destroy',$item->id],
                    ]) !!}
                    <button class="btn btn-danger btn-xs" onclick="return confirm('{{ trans('custom.form.sure') }}')"><i class="fa fa-trash-o "></i></button>
                    {!! Form::close() !!}
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div align="center">
            {{ $categories->links() }}
        </div>
        </div><!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
</div>
<!-- /row -->
@endsection
