@extends('admin.partials.layout')

@section('title', 'Novo usuário')

@section('body')

    <h1>Novo usuário</h1>

    <a href="{{ route('user.index') }}" class="btn btn-secondary">Voltar</a>

    <hr>

    <div>
        <form method="post" action="{{ route('user.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="active" class="form-label">Ativo</label>
                        <select id="active" name="active" class="form-select">
                            <option value="1">Ativo</option>
                            <option value="0">Bloqueado</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="permission" class="form-label">Permissão</label>
                        <select id="permission" name="permission" class="form-select">
                            <option value="1">Admin</option>
                            <option value="2">Comum</option>
                        </select>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
    </div>
@endsection
