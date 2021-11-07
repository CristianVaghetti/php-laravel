<?php

use Illuminate\Database\Seeder;
use \App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $contato = new SiteContato();
        $contato->nome='Sistema SG';
        $contato->telefone='(53)96969-6969';
        $contato->email='sistemasg@contato.com.br';
        $contato->motivo_contato=3;
        $contato->mensagem='Ta ficando foda pra krl';
        $contato->save();
    }
    */
        factory(SiteContato::class, 100)->create();
    }
}
