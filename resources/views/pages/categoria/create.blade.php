@extends('layouts.app')
@section('title', 'Nueva Categoria')
@section('breadcrumbs')
	<!-- Breadcrumbs-->
      	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              	<a href="{{url('/home')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
              	<a href="{{url('category')}}">Categorias</a>
            </li>
            <li class="breadcrumb-item active">Crear Nueva Categorias</li>
      	</ol>
    <!-- Cierra Breadcrumbs -->
@endsection
@section('content')
	@include('layouts.components.error')
	<div class="card">
		<div class="card-header">
			<i class="fas fa-plus-square"></i>
			Listado de Categorias
		</div>
		<div class="card-body">
			{!! Form::open(['route'=>'category.store', 'method'=>'POST', 'class'=>'form-group']) !!}
				<div class="form-group row">
					{!! Form::label('name', 'Nombre Categoria', ['class' => 'col-sm-4 col-form-label']) !!}
				    <div class="col-sm-8">
						{!! Form::text('name', null, ['class' => 'form-control']) !!}
				    </div>
				</div>
				<div class="form-group row">
					{!! Form::label('name', 'Descripcion', ['class' => 'col-sm-4 col-form-label']) !!}
				    <div class="col-sm-8">
				    	{!! Form::textarea('description', null, ['class' => 'form-control', 'rows'=>'4', 'style'=>'resize: none;']) !!}
				    </div>
				</div>
					<a href="{{URL('category')}}" role="button" class="btn btn-secondary">Volver</a>
					{!!Form::button('Guardar',['type'=>'submit','class'=>'btn btn-danger'])!!}
			{!! Form::close() !!}
		</div>
	</div>
@stop