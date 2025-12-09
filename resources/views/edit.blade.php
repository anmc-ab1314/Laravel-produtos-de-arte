<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Artmaxi') }}</title>
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
        <div id="product-create-container" class="col-md-6 offset-md-3">
            <h2>Editar o produto {{$produto->nome}}</h2>
            <form action="/produtos/update/{{$produto->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Produto:</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do produto" value="{{$produto->nome}}">
                </div>
                <div class="form-group">
                    <label for="title">Preço:</label>
                    <input type="text" class="form-control" id="preco" name="preco" placeholder="Preço do produto" value="{{$produto->preco}}">
                </div>
                <div class="form-group">
                    <label for="title">Categoria:</label>
                    <select class="form-control" id="categoria" name="categoria">
                            <option value="1">Cavaletes</option>
                            <option value="2">Tintas</option>
                            <option value="3">Pincéis</option>
                            <option value="4">Quadros</option>
                            <option value="5">Paletas</option>
                            <option value="6">Argilas</option>
                            <option value="7">Ferramentas</option>
                            <option value="8">Papéis</option>
                            <option value="9">Lápis</option>
                            <option value="10">Canetas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Descrição:</label>
                    <textarea id="descricao" name="descricao" class="form-control"  placeholder="Descrição do produto" rows=5>{{$produto->descricao}}</textarea>
                </div>
                <div>
                    <label for="image">Imagem do produto:</label>
                    <input type="file" id="image" name="image" class="form-control-file">
                    <img src="/img/produtos/{{$produto->image}}" alt="{{$produto->nome}}" class="img-preview">
                </div>
                <div> 
                    <input type="submit" class="btn btn-primary" value="Editar Produto">
                </div>
            </form>
        </div>    
    </body>
</html>