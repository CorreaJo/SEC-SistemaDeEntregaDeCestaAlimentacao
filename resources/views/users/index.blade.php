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
                @if (Auth::user()->perfil === 'Coordenador' || Auth::user()->perfil === 'admin')
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Açoes</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            @if ($user->perfil === 'admin')
                <h2 class="text-center p-6 text-2xl underline text-white bg-gray-800">Todos os Funcionários</h2>
            @else
            <tr class="bg-white border-b">
                <td class="text-lg text-gray-900 font-semibold px-6 py-4 whitespace-nowrap ">
                    <a href="#">{{$user->name}}</a>
                </td> 
                <td class="text-lg text-gray-900 px-6 py-4 whitespace-nowrap">
                    {{$user->email}}
                </td>
                <td class="text-lg text-gray-900 px-6 py-4 whitespace-nowrap">
                    {{$user->unidade}}
                </td>
                <td class="text-lg text-gray-900 px-6 py-4 whitespace-nowrap">
                    {{$user->perfil}}
                </td>
                @if (Auth::user()->perfil === 'Coordenador' || Auth::user()->perfil === 'admin')
                    <td class="flex justify-center px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <form  class="mr-2" action="{{route('users.delete', $user->id)}}"        method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="flex items-center border rounded p-2 hover:bg-red-700 hover:text-white transition duration-0 hover:duration-500"><img src="{{asset('images/lixeira.png')}}" alt="">Deletar</button>
                        </form>
                        <a href="{{route('users.edit', $user->id)}}" class="flex items-center border rounded p-2 hover:bg-cyan-800 hover:text-white transition duration-0 hover:duration-500"><img src="{{asset('images/refrescar.png')}}" alt="">Editar</a>
                    </td>
                @endif
                
            </tr>
            @endif
            
                
            @endforeach
        </tbody>
    </table>
    <x-rodape />
</body>
</html>