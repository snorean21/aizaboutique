@extends('layouts.app')
@section('title', 'Nuevo Role')
@section('breadcrumbs')
	<!-- Breadcrumbs-->
      	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              	<a href="{{url('/home')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
              	<a href="{{url('role')}}">Role</a>
            </li>
            <li class="breadcrumb-item active">Crear Nuevo Role</li>
      	</ol>
    <!-- Cierra Breadcrumbs -->
@endsection
@section('content')
	@include('layouts.components.error')
	<div class="card">
		<div class="card-header">
			<i class="fas fa-plus-square"></i>
			Crear Nuevo Role
		</div>
		<div class="card-body">
			{!!Form::model($role, ['route'=>['role.update', $role->id], 'method'=>'PUT','class'=>'form-group'])!!}
				<div class="form-group row">
					{!!Form::label('name', 'Nombre Role', ['class'=>'col-sm-4 col-form-label'])!!}
					<div class="col-sm-8">
						{!!Form::text('name', null, ['class'=>'form-control'])!!}
					</div>
				</div>
				<div class="form-group row">
					{!!Form::label('slug','URL Amigable',['class'=>'col-sm-4 col-form-label'])!!}
					<div class="col-sm-8">
						{!!Form::text('slug', null, ['class'=>'form-control'])!!}
					</div>
				</div>
				<div class="form-group row">
					{!!Form::label('description','Descripcion',['class'=>'col-sm-4 col-form-label'])!!}
					<div class="col-sm-8">
						{!!Form::textarea('description',null,['class'=>'form-control','rows'=>'3','style'=>'resize: none;'])!!}
					</div>
				</div>
				<hr>
				<h4>Permiso Especial</h4>
				<div class="form-group">
					<label>
						{!! Form::radio('special', 'all-access') !!} Acceso Total
					</label>
					<label>
						{!! Form::radio('special', 'no-access') !!} Ningun Accesso
					</label>
					<label>
						{!! Form::radio('special', '') !!} Ningun Permiso Especial
					</label>
				</div>
				<hr>
				<div class="card-body">
					<table class="table table-bordered table-striped" id="example">
						<thead>
							<tr>
								<th style="width: 10px; text-align: center;">Seleccione</th>
								<th style="text-align: center; vertical-align: middle;">Nombre</th>
								<th style="text-align: center; vertical-align: middle;">Descripcion</th>
							</tr>
						</thead>
						<tbody>
							@foreach($permissions as $permission)
								<tr>
									<td>
										{!!Form::checkbox('permissions[]', $permission->id, null)!!}
									</td>
									<td>
										{{$permission->name}}
									</td>
									<td>
										{{$permission->description ?: 'Sin descripcion'}}
									</td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<th style="width: 10px; text-align: center;">Seleccione</th>
							<th style="text-align: center; vertical-align: middle;">Nombre</th>
							<th style="text-align: center; vertical-align: middle;">Descripcion</th>
						</tfoot>
					</table>
				</div>
				<hr>
				<a href="{{URL('role')}}" role="button" class="btn btn-secondary">Volver</a>
				{!!Form::button('Guardar',['type'=>'submit','class'=>'btn btn-danger'])!!}
			{!!Form::close()!!}
		</div>
	</div>
@stop
@section('scripts')
	<script src="{{asset('vendor/stringtoslug/js/jquery.stringToSlug.min.js')}}"></script>
	<script>
		$(document).ready(function(){
			$("#name, #slug").stringToSlug({
				callback: function(text){
					$("#slug").val(text);
				}
			});
		});
	</script>
@stop