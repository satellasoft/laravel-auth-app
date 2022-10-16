@extends('admin.partials.layout')

@section('title', 'Gerenciar usuário')

@section('body')

    <h1>Gerenciar usuário</h1>

    <a href="{{route('user.create')}}" class="btn btn-dark">Novo usuário</a>

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
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->active ? 'Ativo' : 'Bloqueado'}}</td>
                        <td>{{$user->permission == 1 ? 'Admin' : 'Comum'}}</td>
                        <td>
                            <a href="{{route('user.show', ['id' => $user->id])}}" class="btn btn-primary">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
