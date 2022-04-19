@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Mi perfil cliente
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('administrador.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mi perfil</li>
        </ol>
    </nav>
</div>
<div class="row">
    
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Mi perfil</h4>
               
                <form method="POST" action="{{route('cliente.updateCuenta')}}" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm-9">
                            <input  name="nombre" type="text" value="{{$paciente->nombre}}" class="form-control" id="exampleInputUsername2"
                                >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Apellido</label>
                        <div class="col-sm-9">
                            <input  name="apellido" type="text" value="{{$paciente->apellido}}" class="form-control" id="exampleInputUsername2"
                                >
                        </div>
                    </div>

                   
                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Cédula</label>
                        <div class="col-sm-9">
                            <input name="cedula" type="text" value="{{$paciente->cedula}}" class="form-control" id="exampleInputEmail2"
                                >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Edad</label>
                        <div class="col-sm-9">
                            <input name="edad" type="text" value="{{$paciente->edad}}" class="form-control" id="exampleInputEmail2"
                                >
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputMobile"
                            class="col-sm-3 col-form-label">Teléfono</label>
                        <div class="col-sm-9">
                            <input name="telefono" type="text" value="{{$paciente->telefono}}" class="form-control" id="exampleInputMobile"
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Correo electrónico</label>
                        <div class="col-sm-9">
                            <input name="email" value="{{$paciente->user->email}}" type="email" class="form-control" id="exampleInputEmail2"
                              disabled>
                        </div>
                    </div>

                 

                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Tipo de diabetes</label>
                        <div class="col-sm-9">
                        <select class="form-control" name="tipo_diabetes" id="" >
                              <option selected disabled>Seleccione una opción</option>
                              <option value="1">Tipo 1</option>
                              <option value="2">Tipo 2</option>
                              <option value="3">Gestacional</option>
                          </select>
                        </div>
                    </div>

                    @if(isset($paciente->imagen->url))
                   <div class="form-group row">
                        <label for="exampleInputPassword2"
                            class="col-sm-3 col-form-label">Foto actual</label>
                        <div class="col-sm-9">
                       <img src="{{$paciente->imagen->url}}">
                        </div>
                    </div>
                    @endif

                    <div class="form-group row">
                        <label for="exampleInputPassword2"
                            class="col-sm-3 col-form-label">Actualizar foto</label>
                        <div class="col-sm-9">
                            <input name="imagen" type="file" class="form-control"
                                id="imagen" placeholder="imagen">
                        </div>
                    </div>
                    
                  
                    <button href="{{route('cliente.editarCuenta')}}" class="btn btn-primary mr-2">Guardar cambios</button>
                <!-- <button class="btn btn-light">Cancel</button> -->
                </form>
            </div>
        </div>
    </div>
    
</div>
@endsection
