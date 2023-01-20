<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar cupom para {{$beneficiado->nome}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    
</head>
<body>
    <x-guest-layout>
        <x-auth-card>
            <a class="flex items-center pb-3" href="{{route('beneficiado.show', $beneficiado->id)}}">
                <img src="{{asset('images/botao-voltar.png')}}" alt="">
                Voltar
            </a>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <button id="adicionar">Adicionar</button>

            <form action="{{route('cupom.store', $beneficiado->id)}}" method="post">
                @csrf
                <div id="inputs">
                    <div>
                        <x-label for="mes" :value="__('Selecione o Mês:')" />
                        <select class="rounded-md shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50 block mt-1 w-full" name="mes" id="mes">
                            <option value="" selected disabled>Selecione o mês</option>
                            <option value="01">Janeiro</option>
                            <option value="02">Fevereiro</option>
                            <option value="03">Março</option>
                            <option value="04">Abril</option>
                            <option value="05">Maio</option>
                            <option value="06">Junho</option>
                        </select>
                    </div>
                    <div>
                        <x-label for="dia" :value="__('Selecione o Dia:')" />
                        <x-input id="dia" class="block mt-1 w-full" type="number" name="dia" :value="old('dia')" required />
                    </div>
                </div>

                <template class="tpl">
                      <div>
                          <x-label for="mes" :value="__('Selecione o Mês:')" />
                          <select class="rounded-md shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50 block mt-1 w-full" name="mes" id="mes">
                              <option value="" selected disabled>Selecione o mês</option>
                              <option value="01">Janeiro</option>
                              <option value="02">Fevereiro</option>
                              <option value="03">Março</option>
                              <option value="04">Abril</option>
                              <option value="05">Maio</option>
                              <option value="06">Junho</option>
                          </select>
                      </div>
                      <div>
                          <x-label for="dia" :value="__('Selecione o Dia:')" />
                          <x-input id="dia" class="block mt-1 w-full" type="number" name="dia" :value="old('dia')" required />
                      </div>
                </template>

                <input type="hidden" value="2023" name="ano">
                <input type="hidden" value="{{$beneficiado->id}}" name="idBeneficiado">
        
                <button>Cadastrar</button>
            </form>
        </x-auth-card>
    </x-guest-layout>
</body>
</html>

<script>
    var count = 0;
    $('#adicionar').on('click', function() {
        count += 1;
        $( "#mes" ).prop( "name", "mes"+count);
        $( "#dia" ).prop( "name", "dia"+count);
        $('#inputs').append($('template.tpl').html());
    });
</script>