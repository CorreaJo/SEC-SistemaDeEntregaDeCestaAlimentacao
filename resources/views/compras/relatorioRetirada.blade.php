<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Cestas Retiradas</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
    <x-cabecalho />
        <h1 class="text-center text-2xl font-bold m-5">Relatório de Cestas Retiradas</h1>
        <div class="flex justify-around flex-wrap">
            <div class="w-[50vw]">
                <table class="m-auto w-3/4 bg-cyan-800 p-4 rounded-xl text-white font-medium">
                    <thead class="border-b border-black ">
                        <tr>
                            <th colspan="2" role="columnheader" scope="col" class="font-medium text-white px-6 py-4">
                                Total de Cestas Retiradas no Dia Atual
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @for ($i = 0; $i <= 7; $i++)
                        <tr>
                            <td role="gridcell" class="w-3/4 text-lg font-semibold px-6 py-4 whitespace-nowrap">{{ $unidadesNome[$i] }}</td>
                            <td role="gridcell" class="text-lg font-semibold px-6 py-4 whitespace-nowrap text-center">{{ $cuponsRetiradaDiaUnidadeDados[$i] }}</td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
            <div class="w-[50vw]">
                <table class="m-auto w-3/4 bg-cyan-800 p-4 rounded-xl text-white font-medium">
                    <thead class="border-b border-black ">
                        <tr>
                            <th colspan="2" role="columnheader" scope="col" class="font-medium text-white px-6 py-4">
                                Total de Cestas Retiradas no Mês Atual
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @for ($i = 0; $i <= 7; $i++)
                        <tr>
                            <td role="gridcell" class="w-3/4 text-lg font-semibold px-6 py-4 whitespace-nowrap">{{ $unidadesNome[$i] }}</td>
                            <td role="gridcell" class="text-lg font-semibold px-6 py-4 whitespace-nowrap text-center">{{ $cuponsRetiradaMesUnidadeDados[$i] }}</td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
        <x-rodape />
</body>
</html>