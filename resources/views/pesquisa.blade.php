<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>
<body x-data>
    <x-cabecalho />
    <div class="flex justify-end bg-gray-800 p-6 items-center">
        <h2 class="text-center text-2xl underline text-white">Pesquisado Por:</h2>
        <div class="content">
            <form action="{{route('pesquisa')}}" class="pesquisar">
                <div>
                    <input class="input-pesquisar" x-mask="" id="pesquisa" type="text" placeholder="Pesquisar por nome, CPF ou endereço" name="pesquisa" value="{{$pesquisa}}">
                    <x-button class="bg-[#145DA0] hover:bg-[#0e3c68]">
                        Pesquisar
                    </x-button>
                </div>
                <div>
                    <input class="radio" type="radio" value="cpf" id="cpf" name="tipo_pesquisa">
                    <label class="text-white" for="cpf">CPF</label>
        
                    <input class="radio" type="radio" value="nome" id="nome" name="tipo_pesquisa" checked> 
                    <label class="text-white" for="nome">Nome</label>
        
                    <input class="radio" type="radio" value="endereco" id="endereco" name="tipo_pesquisa">
                    <label class="text-white" for="endereco">Endereço</label>
                </div>
            </form>
        </div>
    </div>
    
    @if ($beneficiados->all())
    <table class="min-w-full text-center">
        <thead class="bg-gray-800">
            <tr>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nome</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">CPF</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">RG</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Endereço</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Unidade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beneficiados as $beneficiado)
                <tr class="cursor-pointer hover:bg-gray-500  transition duration-0 hover:duration-500" onclick="window.location='{{route('beneficiado.show', $beneficiado->id)}}'">
                    <td class="text-lg text-gray-900 font-semibold px-6 py-4 whitespace-nowrap ">{{$beneficiado->nome}}</td>
                    <td class="text-lg text-gray-900 px-6 py-4 whitespace-nowrap ">{{$beneficiado->cpf}}</td>
                    <td class="text-lg text-gray-900 px-6 py-4 whitespace-nowrap ">{{$beneficiado->rg}}</td>
                    <td class="text-lg text-gray-900 px-6 py-4 whitespace-nowrap ">{{$beneficiado->endereco}}</td>
                    <td class="text-lg text-gray-900 px-6 py-4 whitespace-nowrap">{{$beneficiado->unidade}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <h3 class="text-center text-2xl font-bold">Nada Encontrado.</h3>
    @endif
    <x-rodape />
</body>
</html>

<style>

    .content {
        width: 50vw;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .pesquisar {
        width: 60%;
    }
    .radio {
        margin-left: 10px;
    }

    .input-pesquisar {
        padding: 5px;
        border-radius: 5px;
        width: 70%;
    }

    .input-pesquisar::placeholder{
        padding-left: 10px;
    }
</style>


<script>
    $("input[name=tipo_pesquisa]").on('change', function() {
        if ($(this).val() == "cpf") {

        $("#pesquisa").attr("x-mask", "999.999.999-99");

        } else if ($(this).val() == "nome"){
            $("#pesquisa").attr("x-mask", "");
        } else if ($(this).val() == "endereco"){
            $("#pesquisa").attr("x-mask", "");
        }
    }).change();
</script>