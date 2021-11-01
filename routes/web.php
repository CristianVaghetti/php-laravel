<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return 'Olá Mundo *-*';
});
*/
/*
Route::get('/contato', function () {
    return 'Não estou disponível!';
});
*/
/*
Route::get('/sobre-nos', function () {
    return 'Tudo sobre nós';
});
*/

Route::get('/', 'PrincipalController@principal');

Route::get('/sobre-nos', 'SobreNosController@SobreNos');

Route::get('/contato', 'ContatoController@contato');

Route::get('/contato/{nome}/{categoria_id}', 
    function(string $nome, int $categoria_id){
        echo "Estamos aqui: $nome - $categoria_id";
    }
) -> where('categoria_id', '[0-9]+')-> where('nome', '[A-Za-z]+');

