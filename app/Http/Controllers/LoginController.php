<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';
        
        if($request->get('erro') == 1){
        $erro= 'Usuário e/ou senha não existe!';
        }
        
        if($request->get('erro') == 2){
        $erro= 'Precisa fazer login para acessar';
        }
        
        return view('site.login', ['titulo' => 'Login', 'erro'=> $erro]);
    }
        
    public function autenticar(Request $request){
        
        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //mensagens de erro
        $feedback = [
            'usuario.email' => 'O e-mail deve ser um endereço válido!',
            'senha.required' => 'O campo senha deve ser preenchido!'
        ];

        $request->validate($regras, $feedback);

        //recuperar os parametros do formulario
        $email = $request->get('usuario');
        $password = $request->get('senha');
        echo "Usuario: $email | Senha: $password <br>";

        //iniciar o model User
        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();
        if(isset($usuario->name)){         
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email; 
            return redirect()->route('app.home');
        } else{
            return redirect()->route('site.login', ['erro' => 1]);
        }

    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
