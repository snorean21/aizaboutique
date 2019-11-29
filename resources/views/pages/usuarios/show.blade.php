@extends('layouts.app')
@section('title', 'Usuarios con id')
@section('breadcrumbs')
	<!-- Breadcrumbs-->
      	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              	<a href="{{url('/main')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
              	<a href="{{url('user')}}">Usuarios</a>
            </li>
            <li class="breadcrumb-item active">Usuario con ID {{$user->id}}</li>
      	</ol>
    <!-- Cierra Breadcrumbs -->
@endsection
@section('content')
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			Mostrando Usuario con ID {{$user->id}}
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped text-center align-self-center">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Nombre Usuario</th>
							<th scope="col">Email</th>
							<th scope="col">Role</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td scope="row" style="vertical-align: middle;">{{$user->id}}</td>
							<td scope="row" style="vertical-align: middle;">{{$user->name}}</td>
							<td class="w-50" scope="row" style="vertical-align: middle;">{{$user->email}}</td>
							@foreach($user->roles as $role)
								<td scope="row" style="vertical-align: middle;">{{$role->name}}</td>
							@endforeach
							</tr>
					</tbody>
					<tfoot>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Nombre Usuario</th>
							<th scope="col">Email</th>
							<th scope="col">Role</th>
						</tr>
					</tfoot>
				</table>
			</div>
			<a href="{{URL('user')}}" role="button" class="btn btn-secondary">Volver</a>
		</div>
	</div>
@stop