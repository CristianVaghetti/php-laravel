<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Middleware\LogAcessoMiddleware;

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

// Route::get('/rota1', function (){return 'Rota1';})->name('site.rota1');;

// Route::get('/rota2', function () {
//     return redirect() -> route('site.rota1');
// })->name('site.rota2');



Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@SobreNos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');

Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

Route::get('/login{erro?}', 'LoginController@index')->name('site.login');

Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao')->prefix('/app')->group(function () {
    Route::get('/home', 'HomeController@index')-> name('app.home');
    Route::get('/sair', 'LoginController@sair')-> name('app.sair');
    Route::get('/clientes', 'ClienteController@index')-> name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')-> name('app.fornecedores');
    Route::post('/fornecedores/listar', 'FornecedorController@listar')-> name('app.fornecedores.listar');
    Route::get('/fornecedores/adicionar', 'FornecedorController@adicionar')-> name('app.fornecedores.adicionar');
    Route::post('/fornecedores/adicionar', 'FornecedorController@adicionar')-> name('app.fornecedores.adicionar');
    Route::get('/fornecedores/editar{id}/{msg?}', 'FornecedorController@editar')-> name('app.fornecedores.editar');
    Route::get('/fornecedores/excluir{id}', 'FornecedorController@excluir')-> name('app.fornecedores.excluir');
    
    Route::resource('produto', 'ProdutoController');
});

Route::fallback(function () {
    echo 'A rota acessada não exite. <a href="'.route('site.index').'">Clique aqui</a> para voltar para pagina inical.';
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste')-> where('p1', '[0-9]+')-> where('p2', '[0-9]+');
