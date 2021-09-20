@extends('index')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/usersPage.css') }}">
@endsection


@section('content')
    <h1>PÁGINA DE PACIENTES</h1>

    <div class="table">

        <div class="table-chamados">
            <input class="input-search" type="text" id="myInput" onkeyup="searchNames()" placeholder="Procure por pacientes..." title="Type in a name">

            <table class="table" id="myTable">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col" >CPF</th>
                    <th scope="col">RG</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Número de Celular</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pacientes as $paciente)
                <tr>
                    <th scope="row">{{ $paciente->id }}</th>
                    <td>{{ $paciente->nome }}</td>
                    <td>{{ $paciente->cpf }}</td>
                    <td>{{ $paciente->rg }}</td>
                    <td>{{ date('d/m/Y', strtotime($paciente->data_nascimento)) }}</td>
                    <td>{{ $paciente->email }}</td>
                    <td>{{ $paciente->telefone }}</td>
                    <td>
                        <a style="margin-bottom: 5px;" class="btn btn-primary" href="{{ route('paciente.show', ["paciente" => $paciente->id]) }}"><i
                                class="fas fa-eye" aria-hidden="true"></i></a>
                        <form action="{{ route('paciente.destroy', ["paciente" => $paciente->id]) }}" method="POST">
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
        <a class="btn btn-success button-enviar" href="{{ route('paciente.create') }}">Novo Paciente</a>
    </div>
@endsection
