<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// public function auth()
//     {
//         return function ($options = []) {
//             $namespace = class_exists($this->prependGroupNamespace('Auth\LoginController')) ? null : 'App\Http\Controllers';

//             $this->group(['namespace' => $namespace], function() use($options) {
//                 // Login Routes...
//                 if ($options['login'] ?? true) {
//                     $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
//                     $this->post('login', 'Auth\LoginController@login');
//                 }

//                 // Logout Routes...
//                 if ($options['logout'] ?? true) {
//                     $this->post('logout', 'Auth\LoginController@logout')->name('logout');
//                 }

//                 // Registration Routes...
//                 if ($options['register'] ?? true) {
//                     $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//                     $this->post('register', 'Auth\RegisterController@register');
//                 }

//                 // Password Reset Routes...
//                 if ($options['reset'] ?? true) {
//                     $this->resetPassword();
//                 }

//                 // Password Confirmation Routes...
//                 if ($options['confirm'] ??
//                     class_exists($this->prependGroupNamespace('Auth\ConfirmPasswordController'))) {
//                     $this->confirmPassword();
//                 }

//                 // Email Verification Routes...
//                 if ($options['verify'] ?? false) {
//                     $this->emailVerification();
//                 }
//             });
//         };
//     }

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/equipos', 'EquipoController');

Route::get('/buscarEquipo/{texto}', 'EquipoController@buscarEquipo');

Route::resource('/departamentos_ciudades', 'CiudadController');

Route::resource('/jugadores', 'JugadorController');
