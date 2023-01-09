<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos os funcionários</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
    <x-cabecalho />
    <table class="w-full text-center">
        <thead class="border-b bg-gray-800">
            <tr>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nome</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Email</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Unidade</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Perfil</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Açoes</th>
            </tr>
        </thead class="border-b">
        <tbody>
            @foreach ($users as $user)
            @if ($user->perfil === 'admin')
                <h2 class="text-center p-6 text-2xl underline text-white bg-gray-800">Todos os Funcionários</h2>
            @else
            <tr class="bg-white border-b">
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <a href="#">{{$user->name}}</a>
                </td> 
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$user->email}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$user->unidade}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$user->perfil}}
                </td>
                <td class="flex justify-center px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    <form  class="mr-2" action="{{route('users.delete', $user->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="flex items-center border rounded p-2 hover:bg-red-700 hover:text-white"><img src="{{asset('images/lixeira.png')}}" alt="">Deletar</button>
                    </form>
                    <a href="#" class="flex items-center border rounded p-2 hover:bg-cyan-800 hover:text-white"><img src="{{asset('images/refrescar.png')}}" alt="">Editar</a>
                </td>
            </tr>
            @endif
            
                
            @endforeach
        </tbody>
    </table>
</body>
</html>