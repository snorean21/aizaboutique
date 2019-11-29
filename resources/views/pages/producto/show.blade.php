@extends('layouts.app')
@section('title', 'Productos')
@section('breadcrumbs')
	<!-- Breadcrumbs-->
      	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              	<a href="{{url('/home')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
              	<a href="{{url('product')}}">Productos</a>
            </li>
            <li class="breadcrumb-item active">Producto con ID {{$product->id}}</li>
      	</ol>
    <!-- Cierra Breadcrumbs -->
@endsection
@section('content')
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			Mostrando Producto con ID {{$product->id}}
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped text-center">
					<thead>
						<tr>
							<th>ID</th>
							<th>Imagen</th>
							<th>Referencia</th>
							<th>Categoria</th>
							<th>Color</th>
							<th>Talla</th>
							<th>Descripcion</th>
							<th>Precio Unitario</th>
							<th>Precio Por Mayor</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td scope="row" style="vertical-align: middle;">{{$product->id}}</td>
							<td scope="row" style="vertical-align: middle;">
								<img style="width: 80px;" src="{{$product->image}}">
							</td>
							<td scope="row" style="vertical-align: middle;">{{$product->reference}}</td>
							<td scope="row" style="vertical-align: middle;">{{$product->category}}</td>
							<td scope="row" style="vertical-align: middle;">{{$product->color}}</td>
							<td scope="row" style="vertical-align: middle;">{{$product->size}}</td>
							<td scope="row" style="vertical-align: middle;">{{$product->description}}</td>
							<td scope="row" style="vertical-align: middle;">{{$product->unit_price}}</td>
							<td scope="row" style="vertical-align: middle;">{{$product->price_for_wholesale}}</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Imagen</th>
							<th>Referencia</th>
							<th>Categoria</th>
							<th>Color</th>
							<th>Talla</th>
							<th>Descripcion</th>
							<th>Precio Unitario</th>
							<th>Precio Por Mayor</th>
						</tr>
					</tfoot>
				</table>
				<a href="{{URL('product')}}" role="button" class="btn btn-secondary">Volver</a>
			</div>
		</div>
	</div>
@stop