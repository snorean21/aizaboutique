@extends('layouts.app')
@section('title', 'Colores')
@section('breadcrumbs')
	<!-- Breadcrumbs-->
      	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              	<a href="{{url('home')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item active">Colores</li>
      	</ol>
    <!-- Cierra Breadcrumbs -->
@endsection
@section('content')
	<div class="card mb-3">
		<div class="card-header">
			<div class="align-self-center">
				<i class="fas fa-table"></i>
				Listado de Colores
			</div>
		</div>
		<div class="card-header">
			@can('color.create')
				<a href="{{route('color.create')}}" role="button" class="btn btn-primary">
					<i class="fa fa-plus"></i> Crear Nuevo Color
				</a>
			@endcan
			@can('color.pdf')
				<button class="btn btn-danger fa fa-file-pdf min1" onclick="crearPDF();" title="Crear PDF">&nbsp; Generar PDF</button>
			@endcan
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped text-center" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre Color</th>
							<th>Color</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
						@foreach($color as $color)
						<tr>
							<td scope="row" style="vertical-align: middle;">{{$color->id}}</td>
							<td scope="row" style="vertical-align: middle;">{{$color->name}}</td>
							<td scope="row" style="vertical-align: middle;">
								<div class="color">
									<div class="colorP" style="background-color: {{$color->color}};"></div>
								</div>
							</td>
							<td scope="row" style="vertical-align: middle;">
								@can('color.edit')
									<a href="{{route('color.edit', $color->id)}}" class="btn btn-warning min1" role="button">
										<i class="fas fa-pen-square fa-lg"></i>
									</a>
								@endcan
								@can('color.destroy')
									{!! Form::open([
										'route'=>['color.destroy', $color->id],
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
							<th>Nombre color</th>
							<th>Color</th>
							<th>Accion</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
@stop

