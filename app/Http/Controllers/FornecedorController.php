<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    
    public function index () {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {

        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')->
        where('site', 'like', '%'.$request->input('site').'%')->
        where('uf', 'like', '%'.$request->input('uf').'%')->
        where('email', 'like', '%'.$request->input('email').'%')->get();
               
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request) {

        $msg = '';
        if($request->input('_token') != '' && $request->input('id') == '' ){
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email' 

            ];
            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter pelo menos 3 caracteres',
                'nome.min' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo nome deve ter 2 caracteres',
                'uf.max' => 'O campo nome deve ter 2 caracteres',
                'email' => 'O campo deve ser preenchido com um email válido'
            ];
            
            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            //Fornecedor::create($request->all());
            $msg = 'Cadastro efetuado com sucesso!';
        }
        //edição de resgistro
        if($request->input('_token') != '' && $request->input('id') != '' ) {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                $msg = 'Usuário atualizado com sucesso!';
            }else{
                $msg = 'Deu M';
            }

            return redirect()->route('app.fornecedores.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }
        
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '') {
       
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg'=> $msg]);
    }

    public function excluir($id){
        $msg = 'Fornecedor excluído com sucesso!';
        Fornecedor::find($id)->delete();
        return view('app.fornecedor.index', ['msg' => $msg]);

    }
}

   