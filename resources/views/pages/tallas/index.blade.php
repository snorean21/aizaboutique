@extends('layouts.app')
@section('title', 'Tallas')
@section('breadcrumbs')
	<!-- Breadcrumbs-->
      	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              	<a href="{{url('home')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item active">Tallas</li>
      	</ol>
    <!-- Cierra Breadcrumbs -->
@endsection
@section('content')
	<div class="card mb-3">
		<div class="card-header">
			<div class="align-self-center">
				<i class="fas fa-table"></i>
				Listado de las Tallas
			</div>
		</div>
		<div class="card-header">
			@can('category.create')
				<a href="{{route('category.create')}}" role="button" class="btn btn-primary">
					<i class="fa fa-plus"></i> Crear Nueva Talla
				</a>
			@endcan
			@can('category.pdf')
				<button class="btn btn-danger fa fa-file-pdf min1" onclick="crearPDF();" title="Crear PDF">&nbsp; Generar PDF</button>
			@endcan
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped text-center display" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Talla</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
						@foreach($size as $size)
						<tr>
							<td scope="row" style="vertical-align: middle;">{{ $size->id }}</td>
							<td scope="row" style="vertical-align: middle;">{{ $size->size }}</td>
							<td scope="row" style="vertical-align: middle;">
								@can('size.edit')
									<a href="{{route('size.edit', $size->id)}}" class="btn btn-warning min1" role="button">
										<i class="fas fa-pen-square fa-lg"></i>
									</a>
								@endcan
								@can('size.destroy')
									{!! Form::open([
										'route'=>['size.destroy', $size->id],
										'method'=>'DELETE',
										'class'=>'d-inline']) !!}
											{!! Form::button(
												'<i class="fas fa-trash-alt fa-sm"></i>',
												['type'=>'submit','class'=>'btn btn-danger min1']
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
							<th>Talla</th>
							<th>Accion</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
@stop

