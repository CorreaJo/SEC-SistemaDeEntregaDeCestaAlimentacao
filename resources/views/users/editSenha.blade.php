<head>
    <title>Cadastrar Funcionário</title>
</head>

<x-guest-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('users.editSenha') }}">
            {{--{{ route('users.updatePassword') }}--}}
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Senha')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" autofocus />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar a Senha')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Salvar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
