<body x-data>
    <x-guest-layout>
        <x-auth-card>
            <a class="flex items-center pb-3" href="{{route('index')}}">
                <img src="{{asset('images/botao-voltar.png')}}" alt="">
                Voltar
            </a>
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form method="POST" action="{{route('beneficiado.update', $beneficiado->id)}}">
                @csrf
    
                <!-- Name -->
                <div>
                    <x-label for="nome" :value="__('Nome')" />
    
                    <x-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" value="{{$beneficiado->nome}}" required autofocus />
                </div>
    
                <!-- CPF -->
                <div class="mt-4">
                    <x-label for="cpf" :value="__('CPF')" />
    
                    <x-input id="cpf" x-mask="999.999.999-99" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" value="{{$beneficiado->cpf}}" required />  
                </div>
    
                 <!-- RG -->
                <div class="mt-4">
                    <x-label for="rg" :value="__('RG')" />
    
                    <x-input id="rg" x-mask="99.999.999-*" class="block mt-1 w-full" type="text" name="rg" :value="old('rg')" value="{{$beneficiado->rg}}" required />
                </div>
    
                <!-- Endereço -->
                <div class="mt-4">
                    <x-label for="endereco" :value="__('Endereço')" />
    
                    <x-input id="endereco" class="block mt-1 w-full"
                                    type="text"
                                    name="endereco"
                                    value="{{$beneficiado->endereco}}"
                                    required />
                </div>
    
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="quantmembros" :value="__('Quantidade de Membros')" />
    
                    <x-input id="quantmembros" class="block mt-1 w-full"
                                    type="number"
                                    value="{{$beneficiado->quantMembros}}"
                                    name="quantMembros" required />
                </div>
    
    
                <div class="flex items-center justify-end mt-4">
    
                    <x-button class="ml-4">
                        {{ __('Editar') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>
</body>
