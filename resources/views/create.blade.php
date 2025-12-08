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
            <h1>Loja Artmaxi - Venda de produtos de arte</h1>
            <header>
                <nav class="navbar">
                        <ul class="navbar-nav flex-row me-auto">
                            <li class ='nav-item'><a href='/' class="nav-link">Voltar ao início</a></li>
                            <li class ='nav-item'><a href='/produtos/add-produto' class="nav-link">Adicionar Produto</a></li>
                            <li class ='nav-item'><a href='/deletar-produto' class="nav-link">Deletar Produto</a></li>
                            <li class ='nav-item'><a href='/atualizar-produto' class="nav-link">Atualizar Produto</a></li>
                        </ul>
            
                        <ul class="navbar-nav flex-row ms-auto">
                            <li class ='nav-item mt-2'>
                                <form action="/" method="GET" style="width: 400px">
                                <input type ='text' id='search' name='search' class="form-control" placeholder="Procurar produtos...">
                                </form>
                            </li>
                            <li class ='nav-item'><a href='/login-usuario' class="nav-link">Login</a></li>
                            <li class ='nav-item'><a href='/cadastro-usuario' class="nav-link">Cadastrar</a></li>
                        </ul>
                </nav>
            </header>
        </div>
        <div id="product-create-container" class="col-md-6 offset-md-3">
            <h2>Adicione um produto na loja</h2>
            <form action="/produtos" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Produto:</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do produto">
                </div>
                <div class="form-group">
                    <label for="title">Preço:</label>
                    <input type="text" class="form-control" id="preco" name="preco" placeholder="Preço do produto">
                </div>
                <div class="form-group">
                    <label for="title">Categoria:</label>
                    <select class="form-control" id="categoria" name="categoria">
                        <option value="0">Cavaletes</option>
                        <option value="1">Tintas</option>
                        <option value="2">Pincéis</option>
                        <option value="3">Quadros</option>
                        <option value="4">Paletas</option>
                        <option value="5">Argilas</option>
                        <option value="6">Ferramentas</option>
                        <option value="7">Papéis</option>
                        <option value="8">Lápis</option>
                        <option value="9">Canetas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Descrição:</label>
                    <textarea id="descricao" name="descricao" class="form-control"  placeholder="Descrição do produto" rows=5></textarea>
                </div>
                <div>
                    <label for="image">Imagem do produto:</label>
                    <input type="file" id="image" name="image" class="form-control-file">
                </div>
                <div> 
                    <input type="submit" class="btn btn-primary" value="Adicionar Produto">
                </div>
            </form>
        </div>    
    </body>
</html>