@extends('layouts.app')
@section('title', 'Editar Categoria')
@section('breadcrumbs')
	<!-- Breadcrumbs-->
      	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              	<a href="{{url('/main')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
              	<a href="{{url('category')}}">Categorias</a>
            </li>
            <li class="breadcrumb-item active">Editar Categoria con ID {{$category->id}}</li>
      	</ol>
    <!-- Cierra Breadcrumbs -->
@endsection
@section('content')
	@include('layouts.components.error')
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			Mostrando Categoria con ID {{$category->id}}
		</div>
		<div class="card-body">
			<div class="table-responsive">
				{!! Form::model($category, ['route'=>['category.update', $category->id], 'method'=>'PUT', 'class'=>'form-group']) !!}
					<table class="table table-bordered table-striped text-center">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nombre Categoria</th>
								<th>Descripcion</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="vertical-align: middle;">
									{!! Form::text('id', null, ['class' => 'form-control text-center', 'disabled']) !!}
								</td>
								<td style="vertical-align: middle;">
									{!! Form::text('name', null, ['class' => 'form-control text-center']) !!}
								</td>
								<td style="vertical-align: middle;">
				    				{!! Form::textarea('description', null, ['class' => 'form-control text-center', 'rows'=>'2', 'style'=>'resize: none;']) !!}
								</td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<th>ID</th>
								<th>Nombre Categoria</th>
								<th>Descripcion</th>
							</tr>
						</tfoot>
					</table>
					<a href="{{URL('category')}}" role="button" class="btn btn-secondary">Volver</a>
					{!!Form::button('Guardar',['type'=>'submit','class'=>'btn btn-danger'])!!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop