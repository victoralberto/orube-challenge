@extends('index')

@section('content')
    <form action="{{ route('atendimento.store') }}" method="POST">
        @csrf
        <div class="card" style="width: 60%; margin: auto; margin-top: 10px; margin-bottom: 10px;">
            <div class="card-body">
                <h1 class="card-title">Registro de Atendimento</h1>
                <h6 class="card-subtitle mb-2 text-muted">Por favor preencha as informações abaixo</h6>
                <div class="form-group">
                    <label for="nameUser">Médico:</label>
                    <select required id="inputState" class="form-control" name="id_medico">
                        <option selected>Selecione um médico</option>
                        @foreach($medicos as $medico)
                        <option value="{{ $medico->id }}">{{ $medico->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="cpf">Paciente:</label>
                    <select required id="inputState" class="form-control" name="id_paciente">
                        <option selected>Selecione um paciente</option>
                        @foreach($pacientes as $paciente)
                            <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="altura">Altura:</label>
                    <input type="text" class="form-control" id="altura" name="altura" required>
                </div>
                <div class="form-group">
                    <label for="peso">Peso:</label>
                    <input type="text" class="form-control" id="peso" name="peso" required>
                </div>
                <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <select required id="inputState" class="form-control" name="sexo" id="sexo">
                        <option selected>Selecione</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="queixas">Queixas:</label>
                    <input type="text" class="form-control" id="queixas" name="queixas" required>
                </div>
                <div class="form-group">
                    <label for="procedimento">Procedimento:</label>
                    <input type="text" class="form-control" id="procedimento" name="procedimento" required>
                </div>
                <div class="form-group">
                    <label for="plano_saude">Plano de Saúde:</label>
                    <input type="text" class="form-control" id="plano_saude" name="plano_saude" required>
                </div>
                <button type="submit" class="btn btn-success">Registrar</button>
                <a class="btn btn-primary" href="{{ route('atendimento.index') }}">Voltar</a>
            </div>
        </div>
    </form>
@endsection
