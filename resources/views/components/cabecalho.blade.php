<header>
    <h2>Logo</h2>
    <div>
        <a href="#">Item</a>
        <a href="#">Item</a>
        <a href="#">Item</a>
        <a href="#">Item</a>
    </div>
    <div>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button>Sair</button>
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
        border-bottom: 1px solid black;
        align-items: center;
    }
</style>