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
            <h1 class="text-center text-2xl font-bold">Gerar Cupom</h1>

            <form action="{{route('cupom.store', $beneficiado->id)}}" method="post">
                @csrf
                <div id="dynamicAddRemove" class="w-full">
                    <div class="flex items-center">
                        <x-input id="dataCesta" class="block mt-1 w-full" type="date" name="data[0]" required />
                    </div>
                                          
                </div>
                <div class="flex items-center justify-end mt-4">
                    <a id="adicionar" class="bg-[#B1D4E0] cursor-pointer rounded p-2 font-semibold">Adicionar Data</a>
                </div>
                <input type="hidden" value="{{$beneficiado->id}}" name="idBeneficiado">
        
                <div class="flex items-center justify-center mt-4">

                    <x-button class="ml-4">
                        {{ __('Cadastrar Cupom') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>
</body>
</html>

<script>
    var i = 0;
    $('#adicionar').click(function () {
        ++i;
        $("#dynamicAddRemove").append('<div id="input-novo" class="flex items-center"><input id="dataCesta" class="rounded-md shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50 block mt-1 w-[90%]" type="date" name="data[' + i + ']" required /><a class=" ml-2 cursor-pointer text-center" id="remove-input-field"><img class="w-[40px]" src="{{asset('images/remover.png')}}" alt=""></a></div>');
    });

    $(document).on('click', '#remove-input-field', function () {
        $(this).parents('#input-novo').remove();
    });
</script>