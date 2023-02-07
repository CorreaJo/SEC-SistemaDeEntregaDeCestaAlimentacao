<body x-data>
    <x-guest-layout>
        <x-auth-card>
            <a class="flex items-center pb-3" href="{{url()->previous()}}">
                <img src="{{asset('images/botao-voltar.png')}}" alt="">
                Voltar
            </a>
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form method="POST" action="{{route('beneficiado.updateObservacao', $id)}}">
                @csrf
                @if(isset($beneficiado->observacao))
                    <div>
                        <x-label for="obs" :value="__('Observações')" />
                        <textarea class="w-full rounded-md shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" name="obs" id="obs" cols="30" rows="10" class="block mt-1 w-full" required autofocus >{{ $beneficiado->observacao }}</textarea>
                    </div>
                @else
                    <div>
                        <x-label for="obs" :value="__('Observações')" />
                        <textarea class="w-full rounded-md shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" name="obs" id="obs" cols="30" rows="10" class="block mt-1 w-full" required autofocus ></textarea>
                    </div>
                @endif
    
                <div class="flex items-center justify-end mt-4">
    
                    <x-button class="ml-4">
                        {{ __('Salvar') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>
</body>
