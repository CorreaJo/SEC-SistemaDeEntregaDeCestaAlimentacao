<div class="bg-slate-700 w-[350px] rounded-xl h-[150px] text-white p-3 flex flex-col justify-center">
    <div class="flex items-center justify-between mb-4">
        <h2>{{$cupom->id}}</h2>
        <h3>{{$beneficiado->cpf}}</h3>
    </div>
    <h1 class="text-center font-bold text-2xl">{{$beneficiado->nome}}</h1>
    <h3 class="mt-4">Data: {{$cupom->dataDisp}}</h3>
</div>