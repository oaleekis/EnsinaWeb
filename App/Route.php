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

		$routes['inscreverse'] = array(
			'route' => '/inscreverse',
			'controller' => 'indexController',
			'action' => 'inscreverse'
		);

		$routes['registrar'] = array(
			'route' => '/registrar',
			'controller' => 'indexController',
			'action' => 'registrar'
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
		$routes['registrar_cursos'] = array(
			'route' => '/registrar_cursos',
			'controller' => 'AdminController',
			'action' => 'registerCourses'
		);

		$this->setRoutes($routes);
	}
}
