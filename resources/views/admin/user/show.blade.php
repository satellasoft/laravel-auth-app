@extends('admin.partials.layout')

@section('title', 'Ver usuário')

@section('body')

    <h1>Ver usuário</h1>

    <a href="{{ route('user.index') }}" class="btn btn-secondary">Voltar</a>


    <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('user.password', ['id' => $user->id]) }}" class="btn btn-primary">Senha</a>
    <a href="{{ route('user.destroy', ['id' => $user->id]) }}" class="btn btn-danger">Remover</a>
    <hr>

    <div>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ativo</th>
                    <th>Permissão</th>
                    <th>Cadastrado</th>
                    <th>Alterado</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->active ? 'Ativo' : 'Bloqueado' }}</td>
                    <td>{{ $user->permission == 1 ? 'Admin' : 'Comum' }}</td>
                    <td>{{ date('d/m/Y H:i:s', strtotime($user->created_at)) }}</td>
                    <td>{{ date('d/m/Y H:i:s', strtotime($user->updated_at)) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
