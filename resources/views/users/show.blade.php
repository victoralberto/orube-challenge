@extends('index')

@section('content')
    <div class="card" style="width: 60%; margin: auto; margin-top: 30px;">
        <div class="card-body">
            <h1 class="card-title">Página de visualização</h1>
            <div class="form-group">
                <div class="card">
                    <label class="h5" style="margin-top: 10px; margin-left: 5px;" for="nameUser">Nome:</label>
                    <p class="h6" style="margin-left: 5px;">{{ $user->name }}</p>
                </div>
            </div>
            <div class="form-group">
                <div class="card">
                    <label class="h5" style="margin-top: 10px; margin-left: 5px;" for="nameUser">E-mail:</label>
                    <p class="h6" style="margin-left: 5px;">{{ $user->email }}</p>
                </div>
            </div>
            <div class="form-group">
                <div class="card">
                    <label class="h5" style="margin-top: 10px; margin-left: 5px;" for="nameUser">Data de
                        criação:</label>
                    <p class="h6" style="margin-left: 5px;">{{ date('d/m/Y', strtotime($user->created_at)) }}</p>
                </div>
            </div>
            <a class="btn btn-success" href="{{ route('user.edit', ["user" => $user->id]) }}">Editar</a>
            <a class="btn btn-primary" href="{{ route('user.index') }}">Voltar</a>
        </div>
    </div>
@endsection
