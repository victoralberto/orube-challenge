@extends('index')

@section('content')
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="card" style="width: 60%; margin: auto; margin-top: 30px;">
            <div class="card-body">
                <h1 class="card-title">Registro de Usuário</h1>
                <h6 class="card-subtitle mb-2 text-muted">Por favor preencha as informações abaixo</h6>
                <div class="form-group">
                    <label for="nameUser">Nome:</label>
                    <input type="text" class="form-control" id="nameUser" name="name" placeholder="Digite seu nome">
                </div>
                <div class="form-group">
                    <label for="emailUser">Email:</label>
                    <input type="teste" class="form-control" id="emailUser" name="email" placeholder="Digite seu e-mail">
                </div>
                <div class="form-group">
                    <label for="passUser">Senha:</label>
                    <input type="password" class="form-control" id="passUser" name="password" placeholder="Digite sua senha">
                </div>
                <button type="submit" class="btn btn-success">Registrar</button>
                <a class="btn btn-primary" href="{{ route('user.index') }}">Voltar</a>
            </div>
        </div>
    </form>
@endsection
