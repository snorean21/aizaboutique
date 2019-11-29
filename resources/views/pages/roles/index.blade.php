@extends('layouts.app')
@section('title', 'Roles')
@section('breadcrumbs')
	<!-- Breadcrumbs-->
      	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              	<a href="{{url('home')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item active">Roles</li>
      	</ol>
    <!-- Cierra Breadcrumbs -->
@endsection
@section('content')
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			Listado de Roles
		</div>
		<div class="card-header">
			@can('role.create')
				<a href="{{route('role.create')}}" role="button" class="btn btn-primary">
					<i class="fa fa-plus"></i> Crear Role
				</a>
			@endcan
			@can('role.pdf')
				<a href="#" role="button" class="btn btn-danger min1 ">
					<i class="fa fa-file-pdf"></i> Generar PDF
				</a>
			@endcan
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped text-center" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre Role</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
						@foreach($roles as $role)
							<tr>
								<td scope="row" style="vertical-align: middle;">{{$role->id}}</td>
								<td scope="row" style="vertical-align: middle;">{{$role->name}}</td>
								<td class="w-25" scope="row" style="vertical-align: middle;">
									@can('role.show')
										<a href="{{route('role.show', $role->id)}}" role="button" class="btn btn-primary">
											<i class="fas fa-eye fa-sm"></i>
										</a>
									@endcan
									@can('role.edit')
										<a href="{{route('role.edit', $role->id)}}" class="btn btn-warning " role="button">
											<i class="fas fa-pen-square fa-lg"></i>
										</a>
									@endcan
									@can('role.destroy')
										{!! Form::open([
											'route'=>['role.destroy', $role->id],
											'method'=>'DELETE',
											'class'=>'d-inline']) !!}
												{!! Form::button(
													'<i class="fas fa-trash-alt fa-sm"></i>',
													['type'=>'submit','class'=>'btn btn-danger']
												) !!}
										{!! Form::close() !!}
									@endcan
								</td>
							</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Nombre Categoria</th>
							<th>Accion</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
@stop
