<head>
    <title>Cadastrar Funcionário</title>
</head>

<x-guest-layout>
    <x-auth-card>
        <a class="flex items-center pb-3" href="{{route('index')}}">
            <img src="{{asset('images/botao-voltar.png')}}" alt="">
            Voltar
        </a>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

             <!-- Tipo de perfil-->
            <div class="mt-4">
                <x-label for="perfil" :value="__('Perfil')" />

                <select name="perfil" id="perfil" class="rounded-md w-full shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50">
                    <option value="" disabled selected>Selecione o Perfil</option>
                    <option value="Técnico">Técnico</option>
                    <option value="Coordenador">Coordenador</option>
                </select>
            </div>

             <!-- Unidade-->
             <div class="mt-4">
                <x-label for="unidade" :value="__('Unidade')" />

                <select name="unidade" id="unidade" class="rounded-md w-full shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50">
                    @if (Auth::user()->perfil === 'admin')
                        <option value="" disabled selected>Selecione a unidade</option>
                        <option value="Cras Marina Caron">Cras Marina Caron</option>
                        <option value="Cras Regiane Félix">Cras Regiane Félix</option>
                        <option value="Cras Padre José">Cras Padre José</option>
                        <option value="Cras Lívia Stefany">Cras Lívia Stefany</option>
                        <option value="compras">Compras</option>
                        <option value="entrega">Entrega</option>
                    @else
                        @unless (Auth::user()->unidade === 'compras' || Auth::user()->unidade === 'entrega')
                            <option value="" disabled selected>Selecione a unidade</option>
                            <option value="Cras Marina Caron">Cras Marina Caron</option>
                            <option value="Cras Regiane Félix">Cras Regiane Félix</option>
                            <option value="Cras Padre José">Cras Padre José</option>
                            <option value="Cras Lívia Stefany">Cras Lívia Stefany</option>
                        @endunless
                        
                        @if (Auth::user()->unidade === 'compras')
                            <option value="" disabled selected>Selecione a unidade</option>
                            <option value="compras">Compras</option>

                        @elseif (Auth::user()->unidade === 'entrega')
                            <option value="" disabled selected>Selecione a unidade</option>
                            <option value="entrega">Entrega</option>

                        
                        @endif
                    @endif
                    
                </select>
            </div>

            <!-- Password -->
                <x-input id="password" type="hidden" name="password" value="123456" />

            <!-- Confirm Password -->
                <x-input id="password_confirmation" type="hidden" name="password_confirmation" value="123456" />

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
