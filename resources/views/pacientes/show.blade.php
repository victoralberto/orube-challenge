@extends('index')

@section('content')
    <div class="card" style="width: 60%; margin: auto; margin-top: 10px; margin-bottom: 10px;">
        <div class="card-body">
            <h1 class="card-title">Página de Visualização</h1>
            <div class="form-group">
                <div class="card">
                    <label class="h5" for="nameUser" style="margin-top: 10px; margin-left: 5px;">Nome:</label>
                    <p class="h6" style="margin-left: 5px;">{{ $paciente->nome }}</p>
                </div>
            </div>
            <div class="form-group">
                <div class="card">
                    <label class="h5" for="nameUser" style="margin-top: 10px; margin-left: 5px;">CPF:</label>
                    <p class="h6" style="margin-left: 5px;">{{ $paciente->cpf }}</p>
                </div>
            </div>
            <div class="form-group">
                <div class="card">
                    <label class="h5" for="nameUser" style="margin-top: 10px; margin-left: 5px;">RG:</label>
                    <p class="h6" style="margin-left: 5px;">{{ $paciente->rg }}</p>
                </div>
            </div>
            <div class="form-group">
                <div class="card">
                    <label class="h5" for="nameUser" style="margin-top: 10px; margin-left: 5px;">Data de
                        Nascimento:</label>
                    <p class="h6" style="margin-left: 5px;">{{ date('d/m/Y', strtotime($paciente->data_nascimento)) }}</p>
                </div>
            </div>
            <div class="form-group">
                <div class="card">
                    <label class="h5" for="nameUser" style="margin-top: 10px; margin-left: 5px;">E-mail:</label>
                    <p class="h6" style="margin-left: 5px;">{{ $paciente->email }}</p>
                </div>
            </div>
            <div class="form-group">
                <div class="card">
                    <label class="h5" for="nameUser" style="margin-top: 10px; margin-left: 5px;">Telefone:</label>
                    <p class="h6" style="margin-left: 5px;">{{ $paciente->telefone }}</p>
                </div>
            </div>
            <a class="btn btn-success" href="{{ route('paciente.edit', ["paciente" => $paciente->id]) }}">Editar</a>
            <a class="btn btn-primary" href="{{ route('paciente.index') }}">Voltar</a>
        </div>
    </div>
@endsection
