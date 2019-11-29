@extends('layouts.app')
@section('title', 'Editar Color')
@section('breadcrumbs')
	<!-- Breadcrumbs-->
      	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              	<a href="{{url('/main')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
              	<a href="{{url('color')}}">Color</a>
            </li>
            <li class="breadcrumb-item active">Editar Color con ID {{$color->id}}</li>
      	</ol>
    <!-- Cierra Breadcrumbs -->
@endsection
@section('content')
	@include('layouts.components.error')
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			Mostrando Color con ID {{$color->id}}
		</div>
		<div class="card-body">
			<div class="table-responsive">
				{!! Form::model($color, ['route'=>['color.update', $color->id], 'method'=>'PUT', 'class'=>'form-group']) !!}
					<table class="table table-bordered table-striped text-center">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nombre Color</th>
								<th>Color</th>
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
				    				{!! Form::text('color', null, ['class' => 'form-control text-center']) !!}
								</td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<th>ID</th>
								<th>Nombre Color</th>
								<th>color</th>
							</tr>
						</tfoot>
					</table>
					<a href="{{URL('color')}}" role="button" class="btn btn-secondary">Volver</a>
					{!!Form::button('Guardar',['type'=>'submit','class'=>'btn btn-danger'])!!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop