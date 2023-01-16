<header>
    <x-application-logo class="w-[120px]" />
    <div class="links" id="links">
        <a class="link"  href="{{route('index')}}">Página Princpal</a>
        @if (Auth::user()->perfil === 'admin' || Auth::user()->perfil === 'Coordenador')
            <a class="link" href="{{route('register')}}">Registrar Funcionário</a>
            <a class="link" href="{{route('users.index')}}">Ver Funcionários</a>
        @endif

        <h4 class="flex items-center">
            <img src="{{asset('images/perfil.png')}}" class="mr-2" alt="">
            {{Auth::user()->name}}
        </h4>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button><img class="sair" src="{{asset('images/sair.png')}}" alt=""></button>
        </form>
    </div>
</header>

<style>
    * {
        margin: 0;
        padding: 0;
    }
    header {
        display: flex;
        justify-content: space-around;
        align-items: center;
        background-color: lightslategray;
    }

    .links {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 50%;
    }

    .link {
        color: #0C2D48;
        font-weight: 600;
        transition: 0.3s;
    }

    .link:hover {
        text-decoration: underline;
    }

    .sair {
        margin-left: 20px;
        width: 35px;
    }
</style>

<script defer>
    var quantidadeLinks = document.getElementsByClassName("link").length;
    var links = document.getElementById("links");
    if(quantidadeLinks === 1){
        links.style.width = "30%";
    }
</script>