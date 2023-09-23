<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

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
		$routes['autenticar'] = array(
			'route' => '/autenticar',
			'controller' => 'AuthController',
			'action' => 'autenticar'
		);
		$routes['dashboard'] = array(
			'route' => '/dashboard',
			'controller' => 'AppController',
			'action' => 'dashboard'
		);
		$routes['logout'] =array(
			'route' => '/logout',
			'controller' => 'AuthController',
			'action' => 'logout'
		);

		$this->setRoutes($routes);
	}

}

?>