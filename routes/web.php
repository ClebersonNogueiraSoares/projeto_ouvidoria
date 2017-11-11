<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 * 
 */

Route::get('/', function (){
    return view('home');
});
//Telas de autenticação
Route::get('/home', 'HomeController@index')->name('home');
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Autenticacao@authenticated');
//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');


$this->post('register', 'Auth\RegisterController@register');
$this->get('logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();
Route::get('/verifyemail/{token}','Auth\RegisterController@verify');
//Telas de navegação
Route::get('/sobre','OuvidoriaController@sobre');
Route::get('/solicitacao','OuvidoriaController@solicitacao');
Route::get('/formulario-de-servico','OuvidoriaController@formSolicitacao');
Route::get('/acompanhar-servico','OuvidoriaController@acompanhaServico');
Route::get('/https://www.facebook.com/PrefeituradeTatui/','OuvidoriaController@facebook');
Route::get('https://www.tatui.sp.gov.br','OuvidoriaController@portal');

//Telas de Upload ou Busca de dados

Route::post('/cadastro/servico','OuvidoriaController@move');
Route::post('/buscar/protocolo','OuvidoriaController@buscarProtocolo');


 Route::group(['prefix' => 'painel-do-cidadao', 'middleware' => 'cidadao'],function(){
     Route::get('/','CidadaoController@painel');
     Route::get('abrir-solicitacao','CidadaoController@cadastrarServico');
     Route::post('abrir-solicitacao','CidadaoController@moveDeCadastro'); 
     Route::get('consulta-de-protocolo/{data}','CidadaoController@resultadoDetalhado2');
     Route::post('consulta-de-protocolo','CidadaoController@buscarProtocolo');
     Route::post('reabrir-protocolo/{data}','CidadaoController@reabrirProtocolo');
     Route::post('enviado{data}','CidadaoController@move');
 });
 //Rotas de gestão de usuários
 Route::group(['prefix' => 'administrador', 'middleware' => 'admin'],function(){
     Route::get('/','AdminController@painel');
     Route::get('administracao-de-usuarios','AdminController@admUsers');
     Route::get('painel-de-controle-de-usuarios','AdminController@getUsers');
     Route::post('painel-de-controle-de-usuarios','AdminController@getUsers');
     Route::post('editar-usuario','AdminController@editar');
     Route::post('update-usuario','AdminController@update');
     Route::post('deletar-usuario/{da}','AdminController@delete');
 });
 //Rotas de gestão de serviços
 Route::group(['prefix' => 'administrador/solicitacoes', 'middleware' => 'admin'],function(){
     Route::get('/','AdminController@servicoDenuncia');
     Route::get('denuncias','AdminController@getDenuncias');
     Route::post('detalhes','AdminController@detalharDenuncia');
     Route::post('denuncia/excluida','AdminController@excluirDenuncia');
     Route::get('painel-servicos','AdminController@servicos');
     Route::post('todos-servicos','AdminController@getServicoAll');
     Route::post('servicos/vencidos','AdminController@getServicoVencido');
     
     
 });
 