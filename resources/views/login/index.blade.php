<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Login</title>

    <style>
        body {
            background: rgb(255, 72, 63);
            background: linear-gradient(128deg, rgba(255, 72, 63, 1) 0%, rgba(23, 58, 134, 1) 100%);
        }

        html {
            height: 100%;
        }

        .dv-login {
            max-width: 500px;
            width: 100%;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, .9);
            border: 1px solid #fff;
            border-radius: 5px;
            padding: 10px;
            margin-top: 10%;
        }
    </style>
</head>

<body>
    <div class="dv-login">
        <h1>Login</h1>

        <hr>

        <form action="{{ route('login.auth') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>

            @if ($errors->any())
                <hr>
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
        </form>
    </div>
</body>

</html>
