@extends('index')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/usersPage.css') }}">
@endsection


@section('content')
    <h1>PÁGINA DE USUÁRIOS</h1>

    <div class="table">

        <div class="table-chamados">
            <input class="input-search" type="text" id="myInput" onkeyup="searchNames()"
                   placeholder="Procure por pacientes..." title="Type in a name">

            <table class="table" id="myTable">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Criado</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
                        <td>
                            <a style="margin-bottom: 5px;" class="btn btn-primary" href="{{ route('user.show', ["user" => $user->id]) }}"><i
                                    class="fas fa-eye" aria-hidden="true"></i></a>
                            <form action="{{ route('user.destroy', ["user" => $user->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <a class="btn btn-success button-enviar" href="{{ route('user.create') }}">Novo usuário</a>
    </div>
@endsection
