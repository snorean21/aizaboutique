@extends('layouts.app')
@section('title', 'Mi perfil')
@section('breadcrumbs')
	<!-- Breadcrumbs-->
      	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              	<a href="{{url('home')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item active">Mi perfil</li>
      	</ol>
    <!-- Cierra Breadcrumbs -->
@endsection
@section('content')
	@include('layouts.components.error')
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			Mostrando perfil de {{ auth()->user()->name }}
		</div>
		<div class="card-body">
			<div class="table-responsive">
				{!! Form::model($users, ['route'=>['user.update', $users->id], 'method'=>'PUT', 'files'=>true, 'class'=>'form-group']) !!}
						<div class="accordion" id="accordionExample">
							{{-- Informacion General--}}
								<div class="card">
									<div class="card-header" id="headingOne">
										<h5 class="mb-0">
											<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											Informacion general
											</button>
										</h5>
									</div>
									<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
										<div class="card-body">
											{{-- Informacion de Personal --}}
												<h5>Informacion de Personal</h5>
												<hr>
												{{-- Imagen --}}
													{{-- este es el que toca usar a futuro, cuando el host de windows este configurado --}}
													{{-- <img class="card-img-top" src="{{ Storage::disk('public')->url($users->avatar) }}" style="width: 200px; margin: 10px auto;">
													<br> --}}
													@if($users->avatar == 'default.jpg')
														<img src="{{Storage::url('default.jpg')}}" style="width: 200px; margin: 10px auto;">
													@else
														<img class="card-img-top" src="{{ Storage::disk('public')->url(auth()->user()->avatar) }}" alt="Card image cap" style="width: 200px; margin: 10px auto;">
													@endif
													<br>
												{{-- Nombre de Usuario --}}
													{!! Form::label('name', 'Nombre de Usuario') !!}
													---> "{{ auth()->user()->name ?: 'Sin Departamento de Residencia (Actualizar Informacion!!!)' }}"<br>
												{{-- Correo Electronico --}}
													{!! Form::label('email', 'Correo Electronico') !!}
													---> "{{ auth()->user()->email ?: 'Sin Correo Electronico (Actualizar Informacion!!!)' }}"<br>
												{{-- Fecha de Nacimiento --}}
													{!! Form::label('Fecha de Nacimiento', '') !!}
													---> "{{ auth()->user()->birth_date_user ?: 'Sin Fecha de Nacimineto  (Actualizar Informacion!!!)' }}"<br>
												{{-- Genero --}}
													{!! Form::label('sex', 'Genero') !!}
													---> "{{ auth()->user()->sex ?: 'Sin Genero (Actualizar Informacion!!!)' }}"<br>
												{{-- Idioma --}}
													{!! Form::label('lenguages', 'Idioma') !!}
													---> "{{ auth()->user()->lenguages ?: 'Sin Idioma (Actualizar Informacion!!!)' }}"<br>
												{{-- Religion --}}
													{!! Form::label('religion', 'Religion') !!}
													---> "{{ auth()->user()->religion ?: 'Sin Religion (Actualizar Informacion!!!)' }}"<br>
												<br>
											<h5>Informacion de Residencia</h5>
											<hr>
											{{-- Pais --}}
												{!! Form::label('country_user', 'Pais') !!}
												---> "{{ auth()->user()->country_user ?: 'Sin Pais de Residencia (Actualizar Informacion!!!)' }}"<br>
											{{-- Departamento --}}
												{!! Form::label('department_user', 'Departamento') !!}
												---> "{{ auth()->user()->department_user ?: 'Sin Departamento de Residencia (Actualizar Informacion!!!)' }}"<br>
											{{-- Ciudad  --}}
												{!! Form::label('city_user', 'Ciudad') !!}
												---> "{{ auth()->user()->city_user ?: 'Sin Ciudad de Residencia (Actualizar Informacion!!!)' }}"<br>
											{{-- Direccion --}}
												{!! Form::label('address_user', 'Direccion') !!}
												---> "{{ auth()->user()->address_user ?: 'Sin Direccion de Residencia (Actualizar Informacion!!!)' }}"<br>
											<br>
											<h5>Informacion Familiar</h5>
											<hr>
											{{-- Nombre del Familiar --}}
												{!! Form::label('family_name', 'Nombre del Familiar') !!}
												---> "{{ auth()->user()->family_name ?: 'Sin Nombre del Familiar (Actualizar Informacion!!!)' }}"<br>
											{{-- Relacion con el Familiar --}}
												{!! Form::label('family_relationship', 'Relacion con el Familiar') !!}
												---> "{{ auth()->user()->family_relationship ?: 'Sin Relacion con el Familiar (Actualizar Informacion!!!)' }}"<br>
											{{-- Situacion Sentimental --}}
												{!! Form::label('emotional_situation', 'Situacion Sentimental') !!}
												---> "{{ auth()->user()->emotional_situation ?: 'Sin Situacion Sentimental (Actualizar Informacion!!!)' }}"<br>
											<br>
											<h5>Informacion de Empleo</h5>
											<hr>
											{{-- Nombre de la Empresa --}}
												{!! Form::label('company_name', 'Nombre de la Empresa') !!}
												---> "{{ auth()->user()->company_name ?: 'Sin Nombre de la Empresa (Actualizar Informacion!!!)' }}"<br>
											{{-- Cargo --}}
												{!! Form::label('job_company', 'Cargo') !!}
												---> "{{ auth()->user()->job_company ?: 'Sin Cargo (Actualizar Informacion!!!)' }}"<br>
											{{-- Ciudad donde Trabaja --}}
												{!! Form::label('city_company', 'Ciudad donde Trabaja') !!}
												---> "{{ auth()->user()->city_company ?: 'Sin Ciudad donde Trabaja (Actualizar Informacion!!!)' }}"<br>
											{{-- Fecha de Admision --}}
												{!! Form::label('date_of_admission_company', 'Fecha de Admision') !!}
												---> "{{ auth()->user()->date_of_admission_company ?: 'Sin Fecha de Admision (Actualizar Informacion!!!)' }}"<br>
											{{-- Periodo de Tiempo --}}
												{!! Form::label('time_frame_company', 'Periodo de Tiempo') !!}
												---> "{{ auth()->user()->time_frame_company ?: 'Sin Periodo de Tiempo (Actualizar Informacion!!!)' }}"<br>
											<br>
											<h5>Informacion de Estudio</h5>
											<hr>
											<h6>Universidad</h6>
											<hr>
											{{-- Nombre de la Universidad --}}
												{!! Form::label('university_name', 'Nombre de la Universidad') !!}
												---> "{{ auth()->user()->university_name ?: 'Sin Nombre de la Universidad (Actualizar Informacion!!!)' }}"<br>
											{{-- Periodo de Tiempo en la Universidad --}}
												{!! Form::label('time_frame_university', 'Periodo de Tiempo en la Universidad') !!}
												---> "{{ auth()->user()->time_frame_university ?: 'Sin Periodo de Tiempo en la Universidad (Actualizar Informacion!!!)' }}"<br>
											{{-- Estudios Finalizados en la Universidad --}}
												{!! Form::label('completed_studies_university', 'Estudios Finalizados en la Universidad') !!}
												---> "{{ auth()->user()->completed_studies_university ?: 'Sin Estudios Finalizados en la Universidad (Actualizar Informacion!!!)' }}"<br>
											{{-- Titulo Adquirido en la Universidad --}}
												{!! Form::label('title_university', 'Titulo Adquirido en la Universidad') !!}
												---> "{{ auth()->user()->title_university ?: 'Sin Titulo Adquirido en la Universidad (Actualizar Informacion!!!)' }}"<br>
											<hr>
											<h6>Escuela Secundaria</h6>
											<hr>
											{{-- Nombre de la Escuela --}}
												{!! Form::label('school_name', 'Nombre de la Escuela') !!}
												---> "{{ auth()->user()->school_name ?: 'Sin Nombre de la Escuela (Actualizar Informacion!!!)' }}"<br>
											{{-- Periodo de Tiempo en la Escuela --}}
												{!! Form::label('time_frame_school', 'Periodo de Tiempo en la Escuela') !!}
												---> "{{ auth()->user()->time_frame_school ?: 'Sin Periodo de Tiempo en la Escuela (Actualizar Informacion!!!)' }}"<br>
											{{-- Estudios Finalizados en la Escuela --}}
												{!! Form::label('completed_studies_school', 'Estudios Finalizados en la Escuela') !!}
												---> "{{ auth()->user()->completed_studies_school ?: 'Sin Estudios Finalizados en la Escuela (Actualizar Informacion!!!)' }}"<br>
										</div>
									</div>
								</div>
							{{-- Actualizar Informacion Personal --}}
								<div class="card">
									<div class="card-header" id="headingTwo">
										<h5 class="mb-0">
											<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												Actualizar Informacion personal
											</button>
										</h5>
									</div>
									<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
										<div class="card-body">
											<h6>Informacion Personala</h6>
											<hr>
											{{-- Collapse Button Imagen->Avatar --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAvatar" aria-expanded="false" aria-controls="collapseAvatar">
												Imagen
												</button>
												{{-- Collapse Imagen->Avatar --}}
													<div class="collapse multi-collapse" id="collapseAvatar">
														<div class="form-group">
															<div class="card" style="width: 100%;">
																	@if($users->avatar == 'default.jpg')
																		<img src="{{Storage::url('default.jpg')}}" style="width: 200px; margin: 10px auto;">
																	@else
																		<img class="card-img-top" src="{{ Storage::disk('public')->url(auth()->user()->avatar) }}" alt="Card image cap" style="width: 200px; margin: 10px auto;">
																	@endif
																	<div class="messages">
																			@if(session('mensajito'))
																				<h2>
																					{{session('mensajito')}}
																				</h2>
																			@endif
																	</div>
																<div class="card-body">
																	{!! Form::label('avatar', 'Seleccione su imagen') !!}
														   			{!! Form::file('avatar', ['class' => 'form-control']) !!}
																</div>
															</div>
														</div>
													</div>
											{{-- Collapse Button Nombre Usuario->Name --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseName" aria-expanded="false" aria-controls="collapseName">
												Nombre Usuario
												</button>
												{{-- Collapse Nombre Usuario->Name --}}
													<div class="collapse multi-collapse" id="collapseName">
														<div class="form-group">
															{!! Form::label('name', 'Nombre Usuario') !!}
															{!! Form::text('name', null, ['class' => 'form-control']) !!}
														</div>
													</div>
											{{-- Collapse Button Correo Electronico->email --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseEmail" aria-expanded="false" aria-controls="collapseEmail">
												Correo Electronico
												</button>
												{{-- Collapse Correo Electronico->email --}}
													<div class="collapse multi-collapse" id="collapseEmail">
														<div class="form-group">
															{!! Form::label('email', 'Correo Electronico') !!}
															{!! Form::email('email', null, ['class' => 'form-control']) !!}
														</div>
													</div>
											{{-- Collapse Button Contraseña->Password --}}
												{{-- <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePassword" aria-expanded="false" aria-controls="collapsePassword">
												Contraseña
												</button> --}}
												{{-- Collapse Contraseña->Password --}}
													{{-- <div class="collapse multi-collapse" id="collapsePassword">
														<div class="form-group">
															{!! Form::label('password', 'Contraseña') !!}
															{!! Form::password('password', ['class' => 'form-control']) !!}
														</div>
													</div> --}}
											{{-- Collapse Button Fecha de Nacimiento->birth_date_user --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseBirth_Date_User" aria-expanded="false" aria-controls="collapseBirth_Date_User">
												Fecha de nacimiento
												</button>
												{{-- Collapse Fecha de Nacimiento->birth_date_user --}}
													<div class="collapse multi-collapse" id="collapseBirth_Date_User">
														<div class="form-group">
															{!! Form::label('birth_date_user', 'Fecha de nacimiento') !!}
															{!! Form::date('birth_date_user', null, ['class' => 'form-control']) !!}
														</div>
													</div>
											{{-- Collapse Button Genero->sex --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseSex" aria-expanded="false" aria-controls="collapseSex">
												Genero
												</button>
												{{-- Collapse Genero->sex --}}
													<div class="collapse multi-collapse" id="collapseSex">
														<div class="form-group">
															{!! Form::label('sex', 'Genero') !!}
															{!! Form::select('sex',
															[
																'Masculino' => 'Masculino',
																'Femenino' => 'Femenino',
															],
															null, ['placeholder' => 'Seleccione su Genero', 'class' => 'form-control']) !!}
														</div>
													</div>
											{{-- Collapse Button Idioma->lenguages --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLenguages" aria-expanded="false" aria-controls="collapseLenguages">
												Idioma
												</button>
												{{-- Collapse Idioma->Lenguages --}}
													<div class="collapse multi-collapse" id="collapseLenguages">
														<div class="form-group">
															{!! Form::label('lenguages', 'Idioma') !!}
															{!! Form::select('lenguages',
															[
																'Español' => 'Español',
																'Ingles' => 'Ingles',
															],
															null, ['placeholder' => 'Seleccione su Genero', 'class' => 'form-control']) !!}
														</div>
													</div>
											{{-- Collapse Button Religion->Religion --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseReligion" aria-expanded="false" aria-controls="collapseReligion">
												Religion
												</button>
												{{-- Collapse Religion->Religion --}}
													<div class="collapse multi-collapse" id="collapseReligion">
														<div class="form-group">
															{!! Form::label('religion', 'Religion') !!}
															{!! Form::text('religion', null, ['class' => 'form-control']) !!}
														</div>
													</div>
										</div>
									</div>
								</div>
							{{-- Actualizar Informacion Residencia --}}
								<div class="card">
									<div class="card-header" id="headingThree">
										<h5 class="mb-0">
											<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
												Actualizar Informacion de Residencia
											</button>
										</h5>
									</div>
									<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
										<div class="card-body">
											<h6>Informacion de Residencia</h6>
											<hr>
											{{-- Collapse Button Pais->country_user --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseConuntry_User" aria-expanded="false" aria-controls="collapseConuntry_User">
												Pais
												</button>
												{{-- Collapse Pais->country_user --}}
													<div class="collapse multi-collapse" id="collapseConuntry_User">
														<div class="form-group">
															{!! Form::label('country_user', 'Pais') !!}
															{!! Form::select('country_user', [''=>'No Quiero','colombia' => 'Colombia'], null, ['placeholder' => 'Seleccione el Pais de residencia...', 'class' => 'form-control']) !!}
														</div>
													</div>
											{{-- Collapse Button Departamento->department_user --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDepartment_User" aria-expanded="false" aria-controls="collapseDepartment_User">
													Departamento
												</button>
												{{-- Collapse Departamento->department_user --}}
													<div class="collapse multi-collapse" id="collapseDepartment_User">
														<div class="form-group">
															{!! Form::label('department_user', 'Departamento') !!}
															{!! Form::select('department_user',
															[
																'Quindio' => 'Quindio',
																'Risaralda' => 'Risaralda'
															],
															null, ['placeholder' => 'Seleccione el Departamento de Residencia...', 'class' => 'form-control']) !!}
														</div>
													</div>
											{{-- Collapse Button Ciudad->city_user --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCity_User" aria-expanded="false" aria-controls="collapseCity_User">
												Ciudad
												</button>
												{{-- Collapse Ciudad->city_user --}}
													<div class="collapse multi-collapse" id="collapseCity_User">
														<div class="form-group">
															{!! Form::label('city_user', 'Ciudad') !!}
															{!! Form::select('city_user',
															[
																'Armenia' => 'Armenia',
																'Pereira' => 'Pereira'
															],
															null, ['placeholder' => 'Seleccione la Ciudad de Residencia...', 'class' => 'form-control']) !!}
														</div>
													</div>
											{{-- Collapse Button Direccion->address_user --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAddress_User" aria-expanded="false" aria-controls="collapseAddress_User">
												Direccion
												</button>
												{{-- Collapse address_user --}}
													<div class="collapse multi-collapse" id="collapseAddress_User">
														<div class="form-group">
															{!! Form::label('address_user', 'Direccion') !!}
															{!! Form::text('address_user', null, ['class' => 'form-control']) !!}
														</div>
													</div>
										</div>
									</div>
								</div>
							{{-- Actualizar Informacion Familiar --}}
								<div class="card">
									<div class="card-header" id="headingFour">
										<h5 class="mb-0">
											<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
												Actualizar Informacion de Familiar
											</button>
										</h5>
									</div>
									<div id="collapsefour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
										<div class="card-body">
											<h6>Informacion de Familiar</h6>
											<hr>
											{{-- Collapse Button Nombre del Familiar->family_name --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseFamily_Name" aria-expanded="false" aria-controls="collapseFamily_Name">
												Nombre del Familiar
												</button>
												{{-- Collapse Nombre del Familiar->family_name --}}
													<div class="collapse multi-collapse" id="collapseFamily_Name">
														<div class="form-group">
															{!! Form::label('family_name', 'Nombre del Familiar') !!}
															{!! Form::text('family_name', null, ['class' => 'form-control']) !!}
														</div>
													</div>
											{{-- Collapse Button Relacion con el Familiar->family_relationship --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseFamily_Relationship" aria-expanded="false" aria-controls="collapseFamily_Relationship">
													Relacion con el Familiar
												</button>
												{{-- Collapse Relacion con el Familiar->Family_Relationship --}}
													<div class="collapse multi-collapse" id="collapseFamily_Relationship">
														<div class="form-group">
															{!! Form::label('family_relationship', 'Relacion con el Familiar') !!}
															{!! Form::select('family_relationship',
															[
																'Madre' => 'Madre',
																'Padre' => 'Padre',
																'Hijo' => 'Hijo',
																'Hija' => 'Hija',
																'Hermana' => 'Hermana',
																'Hermano' => 'Hermano',
																'Tio' => 'Tio',
																'Tia' => 'Tia',
																'Prima' => 'Prima',
																'Primo' => 'Primo',
																'Abuelo' => 'Abuelo',
																'Abuela' => 'Abuela',
																'Padrastro' => 'Padrastro',
																'Madrastra' => 'Madrastra',
																'Hermastro' => 'Hermastro',
																'Hermanastra' => 'Hermanastra',
																'Esposo' => 'Esposo',
																'Esposa' => 'Esposa',
															],
															null, ['placeholder' => 'Seleccione su Relacion con el Familiar', 'class' => 'form-control']) !!}
														</div>
													</div>
											{{-- Collapse Button Situcaion Sentimental->emotional_situation --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse_Emotional_Situation" aria-expanded="false" aria-controls="collapse_Emotional_Situation">
												Situcaion Sentimental
												</button>
												{{-- Collapse Situcaion Sentimental->_Emotional_Situation --}}
													<div class="collapse multi-collapse" id="collapse_Emotional_Situation">
														<div class="form-group">
															{!! Form::label('emotional_situation', 'Situcaion Sentimental') !!}
															{!! Form::select('emotional_situation',
															[
																'Soltero(a)' => 'Soltero(a)',
																'En una relacion' => 'En una relacion',
																'Comprometido(a)' => 'Comprometido(a)',
																'Casado(a)' => 'Casado(a)',
																'Union Civil' => 'Union Civil',
																'Pareja de hecho' => 'Pareja de hecho',
																'Relacion abierta' => 'Relacion abierta',
																'Es complicado' => 'Es complicado',
																'Separado(a)' => 'Separado(a)',
																'Divorciado(a)' => 'Divorciado(a)',
																'Viudo(a)' => 'Viudo(a)'
															],
															null, ['placeholder' => 'Seleccione su Situacion Sentimental', 'class' => 'form-control']) !!}
														</div>
													</div>
										</div>
									</div>
								</div>
							{{-- Actualizar Informacion Empleo --}}
								<div class="card">
									<div class="card-header" id="headingFive">
										<h5 class="mb-0">
											<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
												Actualizar Informacion de Empleo
											</button>
										</h5>
									</div>
									<div id="collapsefive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
										<div class="card-body">
											<h6>Informacion de Empleo</h6>
											<hr>
											{{-- Collapse Button Nombre de la Empresa->Company_Name --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCompany_Name" aria-expanded="false" aria-controls="collapseCompany_Name">
												Nombre de la Empresa
												</button>
												{{-- Collapse Nombre de la Empresa->Company_Name --}}
													<div class="collapse multi-collapse" id="collapseCompany_Name">
														<div class="form-group">
															{!! Form::label('company_name', 'Nombre de la Empresa') !!}
															{!! Form::text('company_name', null, ['class' => 'form-control']) !!}
														</div>
													</div>
											{{-- Collapse Button Cargo->Job_ompany --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseJob_ompany" aria-expanded="false" aria-controls="collapseJob_ompany">
													Cargo
												</button>
												{{-- Collapse Cargo->Job_ompany --}}
													<div class="collapse multi-collapse" id="collapseJob_ompany">
														<div class="form-group">
															{!! Form::label('job_company', 'Cargo') !!}
															{!! Form::text('job_company', null, ['class' => 'form-control']) !!}
														</div>
													</div>
											{{-- Collapse Button Ciudad donde Trabaja->City_Company --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse_City_Company" aria-expanded="false" aria-controls="collapse_City_Company">
												Ciudad donde Trabaja
												</button>
												{{-- Collapse Ciudad donde Trabaja->_City_Company --}}
													<div class="collapse multi-collapse" id="collapse_City_Company">
														<div class="form-group">
															{!! Form::label('city_company', 'Ciudad donde Trabaja') !!}
															{!! Form::select('city_company',
															[
																'Armenia' => 'Armenia',
																'Pereira' => 'Pereira',
															], null, ['placeholder' => 'Seleccione su Situacion Sentimental', 'class' => 'form-control']) !!}
														</div>
													</div>
											{{-- Collapse Button Fecha de admision->Date_Of_Admission_Company --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse_Date_Of_Admission_Company" aria-expanded="false" aria-controls="collapse_Date_Of_Admission_Company">
												Fecha de admision
												</button>
												{{-- Collapse Fecha de admision->_Date_Of_Admission_Company --}}
													<div class="collapse multi-collapse" id="collapse_Date_Of_Admission_Company">
														<div class="form-group">
															{!! Form::label('date_of_admission_company', 'Fecha de admision') !!}
															{!! Form::date('date_of_admission_company', null, ['class' => 'form-control']) !!}
														</div>
													</div>
											{{-- Collapse Button Periodo de tiempo en la empresa->Time_Frame_Company --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseTime_Frame_Company" aria-expanded="false" aria-controls="collapseTime_Frame_Company">
												Periodo de tiempo en la empresa
												</button>
												{{-- Collapse Periodo de tiempo en la empresa->Time_Frame_Company --}}
													<div class="collapse multi-collapse" id="collapseTime_Frame_Company">
														<div class="form-group row mgn">
															<div class="col-sm-2">Checkbox</div>
															<div class="col-sm-10">
																<div class="form-check">
																	{!!Form::checkbox('time_frame_company', null)!!}
																	{!! Form::label('time_frame_company', 'Actualmente trabaja aqui') !!}
																</div>
																{!! Form::date('time_frame_company', null, ['class' => 'form-control']) !!}
															</div>
														</div>
													</div>
										</div>
									</div>
								</div>
							{{-- Actualizar Informacion Estudio --}}
								<div class="card">
									<div class="card-header" id="headingsix">
										<h5 class="mb-0">
											<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
												Actualizar Informacion de Estudio
											</button>
										</h5>
									</div>
									<div id="collapsesix" class="collapse show" aria-labelledby="headingsix" data-parent="#accordionExample">
										<div class="card-body">
											<h6>Informacion de Universidad</h6>
											<hr>
											{{-- Collapse Button Nombre de la Empresa->university_name --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse_University_name" aria-expanded="false" aria-controls="collapse_University_name">
												Nombre de la Universidad
												</button>
												{{-- Collapse Nombre de la Empresa->_University_name --}}
													<div class="collapse multi-collapse" id="collapse_University_name">
														<div class="form-group">
															{!! Form::label('university_name', 'Nombre de la Empresa') !!}
															{!! Form::text('university_name', null, ['class' => 'form-control']) !!}
														</div>
													</div>
											{{-- Collapse Button Periodo de Tiempo en la Universidad->Time_Frame_University --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse_Time_Frame_University" aria-expanded="false" aria-controls="collapse_Time_Frame_University">
													Periodo de Tiempo en la Universidad
												</button>
												{{-- Collapse Periodo de Tiempo en la Universidad->_Time_Frame_University --}}
													<div class="collapse multi-collapse" id="collapse_Time_Frame_University">
														<div class="form-group row mgn">
															<div class="col-sm-2">Checkbox</div>
															<div class="col-sm-10">
																<div class="form-check">
																	{!!Form::checkbox('time_frame_company', null)!!}
																	{!! Form::label('time_frame_company', 'Actualmente trabaja aqui') !!}
																</div>
																{!! Form::date('time_frame_company', null, ['class' => 'form-control']) !!}
															</div>
														</div>
													</div>
											{{-- Collapse Button Ciudad donde Trabaja->City_Company --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse_City_Company" aria-expanded="false" aria-controls="collapse_City_Company">
												Ciudad donde Trabaja
												</button>
												{{-- Collapse Ciudad donde Trabaja->_City_Company --}}
													<div class="collapse multi-collapse" id="collapse_City_Company">
														<div class="form-group">
															{!! Form::label('city_company', 'Ciudad donde Trabaja') !!}
															{!! Form::select('city_company',
															[
																'Armenia' => 'Armenia',
																'Pereira' => 'Pereira',
															],
															null, ['placeholder' => 'Ciudad donde Trabaja', 'class' => 'form-control']) !!}
														</div>
													</div>
											{{-- Collapse Button Fecha de admision->Date_Of_Admission_Company --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse_Date_Of_Admission_Company" aria-expanded="false" aria-controls="collapse_Date_Of_Admission_Company">
												Fecha
												</button>
												{{-- Collapse Fecha de admision->_Date_Of_Admission_Company --}}
													<div class="collapse multi-collapse" id="collapse_Date_Of_Admission_Company">
														<div class="form-group">
															{!! Form::label('date_of_admission_company', 'Fecha de admision') !!}
															{!! Form::date('date_of_admission_company', null, ['class' => 'form-control']) !!}
														</div>
													</div>
											{{-- Collapse Button Periodo de tiempo en la empresa->Time_Frame_Company --}}
												<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseTime_Frame_Company" aria-expanded="false" aria-controls="collapseTime_Frame_Company">
												Periodo de tiempo en la empresa
												</button>
												{{-- Collapse Periodo de tiempo en la empresa->Time_Frame_Company --}}
													<div class="collapse multi-collapse" id="collapseTime_Frame_Company">
														<div class="form-group row mgn">
															<div class="col-sm-2">Checkbox</div>
															<div class="col-sm-10">
																<div class="form-check">
																	{!!Form::checkbox('time_frame_company', null)!!}
																	{!! Form::label('time_frame_company', 'Actualmente trabaja aqui') !!}
																</div>
																{!! Form::date('time_frame_company', null, ['class' => 'form-control']) !!}
															</div>
														</div>
													</div>
											<h6 class="mgn2">Informacion de Escuela Secundaria</h6>
											<hr>

										</div>
									</div>
								</div>
						</div>
						<br>
					<a href="{{URL('home')}}" role="button" class="btn btn-secondary">Volver</a>
					{!!Form::button('Guardar',['type'=>'submit','class'=>'btn btn-danger'])!!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop