<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); //cm, mm, kg
            $table->string('descricao', 20); // centimetros, quilos ...
            $table->timestamps();
        });

        // criação de relacionamento com a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
           $table->unsignedBigInteger('unidade_id');
           $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        // criação de relacionamento com a tabela detalhes
        Schema::table('produtos_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        //remover criação de relaionamento com a tabela detalhes
        Schema::table('produtos_detalhes', function (Blueprint $table) {
            //remover a FK
            $table->dropForeign('produtos_detalhes_unidade_id_foreign');
            //remover a coluna
            $table->dropColumn('unidade_id');
         });

         //remover criação de relaionamento com a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            //remover a FK
            $table->dropForeign('produtos_unidade_id_foreign');
            //remover a coluna
            $table->dropColumn('unidade_id');
         });

        Schema::dropIfExists('unidades');
    }
}
