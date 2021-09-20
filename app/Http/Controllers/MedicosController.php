<?php

namespace App\Http\Controllers;

use App\Medicos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check() === false) {
            return redirect()->route('login');
        }

        $medicos = Medicos::all();

        return view('medicos.medicos', [
            "medicos" => $medicos,
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
        //
        if (Auth::check() === false) {
            return redirect()->route('login');
        }

        return view('medicos.create', [
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
        $medicos = new Medicos();

        $medicos->nome = $request->name;
        $medicos->cpf = $request->cpf;
        $medicos->email = $request->email;
        $medicos->rg = $request->rg;
        $medicos->matricula = $request->matricula;
        $medicos->data_nascimento = date('Y-m-d', strtotime($request->data_nascimento));
        $medicos->telefone = $request->telefone;

        if ($medicos->save()) {
            return redirect()->route('medico.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function show(Medicos $medico)
    {
        //
        if (Auth::check() === false) {
            return redirect()->route('login');
        }

        return view('medicos.show', [
            "medico" => $medico,
            'user_login' => Auth::user()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicos $medico)
    {
        //
        if (Auth::check() === false) {
            return redirect()->route('login');
        }

        return view('medicos.edit', [
            "medico" => $medico,
            'user_login' => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicos $medico)
    {
        //
        $medico->nome = $request->nome;
        $medico->cpf = $request->cpf;
        $medico->email = $request->email;
        $medico->rg = $request->rg;
        $medico->matricula = $request->matricula;
        $medico->data_nascimento = date('Y-m-d', strtotime($request->data_nascimento));
        $medico->telefone = $request->telefone;

        if ($medico->save()) {
            return redirect()->route('medico.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicos $medicos)
    {
        //
    }
}
