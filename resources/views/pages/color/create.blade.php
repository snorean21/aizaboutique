@extends('layouts.app')
@section('title', 'Nuevo Color')
@section('breadcrumbs')
	<!-- Breadcrumbs-->
      	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              	<a href="{{url('/home')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
              	<a href="{{url('color')}}">Color</a>
            </li>
            <li class="breadcrumb-item active">Crear Nuevo Color</li>
      	</ol>
    <!-- Cierra Breadcrumbs -->
@endsection
@section('content')
	@include('layouts.components.error')
	<div class="card">
		<div class="card-header">
			<i class="fas fa-plus-square"></i>
			Crear Nuevo Color
		</div>
		<div class="card-body">
			{!! Form::open(['route'=>'color.store', 'method'=>'POST', 'class'=>'form-group']) !!}
				<div class="form-group row">
					{!! Form::label('name', 'Nombre Color', ['class' => 'col-sm-4 col-form-label']) !!}
				    <div class="col-sm-8">
						{!! Form::text('name', null, ['class' => 'form-control']) !!}
				    </div>
				</div>
				<div class="form-group row">
					{!! Form::label('color', 'Color', ['class' => 'col-sm-4 col-form-label']) !!}
				    <div class="col-sm-8">
						{!! Form::color('color', null, ['class' => 'form-control']) !!}
				    </div>
				</div>
					<a href="{{URL('color')}}" role="button" class="btn btn-secondary">Volver</a>
					{!!Form::button('Guardar',['type'=>'submit','class'=>'btn btn-danger'])!!}
			{!! Form::close() !!}
		</div>
	</div>
@stop