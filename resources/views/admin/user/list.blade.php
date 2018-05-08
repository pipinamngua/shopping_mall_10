@extends('layouts.admin.layout')

@section('content')
<div class="row mt">
	<div class="col-md-12">
		<div class="content-panel">
			<table class="table table-striped table-advance table-hover">
				<h4><i class="fa fa-angle-right"></i>{{ trans('custom.user_admin.user_table') }}</h4>
				@if(Session::has('success'))
				    <div class="alert alert-success">
                        <i><p>{{ Session::get('success')}}</p></i>
                    </div>
				@endif
				<hr>
				<thead>
					<tr>
						<th>{{ trans('custom.user_admin.id') }}</th>
						<th>{{ trans('custom.user_admin.name_user') }}</th>
						<th>{{ trans('custom.user_admin.gender') }}</th>
						<th>{{ trans('custom.user_admin.email') }}</th>
						<th>{{ trans('custom.user_admin.dob') }}</th>
						<th>{{ trans('custom.user_admin.phone') }}</th>
						<th>{{ trans('custom.user_admin.credit_card') }}</th>
						<th>{{ trans('custom.user_admin.points') }}</th>
						<th>{{ trans('custom.user_admin.role') }}</th>
						<th>{{ trans('custom.user_admin.avatar') }}</th>
						<th>{{ trans('custom.user_admin.action') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $item)
					<tr>
					    <td>{{ $item->id }}</td>
					    <td>{{ $item->name }}</td>
					    <td>{{ $item->gender }}</td>
					    <td>{{ $item->email }}</td>
					    <td>{{ $item->dob }}</td>
					    <td>{{ $item->phone }}</td>
					    <td>{{ $item->credit_card }}</td>
					    <td>{{ $item->points }}</td>
					   	<td>{{ $item->role->name }}</td>
					   	<td>
					   		<img src="{{ asset('storage/images/avatar/'.$item->avatar) }}" alt="avatar user" width="30" height="30">
					   	</td>
						<td>
							<button class="btn btn-primary btn-xs">
							    {{ Html::link(
							    route('user.edit',$item->id),
							    '',
							    [
							        'class' => 'fa fa-pencil',
							        'style' => 'color:white',
							    ]
							    ) }}
                            </button>
                            {!! Form::open([
                                'method' => 'delete',
                                'route' => ['user.destroy',$item->id],
                            ]) !!}
							<button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o "></i></button>
							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div align="center">
				{{ $users->links() }}
			</div>
		</div><!-- /content-panel -->
	</div><!-- /col-md-12 -->
</div><!-- /row -->
@endsection
