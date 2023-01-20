<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar cupom para {{$beneficiado->nome}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
    <x-cabecalho />
    
    <form action="{{route('cupom.store'}}" method="post">
        @csrf
        <label for="selectMes">Selecione o mês:</label>
        <select name="selectMes" id="">
            <option value="01">Janeiro</option>
            <option value="02">Fevereiro</option>
            <option value="03">Março</option>
            <option value="04">Abril</option>
            <option value="05">Maio</option>
            <option value="06">Junho</option>
        </select>

        <label for="dia">Selecione o dia: </label>
        <input type="number" name="dia" id="">

        <input type="hidden" value="2023" name="ano">
        <input type="hidden" value="{{$beneficiado->id}}" name="idBeneficiado">

        <button>Cadastrar</button>
    </form>
</body>
</html>