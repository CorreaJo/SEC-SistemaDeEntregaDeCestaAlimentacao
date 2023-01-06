<header>
    <x-application-logo class="w-[120px]" />
    <div class="links">
        @if (Auth::user()->perfil === 'admin')
            <a href="{{route('register')}}">Registrar Funcionário</a>
        @endif
        
        <a href="#">Item</a>
        <a href="#">Item</a>
        <h4>{{Auth::user()->name}}</h4>
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
        font-family: 
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
        width: 30vw;
    }

    .sair {
        margin-left: 20px;
        width: 35px;
    }
</style>