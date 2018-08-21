<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:s
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// ==============DEFAULT CONTROLLER=============//
$route['default_controller'] = 'HomeController';


// ==============USERS=============//
$route['usuario/formulario'] = 'UserController/form';
$route['perfil'] = 'UserController/mostraPerfil';
$route['usuario/formulario-altera-imagem'] = 'UserController/formularioImagemPerfil';
$route['usuario/upload-imagem-perfil'] = 'UserController/uploadImagemPerfil';
$route['edita-dados-usuario/(:num)'] = 'UserController/edita_dados_usuario/$1';
$route['altera-status-usuario/(:num)'] = 'UserController/mudaStatusUsuario/$1';

// ==============LOGIN CONTROLLER=============//
$route['login'] = 'LoginController/form';
$route['logar'] = 'LoginController/logar';
$route['password'] = 'LoginController/password';
// $route['criacao-de-password'] = 'LoginController/criaPassword';
$route['envio-de-token'] = 'LoginController/enviaLinkResetPassword';
$route['verificatoken/(:any)'] ='LoginController/verificaToken/$1';
$route['deslogar'] = 'LoginController/deslogar';
// ==============ADMINISTRAR=============//
$route['administrar/categorias']='AdminController/categorias';
$route['administrar/usuarios'] = 'AdminController/usuarios';
$route['administrar/usuariosajax'] = 'AdminController/ajaxListaUsuarios';

// ==============ON ERROR=============//
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// ==============ON ERROR=============//
$route['migrar']='Migrar/exec';
// ==============CATEGORIAS=============//
$route['categoria/formulario'] = 'CategoriaController/form';
$route['editar-categoria/(:num)'] = 'CategoriaController/edita_categoria/$1';
$route['cria-categoria'] = 'CategoriaController/cria';
$route['ativa-desativa-categoria/(:num)'] = 'CategoriaController/mudaStatus/$1';
$route['desativa-atendente-categoria'] = 'CategoriaController/desativaAtendentesSeleccionados';

