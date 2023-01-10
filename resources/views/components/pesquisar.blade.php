<div class="content">
    <form action="#" class="pesquisar">
        <div>
            <input class="input-pesquisar" type="text" placeholder="Pesquisar por nome ou CPF">
            <x-button>
                Pesquisar
            </x-button>
        </div>
        <div>
            <input class="radio" type="radio" value="nome" id="nome" name="pesquisar" checked> <label for="nome">Nome</label>

            <input class="radio" type="radio" value="cpf" id="cpf" name="pesquisar">
            <label for="cpf">CPF</label>
        </div>
    </form>

    <div>
        @if (Auth::user()->perfil === 'Técnico' || 'coordenador' || 'admin')   
            <a  class="cadastrar" href="{{route('beneficiado.create')}}">
                <img src="{{asset('images/Vectorcadastrar.png')}}" alt="">
                <div>
                    Cadastrar Pessoa
                </div>
            </a>
        @endif
    </div>
</div>

<style>

    .content {
        width: 70vw;
        margin: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 5%;
    }
    .pesquisar {
        width: 60%;
    }
    .radio {
        margin-left: 10px;
    }

    .input-pesquisar {
        padding: 5px;
        border-radius: 5px;
        width: 70%;
    }

    .input-pesquisar::placeholder{
        padding-left: 10px;
    }

    .cadastrar {
        background-color: #145DA0;
        width: 100%;
        display: flex;
        padding: 10px;
        color: white;
        border-radius: 5px;
        margin-left: 20px;
    }
</style>