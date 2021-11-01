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

// Route::get('/contato/{nome}/{categoria_id}', 
//     function(string $nome, int $categoria_id){
//         echo "Estamos aqui: $nome - $categoria_id";
//     }
// ) -> where('categoria_id', '[0-9]+')-> where('nome', '[A-Za-z]+');



Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@SobreNos')->name('site.sobrenos');;

Route::get('/contato', 'ContatoController@contato')->name('site.contato');;

Route::get('/login', function (){return 'Login';})->name('site.login');;

Route::prefix('/app')->group(function () {
    Route::get('/clientes', function (){return 'Clientes';})-> name('app.clientes');
    Route::get('/fornecedores', function (){return 'Fornecedores';})-> name('app.fornecedores');
    Route::get('/produtos', function (){return 'Produtos';})-> name('app.produtos');
});

Route::get('/rota1', function (){return 'Rota1';})->name('site.rota1');;

Route::get('/rota2', function () {
    return redirect() -> route('site.rota1');
})->name('site.rota2');

Route::fallback(function () {
    echo 'A rota acessada não exite. <a href="'.route('site.index').'">Clique aqui</a> para voltar para pagina inical.';
});
