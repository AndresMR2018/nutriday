@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Editar datos de administración
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('administrador.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar perfil</li>
        </ol>
    </nav>
</div>

<div class="row">
    
    <div class="col-md-12 grid-margin stretch-card">
        <form method="POST"  action="{{route('admin.updateCuenta')}}"  class="forms-sample">
                    @csrf
            <div class="card" style="display:flex; flex-wrap:wrap; flex-direction:row;">
            
                <!-- <h4 class="card-title">Mi perfil</h4> -->

               <div class="imagencard" style="margin:10px 10px;">

                        <img style="max-width:300px;" src="{{asset('img/icons/Administrador.png')}}"> 
               </div>
               <div class="infopaciente" style=" margin-top:50px; margin-left:100px;">
                   <h5 style="padding-bottom:10px;">Email:{{$administrador->user->email}}</h5>
               
                   <input  name="password" type="password" class="form-control" placeholder="Nueva contraseña" id="exampleInputUsername2"
                                >
                                <input  name="confirm-password" style="my-2 mx-2" type="password" placeholder="Confirmar nueva contraseña" class="form-control" id="exampleInputUsername2"
                                >

                    <div style="display:flex; justify-content:center;">
                    <button  type="submit" class="btn btn-success">Guardar cambios</button>
                   </div>
               </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
