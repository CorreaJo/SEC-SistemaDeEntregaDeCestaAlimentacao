<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes de {{$beneficiado->nome}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
    <x-cabecalho />
    <div class="flex mt-4 p-4 w-full justify-between">
        <div class="flex">
            <form  class="mr-2" action="#" method="POST">
                @method('DELETE')
                @csrf
                <button class="flex items-center border rounded p-2 hover:bg-red-700 hover:text-white transition duration-0 hover:duration-500"><img src="{{asset('images/lixeira.png')}}" alt="">Deletar</button>
            </form>
            <a href="#" class="flex items-center border rounded p-2 hover:bg-cyan-800 hover:text-white transition duration-0 hover:duration-500"><img src="{{asset('images/refrescar.png')}}" alt="">Editar</a>
        </div>
        @if (Auth::user()->perfil === 'Coordenador' || Auth::user()->perfil === 'admin')
            <div>
                <a href="#" class="flex items-center border rounded p-2 hover:bg-red-700 hover:text-white transition duration-0 hover:duration-500"><img src="{{asset('images/lixeira.png')}}" alt="">Excluir Cestas Provisionadas</a>
            </div>
        @endif
    </div>

    <div class="p-5 w-[70vw] m-auto rounded-lg shadow-md shadow-gray-700 mt-3">
        <h1 class="text-center font-bold text-2xl">{{$beneficiado->nome}}</h1>
        <div class="flex justify-around w-full mt-5">
            <div>
                <x-label for="cpf" :value="__('CPF')" />
                <input class="rounded-md shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" type="text" disabled value="{{$beneficiado->cpf}}">

                <x-label for="rg" :value="__('RG')" />
                <input class="rounded-md shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" type="text" disabled value="{{$beneficiado->rg}}">

                <x-label for="rg" :value="__('Unidade')" />
                <input class="rounded-md shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" type="text" disabled value="{{$beneficiado->unidade}}">
            </div>
            <div>
                <x-label for="endereco" :value="__('Endereço')" />
                <input class="rounded-md shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" type="text" disabled value="{{$beneficiado->endereco}}">

                <x-label for="quant" :value="__('Quantidade de Membros')" />
                <input class="rounded-md shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" type="text" disabled value="{{$beneficiado->quantMembros}}">
            </div>
        </div>
    </div>
    <div class="m-5 mt-8">
        <a href="{{route('cupom.create', $beneficiado->id)}}" class="p-4 bg-[#145DA0] rounded-md text-white font-semibold hover:bg-[#1f7fda] transition duration-0 hover:duration-500 ">
            Gerar Cupom
        </a>
    </div>
    <div class="mt-6">
        <h2 class="text-center font-semibold text-2xl">Cestas Provisionadas</h2>
    </div>
</body>
</html>