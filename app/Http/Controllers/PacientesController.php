<?php

namespace App\Http\Controllers;

use App\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\Attributes\Util\AttributesHelper;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() === false) {
            return redirect()->route('login');
        }
        $pacientes = Pacientes::all();
        return view('pacientes.pacientes', [
            "pacientes" => $pacientes,
            'user_login' => Auth::user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check() === false) {
            return redirect()->route('login');
        }

        return view('pacientes.create', [
            'user_login' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $paciente = new Pacientes();

        $paciente->nome = $request->name;
        $paciente->cpf = $request->cpf;
        $paciente->email = $request->email;
        $paciente->rg = $request->rg;
        $paciente->data_nascimento = date('Y-m-d', strtotime($request->data_nascimento));
        $paciente->telefone = $request->telefone;

        if ($paciente->save()) {
            return redirect()->route('paciente.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function show(Pacientes $paciente)
    {
        if (Auth::check() === false) {
            return redirect()->route('login');
        }

        return view('pacientes.show', [
            'paciente' => $paciente,
            'user_login' => Auth::user()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Pacientes $paciente)
    {
        if (Auth::check() === false) {
            return redirect()->route('login');
        }

        return view('pacientes.edit', [
            'paciente' => $paciente,
            'user_login' => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pacientes $paciente)
    {
        $paciente->nome = $request->nome;
        $paciente->cpf = $request->cpf;
        $paciente->rg = $request->rg;
        $paciente->data_nascimento = $request->data_nascimento;
        $paciente->email = $request->email;
        $paciente->telefone = $request->telefone;

        if ($paciente->save()) {
            return redirect()->route('paciente.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pacientes $paciente)
    {
        //
        if ($paciente->delete()) {
            return redirect()->route('paciente.index');
        }
    }
}
