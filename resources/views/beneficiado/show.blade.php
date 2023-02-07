<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes de {{$beneficiado->nome}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <x-cabecalho />
    @unless (Auth::user()->unidade === "compras" || Auth::user()->unidade === "entrega")
    <div class="flex mt-4 p-4 w-full justify-between">
        <div class="flex">
            <form class="mr-2" action="{{route('beneficiado.delete', $beneficiado->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button
                    class="flex items-center border rounded p-2 hover:bg-red-700 hover:text-white transition duration-0 hover:duration-500"><img
                        src="{{asset('images/lixeira.png')}}" alt="">Deletar</button>
            </form>
            <a href="{{route('beneficiado.edit', $beneficiado->id)}}"
                class="flex mr-2 items-center border rounded p-2 hover:bg-cyan-800 hover:text-white transition duration-0 hover:duration-500"><img
                    src="{{asset('images/refrescar.png')}}" alt="">Editar</a>

                @if($beneficiado->observacao)
                    <a href="{{route('beneficiado.observacao', $beneficiado->id)}}" class="flex items-center border rounded p-2 hover:bg-cyan-800 hover:text-white transition duration-0 hover:duration-500 mr-2">Alterar observação</a>

                    <a href="{{route('beneficiado.deleteObservacao', $beneficiado->id)}}" class="flex mr-2 items-center border rounded p-2 hover:bg-red-700 hover:text-white transition duration-0 hover:duration-500"><img
                        src="{{asset('images/lixeira.png')}}" alt="">Excluir observação</a>
                @else
                    <a href="{{route('beneficiado.observacao', $beneficiado->id)}}" class="flex items-center mr-2 border rounded p-2 hover:bg-cyan-800 hover:text-white transition duration-0 hover:duration-500">Adicionar observação</a>
                @endif

                @if ($beneficiado->unidade === Auth::user()->unidade)
                <a href="{{route('beneficiado.transferir', $beneficiado->id)}}"
                    class="hidden"><ion-icon name="swap-horizontal-outline"></ion-icon>Transferir para {{Auth::user()->unidade}}</a>
                @else
                <a href="{{route('beneficiado.transferir', $beneficiado->id)}}"
                    class="flex mr-2 items-center border rounded p-2 hover:bg-cyan-800 hover:text-white transition duration-0 hover:duration-500"><ion-icon name="swap-horizontal-outline"></ion-icon>Transferir para {{Auth::user()->unidade}}</a>
                @endif
                
            </div>
            @if (Auth::user()->perfil === 'Coordenador' || Auth::user()->perfil === 'admin')
                <div>
                    <a href="{{route('cupom.deleteAll', $beneficiado->id)}}" class="flex items-center border rounded p-2 hover:bg-red-700 hover:text-white transition duration-0 hover:duration-500"><img src="{{asset('images/lixeira.png')}}" alt="">Excluir Cestas Provisionadas</a>
                </div>
            @endif
        </div>
    </div>
    @endunless

    <div class="p-5 w-[70vw] m-auto rounded-lg shadow-md shadow-gray-700 mt-3 bg-[#B1D4E0]">
        <h1 class="text-center font-bold text-2xl">{{$beneficiado->nome}}</h1>
        <div class="flex justify-center mt-5">
            @if (Auth::user()->unidade === "entrega")
            <div class="w-[45%] m-auto">
                <x-label for="cpf" :value="__('CPF')" />
                <input
                    class="rounded-md w-full shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50"
                    type="text" disabled value="{{$beneficiado->cpf}}">

                <x-label for="rg" :value="__('RG')" />
                <input
                    class="rounded-md w-full shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50"
                    type="text" disabled value="{{$beneficiado->rg}}">
            </div>
            <div class="w-[45%] m-auto">
                <x-label for="rg" :value="__('Unidade')" />
                <input
                    class="rounded-md w-full shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50"
                    type="text" disabled value="{{$beneficiado->unidade}}">

                <x-label for="quant" :value="__('Quantidade de Membros')" />
                <input
                    class="rounded-md w-full shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50"
                    type="text" disabled value="{{$beneficiado->quantMembros}}">
            </div>
            @else
            <div class="w-[45%] m-auto">
                <x-label for="cpf" :value="__('CPF')" />
                <input
                    class="rounded-md w-full shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50"
                    type="text" disabled value="{{$beneficiado->cpf}}">

                <x-label for="rg" :value="__('RG')" />
                <input
                    class="rounded-md w-full shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50"
                    type="text" disabled value="{{$beneficiado->rg}}">
            </div>
            <div class="w-[45%] m-auto">
                <x-label for="rg" :value="__('Unidade')" />
                <input
                    class="rounded-md w-full shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50"
                    type="text" disabled value="{{$beneficiado->unidade}}">

                <x-label for="quant" :value="__('Quantidade de Membros')" />
                <input
                    class="rounded-md w-full shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50"
                    type="text" disabled value="{{$beneficiado->quantMembros}}">
            </div>
        </div>
        <div class="w-[95%] m-auto">
            <x-label for="endereco" :value="__('Endereço')" />
            <input
                class="rounded-md w-full shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50"
                type="text" disabled value="{{$beneficiado->endereco}}">
                @if($beneficiado->observacao)
                <div class="w-full border border-slate-500 rounded-md mt-4 p-4">
                        <x-label class="font-bold text-2xl ml-4" for="observacao" :value="__('Observações')" />
                        <textarea class="rounded-md mt-2 w-full shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50 bg-red-500" disabled>{{$beneficiado->observacao}}</textarea>
                </div>
                @endif
            @endif
        </div>
    </div>
    </div>

    @unless (Auth::user()->unidade === "compras" || Auth::user()->unidade === "entrega")
    <div class="m-5 mt-8">
        <a href="{{route('cupom.create', $beneficiado->id)}}"
            class="p-4 bg-[#145DA0] rounded-md text-white font-semibold hover:bg-[#1f7fda] transition duration-0 hover:duration-500 ">
            Gerar Cupom
        </a>
    </div>
    @endunless
    <div class="mt-6">
        <div class="p-4 shadow-md w-3/4 m-auto rounded-md shadow-black">
            <h2 class="text-center font-semibold text-2xl">Cestas Provisionadas</h2>
            <div class="flex justify-around flex-wrap">
                @forelse ($cuponsPrev as $cupomPrev)
                @if (\Carbon\Carbon::parse($cupomPrev->dataDisp) >= \Carbon\Carbon::today())
                @if (Auth::user()->unidade === "entrega")
                @if ($cupomPrev->status === "ativo")
                <a href="{{route('cupom.show', array('id'=> $cupomPrev->idBeneficiado, 'idCupom'=>$cupomPrev->id))}}">
                    <div
                        class="bg-slate-700 w-[350px] rounded-xl h-[150px] text-white p-3 flex flex-col justify-center m-4">
                        <div class="flex items-center justify-between mb-4">
                            @php
                            $pr_id = $cupomPrev->id;
                            $pr_id = sprintf("%06d", $pr_id);
                            @endphp
                            <h2>{{$pr_id}}</h2>
                            @unless (Auth::user()->unidade === "compras" || Auth::user()->unidade === "entrega")
                            <form class="mr-2"
                                action="{{route('cupom.delete', array('id'=>$cupomPrev->id, 'idBeneficiado'=>$cupomPrev->idBeneficiado))}}"
                                method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="rounded p-2 hover:bg-red-700 transition duration-0 hover:duration-500"><img
                                        src="{{asset('images/lixeira.png')}}" alt=""></button>
                            </form>
                            @endunless
                            @if (Auth::user()->unidade === "entrega")
                            <h2>{{$beneficiado->cpf}}</h2>
                            @endif
    
                        </div>
                        <h1 class="text-center font-bold text-2xl">{{$beneficiado->nome}}</h1>
                        <h3 class="mt-4">Data: {{\Carbon\Carbon::parse($cupomPrev->dataDisp)->format('d/m/Y')}}</h3>
                        <h3 class="text-center">Gerado Por: {{$cupomPrev->criador}}</h3>
                    </div>
                </a>
                @else
                <div class="bg-green-400 w-[350px] rounded-xl h-[150px] text-black p-3 flex flex-col justify-center m-4">
                    <div class="flex items-center justify-between mb-4">
                        @php
                        $pr_id = $cupomPrev->id;
                        $pr_id = sprintf("%06d", $pr_id);
                        @endphp
                        <h2>{{$pr_id}}</h2>
                        @unless (Auth::user()->unidade === "compras" || Auth::user()->unidade === "entrega")
                        <form class="mr-2"
                            action="{{route('cupom.delete', array('id'=>$cupomPrev->id, 'idBeneficiado'=>$cupomPrev->idBeneficiado))}}"
                            method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="rounded p-2 hover:bg-red-700 transition duration-0 hover:duration-500"><img
                                    src="{{asset('images/lixeira.png')}}" alt=""></button>
                        </form>
                        @endunless
    
                        @if (Auth::user()->unidade === "entrega")
                        <h2>{{$beneficiado->cpf}}</h2>
                        @endif
    
                    </div>
                    <h1 class="text-center font-bold text-2xl">{{$beneficiado->nome}}</h1>
                    <h3 class="mt-4">Data: {{\Carbon\Carbon::parse($cupomPrev->dataDisp)->format('d/m/Y')}}</h3>
                    <h3 class="text-center">Gerado Por: {{$cupomPrev->criador}}</h3>
                </div>
                @endif
                @else
                @if ($cupomPrev->status === "ativo")
                <div class="bg-slate-700 w-[350px] rounded-xl h-[150px] text-white p-3 flex flex-col justify-center m-4">
                    <div class="flex items-center justify-between mb-4">
                        @php
                        $pr_id = $cupomPrev->id;
                        $pr_id = sprintf("%06d", $pr_id);
                        @endphp
                        <h2>{{$pr_id}}</h2>
                        @unless (Auth::user()->unidade === "compras" || Auth::user()->unidade === "entrega")
                        <form class="mr-2"
                            action="{{route('cupom.delete', array('id'=>$cupomPrev->id, 'idBeneficiado'=>$cupomPrev->idBeneficiado))}}"
                            method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="rounded p-2 hover:bg-red-700 transition duration-0 hover:duration-500"><img
                                    src="{{asset('images/lixeira.png')}}" alt=""></button>
                        </form>
                        @endunless
                        @if (Auth::user()->unidade === "entrega")
                        <h2>{{$beneficiado->cpf}}</h2>
                        @endif
    
                    </div>
                    <h1 class="text-center font-bold text-2xl">{{$beneficiado->nome}}</h1>
                    <h3 class="mt-4">Data: {{\Carbon\Carbon::parse($cupomPrev->dataDisp)->format('d/m/Y')}}</h3>
                    <h3 class="text-center">Gerado Por: {{$cupomPrev->criador}}</h3>
                </div>
                @else
                <div class="bg-green-300 w-[350px] rounded-xl h-[150px] text-black p-3 flex flex-col justify-center m-4">
                    <div class="flex items-center justify-between mb-4">
                        @php
                        $pr_id = $cupomPrev->id;
                        $pr_id = sprintf("%06d", $pr_id);
                        @endphp
                        <h2>{{$pr_id}}</h2>
                        @unless (Auth::user()->unidade === "compras" || Auth::user()->unidade === "entrega")
                        <form class="mr-2"
                            action="{{route('cupom.delete', array('id'=>$cupomPrev->id, 'idBeneficiado'=>$cupomPrev->idBeneficiado))}}"
                            method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="rounded p-2 hover:bg-red-700 transition duration-0 hover:duration-500"><img
                                    src="{{asset('images/lixeira.png')}}" alt=""></button>
                        </form>
                        @endunless
    
                        @if (Auth::user()->unidade === "entrega")
                        <h2>{{$beneficiado->cpf}}</h2>
                        @endif
    
                    </div>
                    <h1 class="text-center font-bold text-2xl">{{$beneficiado->nome}}</h1>
                    <h3 class="mt-4">Data: {{\Carbon\Carbon::parse($cupomPrev->dataDisp)->format('d/m/Y')}}</h3>
                    <h3 class="text-center">Gerado Por: {{$cupomPrev->criador}}</h3>
                </div>
                @endif
                @endif
                @endif
                @empty
                <h2>Não Há Cupons</h2>
                @endforelse
            </div>
        </div>

        <div class="p-4 shadow-md w-3/4 m-auto rounded-md shadow-black mt-4">
            <h2 class="text-center font-semibold text-2xl">Histórico de Cestas</h2>
            <div class="flex justify-around flex-wrap">
                @forelse ($cuponsHist as $cupomHist)
                @if (Auth::user()->unidade === "entrega")
                @if ($cupomHist->status === "ativo")
                <a href="{{route('cupom.show', array('id'=> $cupomHist->idBeneficiado, 'idCupom'=>$cupomHist->id))}}">
                    <div
                        class="bg-slate-700 w-[350px] rounded-xl h-[150px] text-white p-3 flex flex-col justify-center m-4">
                        <div class="flex items-center justify-between mb-4">
                            @php
                            $pr_id = $cupomHist->id;
                            $pr_id = sprintf("%06d", $pr_id);
                            @endphp
                            <h2>{{$pr_id}}</h2>
                            @unless (Auth::user()->unidade === "compras" || Auth::user()->unidade === "entrega")
                            <form class="mr-2"
                                action="{{route('cupom.delete', array('id'=>$cupomHist->id, 'idBeneficiado'=>$cupomHIst->idBeneficiado))}}"
                                method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="rounded p-2 hover:bg-red-700 transition duration-0 hover:duration-500"><img
                                        src="{{asset('images/lixeira.png')}}" alt=""></button>
                            </form>
                            @endunless
                            @if (Auth::user()->unidade === "entrega")
                            <h2>{{$beneficiado->cpf}}</h2>
                            @endif
    
                        </div>
                        <h1 class="text-center font-bold text-2xl">{{$beneficiado->nome}}</h1>
                        <h3 class="mt-4">Data: {{\Carbon\Carbon::parse($cupomHist->dataDisp)->format('d/m/Y')}}</h3>
                        <h3 class="text-center">Gerado Por: {{$cupomHist->criador}}</h3>
                    </div>
                </a>
                @else
                <div class="bg-[#bad4dd] w-[350px] rounded-xl h-[150px] text-black p-3 flex flex-col justify-center m-4">
                    <div class="flex items-center justify-between mb-4">
                        @php
                        $pr_id = $cupomHist->id;
                        $pr_id = sprintf("%06d", $pr_id);
                        @endphp
                        <h2>{{$pr_id}}</h2>
                        @unless (Auth::user()->unidade === "compras" || Auth::user()->unidade === "entrega")
                        <form class="mr-2"
                            action="{{route('cupom.delete', array('id'=>$cupomHist->id, 'idBeneficiado'=>$cupomHist->idBeneficiado))}}"
                            method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="rounded p-2 hover:bg-red-700 transition duration-0 hover:duration-500"><img
                                    src="{{asset('images/lixeira.png')}}" alt=""></button>
                        </form>
                        @endunless
    
                        @if (Auth::user()->unidade === "entrega")
                        <h2>{{$beneficiado->cpf}}</h2>
                        @endif
    
                    </div>
                    <h1 class="text-center font-bold text-2xl">{{$beneficiado->nome}}</h1>
                    <h3 class="mt-4">Data: {{\Carbon\Carbon::parse($cupomHist->dataDisp)->format('d/m/Y')}}</h3>
                    <h3 class="text-center">Gerado Por: {{$cupomHist->criador}}</h3>
                </div>
                @endif
                @else
                @if ($cupomHist->status === "ativo")
                <div class="bg-slate-700 w-[350px] rounded-xl h-[150px] text-white p-3 flex flex-col justify-center m-4">
                    <div class="flex items-center justify-between mb-4">
                        @php
                        $pr_id = $cupomHist->id;
                        $pr_id = sprintf("%06d", $pr_id);
                        @endphp
                        <h2>{{$pr_id}}</h2>
                        @unless (Auth::user()->unidade === "compras" || Auth::user()->unidade === "entrega")
                        <form class="mr-2"
                            action="{{route('cupom.delete', array('id'=>$cupomHist->id, 'idBeneficiado'=>$cupomHist->idBeneficiado))}}"
                            method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="rounded p-2 hover:bg-red-700 transition duration-0 hover:duration-500"><img
                                    src="{{asset('images/lixeira.png')}}" alt=""></button>
                        </form>
                        @endunless
                        @if (Auth::user()->unidade === "entrega")
                        <h2>{{$beneficiado->cpf}}</h2>
                        @endif
    
                    </div>
                    <h1 class="text-center font-bold text-2xl">{{$beneficiado->nome}}</h1>
                    <h3 class="mt-4">Data: {{\Carbon\Carbon::parse($cupomHist->dataDisp)->format('d/m/Y')}}</h3>
                    <h3 class="text-center">Gerado Por: {{$cupomHist->criador}}</h3>                
                </div>
                @else
                <div class="bg-[#bad4dd] w-[350px] rounded-xl h-[150px] text-black p-3 flex flex-col justify-center m-4">
                    <div class="flex items-center justify-between mb-4">
                        @php
                        $pr_id = $cupomHist->id;
                        $pr_id = sprintf("%06d", $pr_id);
                        @endphp
                        <h2>{{$pr_id}}</h2>
                        @unless (Auth::user()->unidade === "compras" || Auth::user()->unidade === "entrega")
                        <form class="mr-2"
                            action="{{route('cupom.delete', array('id'=>$cupomHist->id, 'idBeneficiado'=>$cupomHist->idBeneficiado))}}"
                            method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="rounded p-2 hover:bg-red-700 transition duration-0 hover:duration-500"><img
                                    src="{{asset('images/lixeira.png')}}" alt=""></button>
                        </form>
                        @endunless
    
                        @if (Auth::user()->unidade === "entrega")
                        <h2>{{$beneficiado->cpf}}</h2>
                        @endif
    
                    </div>
                    <h1 class="text-center font-bold text-2xl">{{$beneficiado->nome}}</h1>
                    <h3 class="mt-4">Data: {{\Carbon\Carbon::parse($cupomHist->dataDisp)->format('d/m/Y')}}</h3>
                    <h3 class="text-center">Gerado Por: {{$cupomHist->criador}}</h3>
                </div>
                @endif
                @endif
                @empty
                <h2>Não Há Cupons</h2>
                @endforelse
            </div>
        </div>
    </div>
    <x-rodape />
</body>

</html>