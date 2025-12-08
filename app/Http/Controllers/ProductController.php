<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index() {

        $search = request('search');

        if($search){

            $produtos = Produto::where([
                ['nome', 'like', '%'.$search.'%']

            ])->get();

        } else {

            $produtos = Produto::all();

        }
        return view('welcome', ['produtos'=>$produtos, 'search'=>$search]);
    }

    public function create(){
        
        return view('create');
    
    }
    
    public function store(Request $request){

        $produto = new Produto;

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->categoria = $request->categoria;
        $produto->descricao = $request->descricao;

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . ("." . $extension);
            $request->image->move(public_path('img/produtos'), $imageName);
            $produto->image = $imageName;
        }


        $produto->save();

        return redirect('/');
    }


    public function show($id){

        $produto = Produto::findOrFail($id);

        return view('show', ['produto' => $produto]);

    }

    public function addLista($id){

        $user = Auth::user();
        
        $user->listaProdutos()->attach($id);

        $produto = Produto::findOrFail($id);

        return redirect('/dashboard')->with('msg', $produto->nome . 'adicionado a sua lista');
    }

        public function removeLista($id){

        $user = Auth::user();
        
        $user->listaProdutos()->detach($id);

        $produto = Produto::findOrFail($id);

        return redirect('/dashboard')->with('msg', $produto->nome . 'removido de sua lista');
    }

    public function dashboard(){

        $user = Auth::user();

        $produtos = $user->listaProdutos;

        return view('/dashboard', ['produtos'=>$produtos]);
    }

        public function destroy($id){

        Produto::findOrFail($id)->delete();

        return redirect('/')-> with('msg', 'Produto excluído com sucesso.');
        }

        public function edit($id){

        $produto = Produto::findOrFail($id);

        return view('edit', ['produto'=>$produto]);
        }

        public function update(Request $request){

        Produto::findOrFail($request->id)->update($request->all());

        return redirect('/');
        }
}
