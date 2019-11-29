@extends('layouts.app')
@section('title', 'Usuarios')
@section('breadcrumbs')
	<!-- Breadcrumbs-->
      	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              	<a href="{{url('home')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item active">Usuarios</li>
      	</ol>
    <!-- Cierra Breadcrumbs -->
@endsection
@section('content')
	<div class="card mb-3">
		<div class="card-header d-flex">
			<div class="align-self-center">
				<i class="fas fa-table"></i>
				Listado de Usuarios
			</div>
			@can('user.pdf')
				<a href="#" role="button" class="btn btn-danger ml-auto">
					<i class="fa fa-file-pdf"></i> Generar PDF
				</a>
			@endcan
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped text-center" id="example">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre Usuario</th>
						<th>Accion</th>
					</tr>
				</thead>
				<tbody>
					@foreach($user as $user)
						<tr>
							<td scope="row" style="vertical-align: middle;">{{$user->id}}</td>
							<td scope="row" style="vertical-align: middle;">{{$user->name}}</td>
							<td class="w-25" scope="row" style="vertical-align: middle;">
								@can('user.show')
									<a href="{{route('user.show', $user->id)}}" role="button" class="btn btn-primary">
										<i class="fas fa-eye fa-sm"></i>
									</a>
								@endcan
								@can('user.edit')
									<a href="{{route('user.edit', $user->id)}}" class="btn btn-warning" role="button">
										<i class="fas fa-pen-square fa-lg"></i>
									</a>
								@endcan
								@can('user.destroy')
									{!! Form::open([
										'route'=>['user.destroy', $user->id],
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
@stop