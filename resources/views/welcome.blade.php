<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('Artmaxi', 'Artmaxi') }}</title>
        <link rel="icon" type="image/x-icon" href="/img/favicon.ico">


        
        <link rel="stylesheet" href="/css/styles.css">
        <!--CSS Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

        
    </head>

    <body>
        <div class='main-header'>
            <h1 class='lojaartmaxi'>Loja Artmaxi - Venda de produtos de arte</h1>
            <header>
                <nav class="navbar">
                        <ul class="navbar-nav flex-row me-auto">
                            <li class ='nav-item'><a href='/' class="nav-link">Voltar ao início</a></li>
                            <li class ='nav-item'><a href='/produtos/add-produto' class="nav-link">Adicionar Produto</a></li>
                        </ul>

                        <ul class="navbar-nav flex-row ms-auto">
                            <li class ='nav-item mt-2 mx-3'>
                                <form action="/" method="GET" style="width: 400px">
                                <input type ='text' id='search' name='search' class="form-control" placeholder="Procurar produtos...">
                                </form>
                            </li>
                            @auth
                            <li class ='nav-item'><a href='/dashboard' class="nav-link">Lista de compras</a></li>
                            <li class ='nav-item'>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <a href='/logout' class="nav-link" onclick="event.preventDefault();
                                       this.closest('form').submit();">Logout</a>
                            </li>

                            @endauth   
                            @guest
                            <li class ='nav-item'><a href='/login' class="nav-link">Login</a></li>
                            <li class ='nav-item'><a href='/register' class="nav-link">Cadastrar</a></li>
                            @endguest
                        </ul>
                </nav>
            </header>
        </div>
        <br>
        <br>
        <br>
        @if($search)
            <h2>Buscando por: {{$search}}</h2>
        @else
        <h2>Nossos produtos</h2>
        @endif
        <div class="grid">
        @foreach ($produtos as $produto)
            <div class='Cat{{$produto->categoria}}'>
                <p>Produto: {{$produto->nome}}</p>
                <p>Preço: R${{$produto->preco}}</p>
                <img src="/img/produtos/{{$produto->image}}" width="200" height="200"> 
                <a href="/produtos/{{$produto->id}}" class='btn btn-primary'> Saiba mais</a>
            </div>
        @endforeach
        </div>
        @if(count($produtos) == 0 && $search)
            <p>Não há produtos relacionados a sua pesquisa '{{$search}}'</p>
        @elseif (count($produtos) == 0)
            <p>Não há produtos no momento.'</p>
        @endif
    </body>
</html>
