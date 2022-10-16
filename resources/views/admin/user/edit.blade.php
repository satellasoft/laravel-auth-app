@extends('admin.partials.layout')

@section('title', 'Editar usuário')

@section('body')

    <h1>Editar usuário</h1>

    <a href="{{ route('user.show', ['id' => $user->id]) }}" class="btn btn-secondary">Voltar</a>

    <hr>

    <div>
        <form method="post" action="{{ route('user.update', ['id' => $user->id]) }}">
            @csrf
            {{ method_field('PUT') }}

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" disabled>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="active" class="form-label">Ativo</label>
                        <select id="active" name="active" class="form-select">
                            <option value="1" {{$user->active == 1 ? 'selected' : ''}}>Ativo</option>
                            <option value="0" {{$user->active == 0 ? 'selected' : ''}}>Bloqueado</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="permission" class="form-label">Permissão</label>
                        <select id="permission" name="permission" class="form-select">
                            <option value="1" {{$user->permission == 1 ? 'selected' : ''}}>Admin</option>
                            <option value="2" {{$user->permission == 2 ? 'selected' : ''}}>Comum</option>
                        </select>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            <button type="submit" class="btn btn-success">Alterar</button>
        </form>
    </div>
@endsection