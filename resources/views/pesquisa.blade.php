<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
    <x-cabecalho />
    <h2 class="text-center p-6 text-2xl underline text-white bg-gray-800">Pesquisado Por:</h2>
    <table class="min-w-full text-center">
        <thead class="bg-gray-800">
            <tr>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nome</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">CPF</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">RG</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Unidade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beneficiados as $beneficiado)
                <tr class="cursor-pointer hover:bg-gray-500  transition duration-0 hover:duration-500" onclick="window.location='{{route('beneficiado.show', $beneficiado->id)}}'">
                    <td class="text-lg text-gray-900 font-semibold px-6 py-4 whitespace-nowrap ">{{$beneficiado->nome}}</td>
                    <td class="text-lg text-gray-900 px-6 py-4 whitespace-nowrap ">{{$beneficiado->cpf}}</td>
                    <td class="text-lg text-gray-900 px-6 py-4 whitespace-nowrap ">{{$beneficiado->rg}}</td>
                    <td class="text-lg text-gray-900 px-6 py-4 whitespace-nowrap">{{$beneficiado->unidade}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>