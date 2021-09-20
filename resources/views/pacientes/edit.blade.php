@extends('index')

@section('content')
    <form action="{{ route('paciente.update', ["paciente" => $paciente->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card" style="width: 60%; margin: auto; margin-top: 10px; margin-bottom: 10px;">
            <div class="card-body">
                <h1 class="card-title">Página de Edição</h1>
                <div class="form-group">
                    <label for="nameUser">Nome:</label>
                    <input type="text" class="form-control" id="nameUser" name="nome" value="{{ $paciente->nome }}"
                           placeholder="Digite seu nome">
                </div>
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" name="cpf" value="{{ $paciente->cpf }}"
                           placeholder="Digite o CPF"
                           onkeydown="javascript: fMasc( this, mCPF );" maxlength="14" required>
                </div>
                <div class="form-group">
                    <label for="rg">RG:</label>
                    <input type="text" class="form-control" id="rg" name="rg" value="{{ $paciente->rg }}">
                </div>
                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"
                           value="{{ $paciente->data_nascimento }}">
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $paciente->email }}" placeholder="Digite seu email...">
                </div>
                <div class="form-group">
                    <label for="telefone">Número de Celular:</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $paciente->telefone }}" placeholder="(81)98833-0009"
                           maxlength="15" onkeydown="javascript: mascara( this, mtel);">
                </div>
                <button type="submit" class="btn btn-success">Atualizar</button>
                <a class="btn btn-primary" href="{{ route('paciente.index') }}">Voltar</a>
            </div>
        </div>
    </form>
@endsection
