<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cupom de {{$beneficiado->nome}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
    <x-cabecalho />
    <div class="p-5 w-[70vw] m-auto rounded-lg shadow-md shadow-gray-700 mt-3 bg-[#B1D4E0]">
        <h1 class="text-center font-bold text-2xl">{{$beneficiado->nome}}</h1>
        <div class="flex justify-around w-full mt-5">
            <div>
                <x-label for="cpf" :value="__('CPF')" />
                <input class="rounded-md shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" type="text" disabled value="{{$beneficiado->cpf}}">

                <x-label for="rg" :value="__('RG')" />
                <input class="rounded-md shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" type="text" disabled value="{{$beneficiado->rg}}">

                
            </div>
            <div>
                <x-label for="rg" :value="__('Unidade')" />
                <input class="rounded-md shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" type="text" disabled value="{{$beneficiado->unidade}}">
            </div>
        </div>
    </div>
    <div class="bg-slate-700 w-[350px] rounded-xl h-[150px] text-white p-3 flex flex-col justify-center m-auto mt-5">
        <div class="flex items-center justify-between mb-4">
            <h2>{{$cupom->id}}</h2>
            <h2>{{$beneficiado->cpf}}</h2>
        </div>
        <h1 class="text-center font-bold text-2xl">{{$beneficiado->nome}}</h1>
        <h3 class="mt-4">Data: {{\Carbon\Carbon::parse($cupom->dataDisp)->format('d/m/Y')}}</h3>
    </div>

    <a href="#">
        <div class="m-auto mt-8 text-center p-4 w-[50vw] bg-green-500 text-xl font-semibold text-white rounded-lg">Marcar Como Retirado</div>
    </a>
</body>
</html>