<?php

namespace App\Http\Controllers;

use App\Models\Dieta;
use App\Models\Alimento;
use App\Http\Requests\StoreDietaRequest;
use App\Http\Requests\UpdateDietaRequest;
use Illuminate\Http\Request;

class DietaController extends Controller
{
    
    public function index()
    {
        $dietas = Dieta::all();
       return view('nutri.dieta.index',compact('dietas'));
    }


    public function create()
    {
        $alimentos = Alimento::all();
        return view('nutri.dieta.create',compact('alimentos'));
    }

    
    public function store(Request $request)
    {
        
        $dieta = Dieta::create([
            "nombre"=>$request->nombre,
            "tipo_diabetes"=>$request->tipo_diabetes,
            "fecha_fin"=>$request->fecha_fin
        ]);
        return redirect()->route('alimento.create',compact('dieta'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dieta  $dieta
     * @return \Illuminate\Http\Response
     */
    public function show(Dieta $dieta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dieta  $dieta
     * @return \Illuminate\Http\Response
     */
    public function edit(Dieta $dieta)
    {
        //
    }

    public function eliminarDieta($id){
        Dieta::destroy($id);
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDietaRequest  $request
     * @param  \App\Models\Dieta  $dieta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //validacion campos no null

        $dieta = Dieta::find($id);
        
        $dieta->update([
            "nombre"=>$request->nombre,
            "tipo_diabetes"=>$request->tipo_diabetes,
            "fecha_fin"=>$request->fecha_fin,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dieta  $dieta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Dieta::destroy($id);
        return back();
    }
}
