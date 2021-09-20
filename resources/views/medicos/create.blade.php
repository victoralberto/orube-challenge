@extends('index')

@section('content')
    <form action="{{ route('medico.store') }}" method="POST">
        @csrf
        <div class="card" style="width: 60%; margin: auto; margin-top: 10px; margin-bottom: 10px;">
            <div class="card-body">
                <h1 class="card-title">Registro de Médicos</h1>
                <h6 class="card-subtitle mb-2 text-muted">Por favor preencha as informações abaixo</h6>
                <div class="form-group">
                    <label for="nameUser">Nome:</label>
                    <input type="text" class="form-control" id="nameUser" name="name" placeholder="Digite seu nome">
                </div>
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" name="cpf" placeholder="Digite o CPF"
                           onkeydown="javascript: fMasc( this, mCPF );" maxlength="14" required>
                </div>
                <div class="form-group">
                    <label for="rg">RG:</label>
                    <input type="text" class="form-control" id="rg" name="rg">
                </div>
                <div class="form-group">
                    <label for="rg">Matrícula:</label>
                    <input type="text" class="form-control" id="matricula" name="matricula">
                </div>
                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email...">
                </div>
                <div class="form-group">
                    <label for="telefone">Número de Celular:</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(81)98833-0009"
                           maxlength="15" onkeydown="javascript: mascara( this, mtel);">
                </div>
                <button type="submit" class="btn btn-success">Registrar</button>
                <a class="btn btn-primary" href="{{ route('medico.index') }}">Voltar</a>
            </div>
        </div>
    </form>
@endsection
