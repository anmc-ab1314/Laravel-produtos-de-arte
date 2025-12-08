<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Artmaxi') }}</title>
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
                                </form>
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
        <div class='col-md10 offset-md-i'>
            <div class='row'>
                <div id="image-container" class="col-md-6">
                    <img src="/img/produtos/{{$produto->image}}" class="img-fluid">
                </div>
                <div id=info-container class="col-md-6">
                    <h1>{{$produto->nome}}</h1>
                    <p>Preço: R${{$produto->preco}}</p>
                    <p>Descrição: {{$produto->descricao}}</p>          
                    <form action="/produtos/add-lista/{{$produto->id}}" method="POST">
                        @csrf
                        <a href='/produtos/add-lista/{{$produto->id}}' class="btn btn-primary" onclick="event.preventDefault();
                        this.closest('form').submit();">Adicionar produto em sua lista</a>
                    </form>                                           
                </div>


                        <form action="/produtos/{{$produto->id}}" method="POST">
                             @csrf
                             @method('DELETE')
                            <a href='/produtos/{{$produto->id}}' class="btn btn-danger delete-btn" onclick="event.preventDefault();
                            this.closest('form').submit();">Deletar produto</a>
                        </form>

                        <form action="/produtos/edit/{{$produto->id}}" method="GET">
                             @csrf
                            <a href='/produtos/edit/{{$produto->id}}' class="btn btn-info edit-btn" onclick="event.preventDefault();
                            this.closest('form').submit();">Atualizar produto</a>   
                        </form>
            </div>
        </div>

    </body>

</html>