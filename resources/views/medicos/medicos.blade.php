@extends('index')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/usersPage.css') }}">
@endsection


@section('content')
    <h1>PÁGINA DE MÉDICOS</h1>

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
                    <th scope="col">Matrícula</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($medicos as $medico)
                    <tr>
                        <th scope="row">{{ $medico->id }}</th>
                        <td>{{ $medico->nome }}</td>
                        <td>{{ $medico->cpf }}</td>
                        <td>{{ $medico->rg }}</td>
                        <td>{{ $medico->matricula }}</td>
                        <td>{{ date('d/m/Y', strtotime($medico->data_nascimento)) }}</td>
                        <td>{{ $medico->email }}</td>
                        <td>{{ $medico->telefone }}</td>
                        <td>
                            <a style="margin-bottom: 5px;" class="btn btn-primary" href="{{ route('medico.show', ["medico" => $medico->id]) }}"><i
                                    class="fas fa-eye" aria-hidden="true"></i></a>
                            <form action="{{ route('medico.destroy', ["medico" => $medico->id]) }}" method="POST">
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
        <a class="btn btn-success button-enviar" href="{{ route('medico.create') }}">Novo Médico</a>
    </div>
@endsection
