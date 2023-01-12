<head>
    <title>Cadastrar Beneficiado</title>

</head>

<body x-data>
    <x-guest-layout>
        <x-auth-card>
            <a class="flex items-center pb-3" href="{{route('index')}}">
                <img src="{{asset('images/botao-voltar.png')}}" alt="">
                Voltar
            </a>
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form method="POST" action="{{route('beneficiado.register')}}">
                @csrf
    
                <!-- Name -->
                <div>
                    <x-label for="nome" :value="__('Nome')" />
    
                    <x-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus />
                </div>
    
                <!-- CPF -->
                <div class="mt-4">
                    <x-label for="cpf" :value="__('CPF')" />
    
                    <x-input id="cpf" x-mask="999.999.999-99" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required />  
                </div>
    
                 <!-- RG -->
                <div class="mt-4">
                    <x-label for="rg" :value="__('RG')" />
    
                    <x-input id="rg" x-mask="99.999.999-*" class="block mt-1 w-full" type="text" name="rg" :value="old('rg')" required />
                </div>
    
                <!-- Endereço -->
                <div class="mt-4">
                    <x-label for="endereco" :value="__('Endereço')" />
    
                    <x-input id="endereco" class="block mt-1 w-full"
                                    type="text"
                                    name="endereco"
                                    required />
                </div>
    
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="quantmembros" :value="__('Quantidade de Membros')" />
    
                    <x-input id="quantmembros" class="block mt-1 w-full"
                                    type="number"
                                    name="quantMembros" required />
                </div>
    
                <!-- Unidade -->
                <div class="mt-4">
                    <x-label for="unidade" :value="__('Unidade')" />
    
                    <select name="unidade" id="unidade" class="w-full">
                        <option value="" disabled selected>Selecione a unidade</option>
                        <option value="Cras Marina Caron">Cras Marina Caron</option>
                        <option value="Cras Regiane Félix">Cras Regiane Félix</option>
                        <option value="Cras Padre José">Cras Padre José</option>
                        <option value="Cras Lívia Stefany">Cras Lívia Stefany</option>
                    </select>
                </div>
    
    
                <div class="flex items-center justify-end mt-4">
    
                    <x-button class="ml-4">
                        {{ __('Registrar') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>
</body>
