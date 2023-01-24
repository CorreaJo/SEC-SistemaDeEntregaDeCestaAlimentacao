<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
    <x-cabecalho />
        <div class="flex items-center justify-center h-[70vh] flex-row">
            <div>
                <h1 class="text-center text-2xl font-bold">Consultar Cestas</h1>
                <x-pesquisar />
                <p>Total de Cestas Disponibilizadas</p>
                <p>Dia Atual: {{ $cuponsDispDia }}</p>
                <p>Mês Atual: {{ $cuponsDispMes }}</p><br>

                <p>Total de Cestas Previstas Para o Mês Seguinte</p>
                <p>Total: {{ $cuponsProxMes }}</p><br>

                <p>Total de Cestas Previstas Para o Ano</p>
                <p>Total: {{ $cuponsAno }}</p>
            </div>
        </div>
</body>
</html>