<?php

use Illuminate\Database\Seeder;
use \App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome='Fornecedor100';
        $fornecedor->site='fornecedor100.com.br';
        $fornecedor->uf='RS';
        $fornecedor->email='fornecedor100@contato.com.br';
        $fornecedor->save();
        
        //o metodo create(atenção ao atributo fillable da classe)
        Fornecedor::create([
            'nome'=> 'Fornecedor200',
            'site'=> 'fornecedor200.com.br',
            'uf'=> 'SP',
            'email'=> 'fornecedor200@contato.com.br'
        ]);

        //metodo insert
        DB::table('fornecedores')->insert([
            'nome'=> 'Fornecedor300',
            'site'=> 'fornecedor300.com.br',
            'uf'=> 'RJ',
            'email'=> 'fornecedor300@contato.com.br'
        ]);
    }
}
