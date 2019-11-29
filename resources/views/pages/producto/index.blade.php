@extends('layouts.app')
@section('title', 'Productos')
@section('breadcrumbs')
	<!-- Breadcrumbs-->
      	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              	<a href="{{url('home')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item active">Productos</li>
      	</ol>
    <!-- Cierra Breadcrumbs -->
@endsection
@section('content')
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			Listado de Productos
		</div>
		<div class="card-header">
			<!-- Button trigger modal -->
			@can('product.create')
				<a href="{{route('product.create')}}" role="button" class="btn btn-primary">
					<i class="fa fa-plus"></i> Crear Nuevo Producto
				</a>
			@endcan
			@can('product.pdf')
				<button class="btn btn-danger fa fa-file-pdf min1" onclick="crearPDFproducts();" title="Crear PDF"> Generar PDF</button>
			@endcan
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped text-center" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Imagen</th>
							<th>Referencia</th>
							<th>Categoria</th>
							<th>Precio Unitario</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
						@foreach($product as $product)
							<tr>
								<td scope="row" style="vertical-align: middle;">{{$product->id}}</td>
								<td scope="row" style="vertical-align: middle;">
									<img style="width: 80px;" src="{{Storage::url($product->image)}}">
								</td>
								<td scope="row" style="vertical-align: middle;">{{$product->reference}}</td>
								<td scope="row" style="vertical-align: middle;">{{$product->category}}</td>
								<td scope="row" style="vertical-align: middle;">{{$product->unit_price}}</td>
								<td class="w-25" scope="row" style="vertical-align: middle;">
									@can('product.show')
										<a href="{{route('product.show', $product->id)}}" role="button" class="btn btn-primary">
											<i class="fas fa-eye fa-sm"></i>
										</a>
									@endcan
									@can('product.edit')
										<a href="{{route('product.edit', $product->id)}}" class="btn btn-warning"
										role="button">
											<i class="fas fa-pen-square fa-lg"></i>
										</a>
									@endcan
									@can('product.destroy')
										{!! Form::open([
											'route'=>['product.destroy', $product->id],
											'method'=>'DELETE',
											'class'=>'d-inline'])!!}
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
							<th>Imagen</th>
							<th>Referencia</th>
							<th>Categoria</th>
							<th>Precio Unitario</th>
							<th>Accion</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
@stop