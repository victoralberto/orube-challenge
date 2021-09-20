@extends('index')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/usersPage.css') }}">
@endsection


@section('content')
    <h1>PÁGINA DE ATENDIMENTOS</h1>

    <div class="table">

        <div class="table-chamados">
            <input class="input-search" type="text" id="myInput" onkeyup="searchNames()"
                   placeholder="Procure por pacientes..." title="Type in a name">

            <table class="table" id="myTable">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Médico</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Altura</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Queixas</th>
                    <th scope="col">Procedimento</th>
                    <th scope="col">Plano de Saúde</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($atendimentos as $atendimento)
                    <tr>
                        <th scope="row">{{ $atendimento->id }}</th>
                        <td>{{ $atendimento->medico }}</td>
                        <td>{{ $atendimento->paciente }}</td>
                        <td>{{ $atendimento->altura }}</td>
                        <td>{{ $atendimento->peso }}</td>
                        <td>{{ $atendimento->sexo }}</td>
                        <td>{{ $atendimento->queixas }}</td>
                        <td>{{ $atendimento->procedimento }}</td>
                        <td>{{ $atendimento->plano_saude }}</td>
                        <td>
                            <a style="margin-bottom: 5px;" class="btn btn-primary" href="{{ route('atendimento.show', ["atendimento" => $atendimento->id]) }}"><i
                                    class="fas fa-eye" aria-hidden="true"></i></a>
                            <form action="#" method="POST">
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
        <a class="btn btn-success button-enviar" href="{{ route('atendimento.create') }}">Adicionar Chamado</a>
    </div>
@endsection
