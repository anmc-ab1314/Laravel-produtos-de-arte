<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('Artmaxi', 'Dashboard') }}</title>
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
                                    <a href='{{ route('logout')}}' class="nav-link" onclick="event.preventDefault();
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
        <div class=".col-md-10.offset-md-1 dashboard-title-container">
            <h1>Minha lista de produtos</h1>
        </div>
        <div class=".col-md-10.offset-md-1 dashboard-products-container">
            @if(count($produtos) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Descrição</th>
                            <th scope="col"> </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produtos as $produto)
                        <tr>
                            <td scope="row">{{ $loop->index + 1}}</td>
                            <td><a href="/produtos/{{$produto->id}}">{{$produto->nome}}</a></td>
                            <td><p>{{$produto->preco}}</p></td>
                            <td><p>{{$produto->descricao}}</p></td>
                            <td>
                                <form action='/produtos/remove-lista/{{$produto->id}}' method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class='btn btn-danger' href="/dashboard/{{$produto->id}}">Remover</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            @else
            <p>Você ainda não adicionou nenhum produto em sua lista.</p>
            @endif
        </div>

    </body>

</html>