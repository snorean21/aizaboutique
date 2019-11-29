@extends('layouts.app')
@section('title', 'Categorias')
@section('breadcrumbs')
	<!-- Breadcrumbs-->
      	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              	<a href="{{url('home')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item active">Categorias</li>
      	</ol>
    <!-- Cierra Breadcrumbs -->
@endsection
@section('content')
	<div class="card mb-3">
		<div class="card-header">
			<div class="align-self-center">
				<i class="fas fa-table"></i>
				Listado de Categorias
			</div>
		</div>
		<div class="card-header">
			@can('category.create')
				<a href="{{route('category.create')}}" role="button" class="btn btn-primary">
					<i class="fa fa-plus"></i> Crear Categoria
				</a>
			@endcan
			@can('category.pdf')
				<button class="btn btn-danger fa fa-file-pdf min1" onclick="crearPDFcategorys();" title="Crear PDF"> Generar PDF</button>
			@endcan
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped text-center display" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre Categoria</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categorys as $category)
						<tr>
							<td style="vertical-align: middle;">{{$category->id}}</td>
							<td style="vertical-align: middle;">{{$category->name}}</td>
							<td style="vertical-align: middle;">
								@can('category.show')
									<a href="{{route('category.show', $category->id)}}" role="button" class="btn btn-primary">
										<i class="fas fa-eye fa-sm"></i>
									</a>
								@endcan
								@can('category.edit')
									<a href="{{route('category.edit', $category->id)}}" class="btn btn-warning" role="button">
										<i class="fas fa-pen-square fa-lg"></i>
									</a>
								@endcan
								@can('category.destroy')
									{!! Form::open([
										'route'=>['category.destroy', $category->id],
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

