@extends('admin.partials.layout')

@section('title', 'Alterar senha')

@section('body')

    <h1>Alterar senha</h1>

    <a href="{{ route('user.show', ['id' => $user->id]) }}" class="btn btn-secondary">Voltar</a>

    <hr>

    <div>
        <form method="post" action="{{ route('user.password', ['id' => $user->id]) }}">
            @csrf
            {{ method_field('PATCH') }}

            <div class="col-md-12">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            <button type="submit" class="btn btn-success">Alterar senha</button>
        </form>
    </div>
@endsection
