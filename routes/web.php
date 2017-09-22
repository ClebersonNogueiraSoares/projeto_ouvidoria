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
    return view('ouvidoria');
});

Route::get('/cadastro', 'OuvidoriaController@adicionarCid');
Route::post('cadastro/cadastrar', 'OuvidoriaController@salvarCid');
Route::get('/ouvidoria', 'HomeController@index');
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Autenticacao@autenticar');
Route::get('password/email','RecuperacaoDeSenha@showLinkRequestForm');
Route::post('password/email','RecuperacaoDeSenha@sendResetLinkEmail');
Route::get('password/reset/{token}','Auth\PasswordController@getReset');
Route::post('password/reset','Auth\PasswordController@postReset');
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');
$this->get('logout', 'Auth\LoginController@logout')->name('logout');


 //Route::get('/logout', 'Autenticacao@getLogout')->name("logout");