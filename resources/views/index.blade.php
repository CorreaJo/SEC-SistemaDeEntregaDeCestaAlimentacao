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
        
    @unless (Auth::user()->unidade === 'compras' || Auth::user()->unidade === 'entrega')
        <div class="flex items-center justify-center h-[70vh] flex-row">
            <div>
                <h1 class="text-center text-2xl font-bold">Consultar Cestas</h1>
                <x-pesquisar />
            </div>
        </div>
    @endunless

    @if (Auth::user()->unidade === 'compras')
        <h2>tem que fazer - Compras</h2>
    @elseif (Auth::user()->unidade === 'entrega')
        <h1 class="text-center text-2xl font-bold">Consultar Cupons</h1>
    @endif
    
    
</body>
</html>