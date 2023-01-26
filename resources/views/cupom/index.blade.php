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
            <h1 class="text-center text-2xl font-bold">Consultar Cupons</h1>
            <x-pesquisar />
        </div>
    </div>
    <div>
        <h2 class="text-center text-2xl font-bold bg-gray-800 text-white pt-4">Todos os cupons para hoje</h2>
        <table class="w-full text-center">
            <thead class="bg-gray-800">
                <tr>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Código</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Data</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Data de Expiração</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cupons as $cupom)
               
                <tr class="border-b cursor-pointer hover:bg-gray-500  transition duration-0 hover:duration-500" onclick="window.location='{{route('cupom.show', array('id'=> $cupom->idBeneficiado, 'idCupom'=> $cupom->id))}}'">
                    <td class="text-lg text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">
                    @php
                        $pr_id = $cupom->id;
                        $pr_id = sprintf("%06d", $pr_id);
                    @endphp
                    <h2>{{$pr_id}}</h2>
                    </td>
                    <td class="text-lg text-gray-900 px-6 py-4 whitespace-nowrap">
                        {{\Carbon\Carbon::parse($cupom->dataDisp)->format('d/m/Y')}}
                    </td>
                    <td class="text-lg text-gray-900 px-6 py-4 whitespace-nowrap">
                        {{\Carbon\Carbon::parse($cupom->dataLimite)->format('d/m/Y')}}
                    </td>
                </tr>
        
                @endforeach
            </tbody>
        </table>
        {{$cupons->withQueryString()->links()}}
    </div>
    <x-rodape />
</body>
</html>