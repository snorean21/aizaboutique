@extends('layouts.app')
@section('title', 'Categorias')
@section('breadcrumbs')
	<!-- Breadcrumbs-->
      	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              	<a href="{{url('/main')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
              	<a href="{{url('category')}}">Categorias</a>
            </li>
            <li class="breadcrumb-item active">Categoria con ID {{$category->id}}</li>
      	</ol>
    <!-- Cierra Breadcrumbs -->
@endsection
@section('content')
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			Mostrando Categoria con ID {{$category->id}}
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped text-center align-self-center">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Nombre Categoria</th>
							<th scope="col">Descripcion</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td scope="row" style="vertical-align: middle;">{{$category->id}}</td>
							<td scope="row" style="vertical-align: middle;">{{$category->name}}</td>
							<td class="w-50" scope="row" style="vertical-align: middle;">{{$category->description}}</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Nombre Categoria</th>
							<th scope="col">Descripcion</th>
						</tr>
					</tfoot>
				</table>
				<a href="{{URL('category')}}" role="button" class="btn btn-secondary">Volver</a>
			</div>
		</div>
	</div>
@stop