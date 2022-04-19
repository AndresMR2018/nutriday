<?php

namespace App\Http\Controllers;

use App\Models\DatosAntropometrico;
use App\Models\Paciente;
use App\Http\Requests\StoreDatosAntropometricoRequest;
use App\Http\Requests\UpdateDatosAntropometricoRequest;
use Illuminate\Http\Request;

class DatosAntropometricoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function agregarDatosAntropometricos($paciente_id)
    {
        $paciente = Paciente::find($paciente_id);
        $datosantropometricos = DatosAntropometrico::where('paciente_id',$paciente->id)->get();
       
        return view('admin.datosantropometricos.agregar',compact('paciente','datosantropometricos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDatosAntropometricoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DatosAntropometrico::create([
            "altura"=>$request->altura,
            "peso"=>$request->peso,
            "sexo"=>$request->sexo,
            "imc"=>$request->imc,
            "paciente_id"=>$request->paciente_id,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DatosAntropometrico  $datosAntropometrico
     * @return \Illuminate\Http\Response
     */
    public function show(DatosAntropometrico $datosAntropometrico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DatosAntropometrico  $datosAntropometrico
     * @return \Illuminate\Http\Response
     */
    public function edit(DatosAntropometrico $datosAntropometrico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDatosAntropometricoRequest  $request
     * @param  \App\Models\DatosAntropometrico  $datosAntropometrico
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDatosAntropometricoRequest $request, DatosAntropometrico $datosAntropometrico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DatosAntropometrico  $datosAntropometrico
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatosAntropometrico $datosAntropometrico)
    {
        //
    }
}
