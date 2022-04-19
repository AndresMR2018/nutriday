<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\User;

class ClienteController extends Controller
{
   
    public function index()
    {
        //
    }

    public function dashboard(){
        return view('client.dashboard');
    }


    
    public function miCuenta()
    {
     $user = User::find(Auth::id());
        $paciente = Paciente::where('user_id',$user->id)->first();
        // dd($paciente);
        return view('client.cuenta.cuenta',compact('paciente'));
    }

    public function formCuenta()
    {
        $user = User::find(Auth::id());
        $paciente = Paciente::where('user_id',$user->id)->first();
        return view('client.cuenta.editarCuenta',compact('paciente'));
    }

    public function updateCuenta(Request $request)
    {
        $hashpass = Hash::make($request->password);
        $user = User::find(Auth::id());
        if($request->password!=null)
            $user->update(["password"=>$hashpass]);

       $paciente = Paciente::where('user_id',$user->id)->first();
       $paciente->update([
        "nombre"=>$request->nombre,
        "apellido"=>$request->apellido,
        "edad"=>$request->edad,
        "cedula"=>$request->cedula,
        "telefono"=>$request->telefono,
        "tipo_diabetes"=>$request->tipo_diabetes,
       ]);

       if (request()->hasFile('imagen')) {
        $url="";
      $file = $request->imagen;
          $elemento= Cloudinary::upload($file->getRealPath(),['folder'=>'paciente']);
          $public_id = $elemento->getPublicId();
          $url = $elemento->getSecurePath();
    if(is_null($paciente->imagen)){
          $paciente->imagen()->create([
              'url'=>$url,
              'public_id'=>$public_id
              ]);
    }else{
          $pid = $paciente->imagen->public_id;
          Cloudinary::destroy($pid);//Eliminamos la imagen anterior de cloud
          $paciente->imagen()->update([
              'url'=>$url,
              'public_id'=>$public_id
              ]);
    }
    }
       return back();
        
    }
 
    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
