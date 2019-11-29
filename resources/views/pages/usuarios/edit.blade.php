@extends('layouts.app')
@section('title', 'Editar Usuario')
@section('breadcrumbs')
	<!-- Breadcrumbs-->
      	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              	<a href="{{url('/main')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
              	<a href="{{url('user')}}">Usuario</a>
            </li>
            <li class="breadcrumb-item active">Editar Usuario con ID {{$users->id}}</li>
      	</ol>
    <!-- Cierra Breadcrumbs -->
@endsection
@section('content')
	{{-- Esta es la tabla que muestra el usuario --}}
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			Mostrando Usuario con ID {{$users->id}}
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped text-center">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre Usuario</th>
							<th>Correo Electronico</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								{{$users->id}}
							</td>
							<td>
								{{$users->name}}
							</td>
							<td>
								{{$users->email}}
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Nombre Usuario</th>
							<th>Correo Electronico</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	{{-- Esta es la tabla que muestra los roles y permisos de cada usuario --}}
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			Mostrando los Roles y los Permisos del Usuario con ID {{$users->id}}
		</div>
		<div class="card-body">
			<div class="table-responsive">
				{!!Form::model($users, ['url'=>['user', $users->id], 'method'=>'POST','class'=>'form-group'])!!}
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 10px; text-align: center;" scope="col">Seleccione</th>
								<th style="text-align: center; vertical-align: middle;" scope="col">Nombre</th>
								<th style="text-align: center; vertical-align: middle;" scope="col">Descripcion</th>
							</tr>
						</thead>
						<tbody>
							@foreach($roles as $role)
								<tr>
									<td>
										{{ Form::checkbox('roles[]', $role->id, null) }}
									</td>
									<td>
										{{ $role->name }}
									</td>
									<td>
										<em>{{ $role->description ?: ' Sin descripcion'}}</em>
									</td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th scope="col">Seleccione</th>
								<th style="text-align: center; vertical-align: middle;" scope="col">Nombre</th>
								<th style="text-align: center; vertical-align: middle;" scope="col">Descripcion</th>
							</tr>
						</tfoot>
					</table>
					<hr>
					<a href="{{URL('user')}}" role="button" class="btn btn-secondary">Volver</a>
					{!!Form::button('Guardar',['type'=>'submit','class'=>'btn btn-danger'])!!}
				{!!Form::close()!!}
			</div>
		</div>
	</div>
@stop