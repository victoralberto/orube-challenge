@extends('index')

@section('content')
    <div class="card" style="width: 60%; margin: auto; margin-top: 10px; margin-bottom: 10px;">
        <div class="card-body">
            <h1 class="card-title">Página de Visualização</h1>
            <div class="form-group">
                <div class="card">
                    <label class="h5" for="nameUser" style="margin-top: 10px; margin-left: 5px;">Médico:</label>
                    <p class="h6" style="margin-left: 5px;">{{ $atendimento->medico }}</p>
                </div>
            </div>
            <div class="form-group">
                <div class="card">
                    <label class="h5" for="nameUser" style="margin-top: 10px; margin-left: 5px;">Paciente:</label>
                    <p class="h6" style="margin-left: 5px;">{{ $atendimento->paciente }}</p>
                </div>
            </div>
            <div class="form-group">
                <div class="card">
                    <label class="h5" for="nameUser" style="margin-top: 10px; margin-left: 5px;">Altura:</label>
                    <p class="h6" style="margin-left: 5px;">{{ $atendimento->altura }}</p>
                </div>
            </div>
            <div class="form-group">
                <div class="card">
                    <label class="h5" for="nameUser" style="margin-top: 10px; margin-left: 5px;">Peso:</label>
                    <p class="h6" style="margin-left: 5px;">{{ $atendimento->peso }}</p>
                </div>
            </div>
            <div class="form-group">
                <div class="card">
                    <label class="h5" for="nameUser" style="margin-top: 10px; margin-left: 5px;">Sexo:</label>
                    <p class="h6" style="margin-left: 5px;">{{ $atendimento->sexo }}</p>
                </div>
            </div>
            <div class="form-group">
                <div class="card">
                    <label class="h5" for="nameUser" style="margin-top: 10px; margin-left: 5px;">Queixas:</label>
                    <p class="h6" style="margin-left: 5px;">{{ $atendimento->queixas }}</p>
                </div>
            </div>
            <div class="form-group">
                <div class="card">
                    <label class="h5" for="nameUser" style="margin-top: 10px; margin-left: 5px;">Procedimento:</label>
                    <p class="h6" style="margin-left: 5px;">{{ $atendimento->procedimento }}</p>
                </div>
            </div>
            <div class="form-group">
                <div class="card">
                    <label class="h5" for="nameUser" style="margin-top: 10px; margin-left: 5px;">Plano de Saúde:</label>
                    <p class="h6" style="margin-left: 5px;">{{ $atendimento->plano_saude }}</p>
                </div>
            </div>
            <a class="btn btn-success" href="{{ route('atendimento.edit', ["atendimento" => $atendimento->id]) }}">Editar</a>
            <a class="btn btn-primary" href="{{ route('atendimento.index') }}">Voltar</a>
        </div>
    </div>
@endsection
