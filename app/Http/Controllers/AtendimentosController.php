<?php

namespace App\Http\Controllers;

use App\Atendimentos;
use App\Medicos;
use App\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AtendimentosController extends Controller
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

        $atendimentos = DB::table('atendimentos')
                                ->join('medicos', 'atendimentos.id_medico', '=', 'medicos.id')
                                ->join('pacientes', 'atendimentos.id_paciente', '=', 'pacientes.id')
                                ->select('atendimentos.*', 'pacientes.nome as paciente', 'medicos.nome as medico')->get();

        return view('atendimentos.atendimentos', [
            'atendimentos' => $atendimentos,
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

        $medicos = Medicos::all();
        $pacientes = Pacientes::all();

        return view('atendimentos.create', [
            "medicos" => $medicos,
            "pacientes" => $pacientes,
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
        $atendimentos = new Atendimentos();

        $atendimentos->id_medico = $request->id_medico;
        $atendimentos->id_paciente = $request->id_paciente;
        $atendimentos->altura = $request->altura;
        $atendimentos->peso = $request->peso;
        $atendimentos->sexo = $request->sexo;
        $atendimentos->queixas = $request->queixas;
        $atendimentos->procedimento = $request->procedimento;
        $atendimentos->plano_saude = $request->plano_saude;

        if ($atendimentos->save()) {
            return redirect()->route('atendimento.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Atendimentos  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function show(Atendimentos $atendimento)
    {
        $atendimento_final = DB::table('atendimentos')
            ->join('pacientes', 'atendimentos.id_paciente', '=', 'pacientes.id')
            ->join('medicos', 'atendimentos.id_medico', '=', 'medicos.id')
            ->select('atendimentos.*', 'medicos.nome as medico', 'pacientes.nome as paciente')
            ->where('atendimentos.id', '=', $atendimento->id)->first();

        return view('atendimentos.show', [
            'atendimento' => $atendimento_final,
            'user_login' => Auth::user()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atendimentos  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function edit(Atendimentos $atendimento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atendimentos  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atendimentos $atendimento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atendimentos  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atendimentos $atendimento)
    {
        //
        if ($atendimento->delete()) {
            return redirect()->route('atendimento.index');
        }
    }
}
