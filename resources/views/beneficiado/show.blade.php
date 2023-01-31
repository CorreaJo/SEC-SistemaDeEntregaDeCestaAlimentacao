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
    @unless (Auth::user()->unidade === "compras" || Auth::user()->unidade === "entrega")
    <div class="flex mt-4 p-4 w-full justify-between">
        <div class="flex">
            <form class="mr-2" action="{{route('beneficiado.delete', $beneficiado->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="flex items-center border rounded p-2 hover:bg-red-700 hover:text-white transition duration-0 hover:duration-500"><img src="{{asset('images/lixeira.png')}}" alt="">Deletar</button>
            </form>
            <a href="{{route('beneficiado.edit', $beneficiado->id)}}" class="flex items-center border rounded p-2 hover:bg-cyan-800 hover:text-white transition duration-0 hover:duration-500"><img src="{{asset('images/refrescar.png')}}" alt="">Editar</a>
        </div>
        @if (Auth::user()->perfil === 'Coordenador' || Auth::user()->perfil === 'admin')
            <div>
                <a href="{{route('cupom.deleteAll', $beneficiado->id)}}" class="flex items-center border rounded p-2 hover:bg-red-700 hover:text-white transition duration-0 hover:duration-500"><img src="{{asset('images/lixeira.png')}}" alt="">Excluir Cestas Provisionadas</a>
            </div>
        @endif
    </div>
    @endunless
    

    <div class="p-5 w-[70vw] m-auto rounded-lg shadow-md shadow-gray-700 mt-3 bg-[#B1D4E0]">
        <h1 class="text-center font-bold text-2xl">{{$beneficiado->nome}}</h1>
        <div class="flex justify-around w-full mt-5">
            @if (Auth::user()->unidade === "entrega")
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
            @else
            <div>
            <div class="w-1/2 mr-2">
                <x-label for="cpf" :value="__('CPF')" />
                <input class="rounded-md w-full shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" type="text" disabled value="{{$beneficiado->cpf}}">

                <x-label for="rg" :value="__('RG')" />
                <input class="rounded-md w-full shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" type="text" disabled value="{{$beneficiado->rg}}">

            </div>
            <div class="w-1/2">
                <x-label for="rg" :value="__('Unidade')" />
                <input class="rounded-md w-full shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" type="text" disabled value="{{$beneficiado->unidade}}">
                
                <x-label for="quant" :value="__('Quantidade de Membros')" />
                <input class="rounded-md w-full shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" type="text" disabled value="{{$beneficiado->quantMembros}}">
            </div>
            @endif
        </div>
        <div>
            <x-label for="endereco" :value="__('Endereço')" />
            <input class="rounded-md w-full shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" type="text" disabled value="{{$beneficiado->endereco}}">
        </div>
    </div>
    @unless (Auth::user()->unidade === "compras" || Auth::user()->unidade === "entrega")
    <div class="m-5 mt-8">
        <a href="{{route('cupom.create', $beneficiado->id)}}" class="p-4 bg-[#145DA0] rounded-md text-white font-semibold hover:bg-[#1f7fda] transition duration-0 hover:duration-500 ">
            Gerar Cupom
        </a>
    </div>
    @endunless
    <div class="mt-6">
        <h2 class="text-center font-semibold text-2xl">Cestas Provisionadas</h2>

        <div class="flex justify-around flex-wrap">
            @forelse ($cupons as $cupom)
                @if (Auth::user()->unidade === "entrega")
                    @if ($cupom->status === "ativo")
                        <a href="{{route('cupom.show', array('id'=> $cupom->idBeneficiado, 'idCupom'=>$cupom->id))}}">
                            <div class="bg-slate-700 w-[350px] rounded-xl h-[150px] text-white p-3 flex flex-col justify-center m-4">
                                <div class="flex items-center justify-between mb-4">
                                    @php
                                        $pr_id = $cupom->id;
                                        $pr_id = sprintf("%06d", $pr_id);
                                    @endphp
                                    <h2>{{$pr_id}}</h2>
                                    @unless (Auth::user()->unidade === "compras" || Auth::user()->unidade === "entrega")
                                        <form  class="mr-2" action="{{route('cupom.delete', array('id'=>$cupom->id, 'idBeneficiado'=>$cupom->idBeneficiado))}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="rounded p-2 hover:bg-red-700 transition duration-0 hover:duration-500"><img src="{{asset('images/lixeira.png')}}" alt=""></button>
                                        </form>
                                    @endunless
                                    @if (Auth::user()->unidade === "entrega")
                                        <h2>{{$beneficiado->cpf}}</h2>
                                    @endif
                            
                                </div>
                                <h1 class="text-center font-bold text-2xl">{{$beneficiado->nome}}</h1>
                                <h3 class="mt-4">Data: {{\Carbon\Carbon::parse($cupom->dataDisp)->format('d/m/Y')}}</h3>
                            </div>
                        </a>
                    @else
                        <div class="bg-slate-300 w-[350px] rounded-xl h-[150px] text-white p-3 flex flex-col justify-center m-4">
                            <div class="flex items-center justify-between mb-4">
                                @php
                                    $pr_id = $cupom->id;
                                    $pr_id = sprintf("%06d", $pr_id);
                                @endphp
                                <h2>{{$pr_id}}</h2>
                                @unless (Auth::user()->unidade === "compras" || Auth::user()->unidade === "entrega")
                                    <form  class="mr-2" action="{{route('cupom.delete', array('id'=>$cupom->id, 'idBeneficiado'=>$cupom->idBeneficiado))}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="rounded p-2 hover:bg-red-700 transition duration-0 hover:duration-500"><img src="{{asset('images/lixeira.png')}}" alt=""></button>
                                    </form>
                                @endunless

                                @if (Auth::user()->unidade === "entrega")
                                    <h2>{{$beneficiado->cpf}}</h2>
                                @endif
                                
                            </div>
                            <h1 class="text-center font-bold text-2xl">{{$beneficiado->nome}}</h1>
                            <h3 class="mt-4">Data: {{\Carbon\Carbon::parse($cupom->dataDisp)->format('d/m/Y')}}</h3>
                        </div>
                    @endif
                @else
                    @if ($cupom->status === "ativo")
                        <div class="bg-slate-700 w-[350px] rounded-xl h-[150px] text-white p-3 flex flex-col justify-center m-4">
                            <div class="flex items-center justify-between mb-4">
                                @php
                                    $pr_id = $cupom->id;
                                    $pr_id = sprintf("%06d", $pr_id);
                                @endphp
                                <h2>{{$pr_id}}</h2>
                                @unless (Auth::user()->unidade === "compras" || Auth::user()->unidade === "entrega")
                                    <form  class="mr-2" action="{{route('cupom.delete', array('id'=>$cupom->id, 'idBeneficiado'=>$cupom->idBeneficiado))}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="rounded p-2 hover:bg-red-700 transition duration-0 hover:duration-500"><img src="{{asset('images/lixeira.png')}}" alt=""></button>
                                    </form>
                                @endunless
                                @if (Auth::user()->unidade === "entrega")
                                    <h2>{{$beneficiado->cpf}}</h2>
                                @endif
                        
                            </div>
                            <h1 class="text-center font-bold text-2xl">{{$beneficiado->nome}}</h1>
                            <h3 class="mt-4">Data: {{\Carbon\Carbon::parse($cupom->dataDisp)->format('d/m/Y')}}</h3>
                        </div>
                    @else
                        <div class="bg-slate-300 w-[350px] rounded-xl h-[150px] text-white p-3 flex flex-col justify-center m-4">
                            <div class="flex items-center justify-between mb-4">
                                @php
                                    $pr_id = $cupom->id;
                                    $pr_id = sprintf("%06d", $pr_id);
                                @endphp
                                <h2>{{$pr_id}}</h2>
                                @unless (Auth::user()->unidade === "compras" || Auth::user()->unidade === "entrega")
                                    <form  class="mr-2" action="{{route('cupom.delete', array('id'=>$cupom->id, 'idBeneficiado'=>$cupom->idBeneficiado))}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="rounded p-2 hover:bg-red-700 transition duration-0 hover:duration-500"><img src="{{asset('images/lixeira.png')}}" alt=""></button>
                                    </form>
                                @endunless

                                @if (Auth::user()->unidade === "entrega")
                                <h2>{{$beneficiado->cpf}}</h2>
                                @endif
                                
                            </div>
                            <h1 class="text-center font-bold text-2xl">{{$beneficiado->nome}}</h1>
                            <h3 class="mt-4">Data: {{\Carbon\Carbon::parse($cupom->dataDisp)->format('d/m/Y')}}</h3>
                        </div>
                    @endif
                @endif
            @empty
                <h2>Não Há Cupons</h2>
            @endforelse 
        </div>
    </div>
    <x-rodape />
</body>
</html>