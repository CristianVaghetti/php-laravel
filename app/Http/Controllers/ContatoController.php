<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        // print_r($request->input('nome'));
        // echo '<br>';
        // print_r($request->input('email'));
        /*$contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        //print_r($contato->getAttributes());
        $contato->save();
        */
        //$contato->create($request->all());
        /*$contato = new SiteContato();
        $contato->fill($request->all());
        $contato->save();
        */
        
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['titulo'=> 'Contato (teste)' ,'motivo_contatos' => $motivo_contatos]);
        
    }
    public function salvar(Request $request){
        //dd($request);
        //return view('site.contato');
        //SiteContato::create($request->all());
        $request->validate([
            'nome' => 'required|min:3|max:20',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ],[
            'nome.required'=> 'Tem que colocar nome boca aberta...',
            'nome.min'=> 'Um nome válido né Zé...',
            'nome.max'=> 'Não precisa colocar toda árvore genealógica',
            'telefone.required'=> 'Coloca um telefone o seu bosta',
            'email.email'=> 'Email invalido, vou pedir pra Deus te retornar',
            'motivo_contatos_id.required'=> 'Seleciona uma opção! Nem isso tu consegue?!',
            'mensagem.required'=> 'Manda pelo menos a merda!'

        ]);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
        
    }
}
