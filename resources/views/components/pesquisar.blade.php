<div>
    <form action="#" class="pesquisar">
        <div>
            <input type="text" placeholder="Pesquisar por nome ou CPF">
            <button>Pesquisar</button>
        </div>
        <div>
            <input type="radio" value="nome" id="nome" name="nome" checked> <label for="nome">Nome</label>
            <input type="radio" value="cpf" id="cpf" name="cpf"><label for="cpf">CPF</label>
        </div>
    </form>
</div>

<style>
    .pesquisar {
        width: 400px;
    }

    .pesquisar input {
        padding: 5px;
        border-radius: 10px;
        width: 250px;
    }

    .pesquisar button {
        background-color: transparent;
        padding: 5px;
        border-radius: 10px;
        width: 100px;
    }

    .pesquisar button:hover {
        cursor: pointer;
    }
</style>