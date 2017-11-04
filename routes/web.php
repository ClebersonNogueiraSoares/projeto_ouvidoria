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