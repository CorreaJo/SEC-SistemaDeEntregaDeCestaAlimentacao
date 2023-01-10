<head>
    <title>Editar {{$user->name}}</title>
</head>

<x-guest-layout>
    <x-auth-card>
        <a class="flex items-center pb-3" href="{{route('index')}}">
            <img src="{{asset('images/botao-voltar.png')}}" alt="">
            Voltar
        </a>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" value="{{$user->name}}" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" value="{{$user->email}}" required />
            </div>

             <!-- Tipo de perfil-->
            <div class="mt-4">
                <x-label for="perfil" :value="__('Perfil')" />

                <select name="perfil" id="perfil" class="w-full">
                    
                    @if ($user->perfil === 'Técnico')
                        <option value="" disabled>Selecione o Perfil</option>
                        <option value="Técnico" selected>Técnico</option>
                        <option value="Coordenador">Coordenador</option>
                    @else 
                        <option value="" disabled>Selecione o Perfil</option>
                        <option value="Técnico">Técnico</option>
                        <option value="Coordenador" selected>Coordenador</option>
                    @endif
                </select>
            </div>

             <!-- Unidade-->
             <div class="mt-4">
                <x-label for="unidade" :value="__('Unidade')" />

                <select name="unidade" id="unidade" class="w-full">
                    @unless (Auth::user()->unidade === 'compras' || Auth::user()->unidade === 'entrega')
                        <option value="" disabled selected>Selecione a unidade</option>
                        <option value="Cras Marina Caron">Cras Marina Caron</option>
                        <option value="Cras Regiane Félix">Cras Regiane Félix</option>
                        <option value="Cras Padre José">Cras Padre José</option>
                        <option value="Cras Lívia Stefany">Cras Lívia Stefany</option>
                    @endunless
                    
                    @if (Auth::user()->unidade === 'compras')
                        <option value="" disabled>Selecione a unidade</option>
                        <option value="compras" selected>Compras</option>

                    @elseif (Auth::user()->unidade === 'entrega')
                        <option value="" disabled>Selecione a unidade</option>
                        <option value="entrega" selected>Entrega</option>
                    @endif

                    
                    
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Atualizar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>