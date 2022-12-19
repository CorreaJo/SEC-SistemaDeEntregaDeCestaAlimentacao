<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <x-pesquisar />

    <div class="cabecalho">
        <h1>Logo</h1>
    </div>
    <div class="login">
        <h1>Login</h1>
        <form action="#">
            <input type="email" placeholder="Email">
            <input type="password" placeholder="Senha">
            <button>Enviar</button>
        </form>
    </div>
</body>
</html>