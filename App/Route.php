<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap
{

	protected function initRoutes()
	{

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['signup'] = array(
			'route' => '/inscreverse',
			'controller' => 'indexController',
			'action' => 'signup'
		);

		$routes['register'] = array(
			'route' => '/registrar',
			'controller' => 'indexController',
			'action' => 'register'
		);
		$routes['authenticate'] = array(
			'route' => '/autenticar',
			'controller' => 'AuthController',
			'action' => 'authenticate'
		);
		$routes['dashboard'] = array(
			'route' => '/dashboard',
			'controller' => 'AppController',
			'action' => 'dashboard'
		);
		$routes['dashboard'] = array(
			'route' => '/dashboard',
			'controller' => 'AppController',
			'action' => 'dashboard'
		);
		$routes['meus_cursos'] = array(
			'route' => '/meus_cursos',
			'controller' => 'AppController',
			'action' => 'myCourses'
		);
		$routes['meu_perfil'] = array(
			'route' => '/meu_perfil',
			'controller' => 'AppController',
			'action' => 'myProfile'
		);
		$routes['certificados'] = array(
			'route' => '/certificados',
			'controller' => 'AppController',
			'action' => 'certificates'
		);
		$routes['ajuda'] = array(
			'route' => '/ajuda',
			'controller' => 'AppController',
			'action' => 'help'
		);
		$routes['logout'] = array(
			'route' => '/logout',
			'controller' => 'AuthController',
			'action' => 'logout'
		);

		// Rotas do admin
		$routes['admin'] = array(
			'route' => '/admin',
			'controller' => 'AdminController',
			'action' => 'index'
		);
		$routes['cadastrar_cursos'] = array(
			'route' => '/cadastrar_cursos',
			'controller' => 'AdminController',
			'action' => 'createCourses'
		);
		$routes['registerCourses'] = array(
			'route' => '/registrar_cursos',
			'controller' => 'AdminController',
			'action' => 'registerCourses'
		);

		$this->setRoutes($routes);
	}
}
