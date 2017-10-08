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

Route::get('/', function () {
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Autenticacao@autenticar');
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');
$this->get('logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();

Route::get('/sobre','OuvidoriaController@sobre');
Route::get('/solicitacao','OuvidoriaController@solicitacao');
Route::get('/formulario-de-servico','OuvidoriaController@formSolicitacao');
Route::get('/acompanhar-servico','OuvidoriaController@acompanhaServico');
Route::get('/https://www.facebook.com/PrefeituradeTatui/','OuvidoriaController@facebook');
Route::get('https://www.tatui.sp.gov.br','OuvidoriaController@portal');


 //Route::get('/logout', 'Autenticacao@getLogout')->name("logout");