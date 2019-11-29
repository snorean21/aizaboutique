@extends('layouts.app')
@section('title', 'Productos')
@section('breadcrumbs')
	<!-- Breadcrumbs-->
      	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              	<a href="{{url('home')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
              	<a href="{{url('product')}}">Productos</a>
            </li>
            <li class="breadcrumb-item active">Crear Nuevo Producto</li>
      	</ol>
    <!-- Cierra Breadcrumbs -->
@endsection
@section('content')
	@include('layouts.components.error')
	<div class="card">
		<div class="card-header">
			<i class="fas fa-plus-square"></i>
			Crear Nuevo Producto
		</div>
		<div class="card-body">
			{!! Form::open(['route'=>'product.store', 'method'=>'POST', 'files'=>true]) !!}
				<div class="form-group row">
					{!! Form::label('image', 'Imagen', ['class' => 'col-sm-4 col-form-label']) !!}
					<div class="col-sm-8">
						<div class="custom-file">
							{!! Form::file('image', ['class' => 'form-control-file', 'id'=>'exampleInputFile']) !!}
						</div>
					</div>
				</div>
				<div class="form-group row">
					{!! Form::label('reference', 'Referencia', ['class' => 'col-sm-4 col-form-label']) !!}
					<div class="col-sm-8">
						{!! Form::text('reference', null, ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group row">
					{!! Form::label('category', 'Categoria', ['class' => 'col-sm-4 col-form-label']) !!}
					<div class="col-sm-8">
						{!! Form::text('category', null, ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group row">
					{!! Form::label('color', 'Color', ['class' => 'col-sm-4 col-form-label']) !!}
					<div class="col-sm-8">
						{!! Form::text('color', null, ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group row">
					{!! Form::label('size', 'Talla', ['class' => 'col-sm-4 col-form-label']) !!}
					<div class="col-sm-8">
						{!! Form::text('size', null, ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group row">
					{!! Form::label('description', 'Descripcion', ['class' => 'col-sm-4 col-form-label']) !!}
					<div class="col-sm-8">
						{!! Form::textarea('description', null, ['class' => 'form-control', 'rows'=>'4', 'style'=>'resize: none;']) !!}
					</div>
				</div>
				<div class="form-group row">
					{!! Form::label('unit_price', 'Precio Unidad', ['class' => 'col-sm-4 col-form-label']) !!}
					<div class="col-sm-8">
						{!! Form::text('unit_price', null, ['class' => 'form-control']) !!}
					</div>
				</div><div class="form-group row">
					{!! Form::label('price_for_wholesale', 'Precio Por Mayor', ['class' => 'col-sm-4 col-form-label']) !!}
					<div class="col-sm-8">
						{!! Form::text('price_for_wholesale', null, ['class' => 'form-control']) !!}
					</div>
				</div>
				<a href="{{URL('product')}}" role="button" class="btn btn-secondary">Volver</a>
				{!!Form::button('Guardar',['type'=>'submit','class'=>'btn btn-danger'])!!}
			{!! Form::close() !!}
		</div>
	</div><br>
@stop