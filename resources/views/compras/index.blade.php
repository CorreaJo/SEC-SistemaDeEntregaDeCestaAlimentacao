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
        <h1 class="text-center text-2xl font-bold m-5">Consultar Relatórios</h1>
        <div class="flex  justify-around flex-wrap">
            <div class="w-[48vw]">
                <table class="m-auto w-3/4 bg-cyan-800 p-4 rounded-xl text-white font-medium">
                    <thead class="border-b border-black ">
                        <tr>
                            <th colspan="2" role="columnheader" scope="col" class="font-medium text-white px-6 py-4">
                                Total de Cestas Disponibilizadas
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td role="gridcell" class="w-3/4 text-lg font-semibold px-6 py-4 whitespace-nowrap">Dia Atual:</td>
                            <td role="gridcell" class="text-lg font-semibold px-6 py-4 whitespace-nowrap text-center">{{ $cuponsDispDiaTotal }}</td>
                        </tr>
                        <tr>
                            <td role="gridcell" class="w-3/4 text-lg font-semibold px-6 py-4 whitespace-nowrap">Mês Atual:</td>
                            <td role="gridcell" class="text-lg font-semibold px-6 py-4 whitespace-nowrap text-center">{{ $cuponsDispMesTotal }}</td>
                        </tr>
                    </tbody>
                    <tfoot class="border-t border-black ">
                        <tr>
                            <th colspan="2" role="columnheader" scope="col" class="font-medium text-white px-6 py-4 underline">
                                <a href="{{ route('relatorioDisp') }}">Ver relatório por unidade</a>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="w-[48vw]">
                <table class="m-auto w-3/4 bg-cyan-800 p-4 rounded-xl text-white font-medium">
                    <thead class="border-b border-black ">
                        <tr>
                            <th colspan="2" role="columnheader" scope="col" class="font-medium text-white px-6 py-4">
                                Total de Cestas Retiradas
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td role="gridcell" class="w-3/4 text-lg font-semibold px-6 py-4 whitespace-nowrap">Dia Atual:</td>
                            <td role="gridcell" class="text-lg font-semibold px-6 py-4 whitespace-nowrap text-center">{{ $cuponsRetiradaDiaTotal }}</td>
                        </tr>
                        <tr>
                            <td role="gridcell" class="w-3/4 text-lg font-semibold px-6 py-4 whitespace-nowrap">Mês Atual:</td>
                            <td role="gridcell" class="text-lg font-semibold px-6 py-4 whitespace-nowrap text-center">{{ $cuponsRetiradaMesTotal }}</td>
                        </tr>
                    </tbody>
                    <tfoot class="border-t border-black ">
                        <tr>
                            <th colspan="2" role="columnheader" scope="col" class="font-medium text-white px-6 py-4 underline">
                                <a href="{{ route('relatorioRetirada') }}">Ver relatório por unidade</a>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="w-[48vw] mt-8">
                <table class="m-auto w-3/4  bg-cyan-800 p-4 rounded-xl text-white font-medium">
                    <thead class="border-b border-black ">
                        <tr>
                            <th colspan="2" role="columnheader" scope="col" class="font-medium text-white px-6 py-4">
                                Total de Cestas Previstas Para o Mês Seguinte
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td role="gridcell" class="w-3/4 text-lg font-semibold px-6 py-4 whitespace-nowrap">Total:</td>
                            <td role="gridcell" class="text-lg font-semibold px-6 py-4 whitespace-nowrap text-center">{{ $cuponsProxMes }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="w-[48vw] mt-8">
                <table class="m-auto w-3/4 bg-cyan-800 p-4 rounded-xl text-white font-medium">
                    <thead class="border-b border-black ">
                        <tr>
                            <th colspan="2" role="columnheader" scope="col" class="font-medium text-white px-6 py-4">
                                Total de Cestas Previstas Para o Ano
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td role="gridcell" class="w-3/4 text-lg font-semibold px-6 py-4 whitespace-nowrap">Total:</td>
                            <td role="gridcell" class="text-lg font-semibold px-6 py-4 whitespace-nowrap text-center">{{ $cuponsAno }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <x-rodape />
</body>
</html>