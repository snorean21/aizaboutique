@extends('layouts.app')
@section('title', 'Editar Producto')
@section('breadcrumbs')
	<!-- Breadcrumbs-->
      	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              	<a href="{{url('/home')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
              	<a href="{{url('product')}}">Productos</a>
            </li>
            <li class="breadcrumb-item active">Editar Producto con ID {{$product->id}}</li>
      	</ol>
    <!-- Cierra Breadcrumbs -->
@endsection
@section('content')
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			Mostrando Productos con ID {{$product->id}}
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<form
					method="POST"
					action="{{ route('product.update', $product->id) }}"
					enctype="multipart/form-data">
					{!! method_field('PUT') !!}
					@csrf
					<table class="table table-bordered table-striped text-center">
						<thead>
							<tr>
								<th>ID</th>
								<th>Imagen</th>
								<th>Precio Por Mayor</th>
								<th>Accion</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<td scope="row" style="vertical-align: middle;">
								{{$product->id}}
							</td>
							<td scope="row" style="vertical-align: middle;">
								<img style="width: 80px;" src="{{ Storage::url($product->image) }}" alt="">
							</td>
							<td scope="row" style="vertical-align: middle;">
								<input type="text" name="price_for_wholesale" class="form-control"
								placeholder="{{$product->price_for_wholesale}}">
							</td>
							<td scope="row" style="vertical-align: middle;">
									<input type="submit" class="btn btn-primary">
									<a href="{{url('product')}}" class="btn btn-primary" role="button">
										<i class="fas fa-undo fa-sm"></i>
									</a>
								</td>
						</tr>
						</tbody>
						<tfoot>
							<tr>
								<th>ID</th>
								<th>Imagen</th>
								<th>Precio Por Mayor</th>
								<th>Accion</th>
							</tr>
						</tfoot>
					</table>
				</form>
			</div>
		</div>
	</div>
@stop