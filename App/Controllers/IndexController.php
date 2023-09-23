<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action
{

	public function index()
	{
		$this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
		$this->render('index');
	}

	public function inscreverse()
	{
		$this->view->user = array(
			'name' => '',
			'email' => '',
			'password' => '',
		);

		$this->view->errorSignin = false;

		$this->render('inscreverse');
	}

	public function registrar()
	{

		$user = Container::getModel('User');

		$user->__set('name', $_POST['name']);
		$user->__set('email', $_POST['email']);
		$user->__set('password', $_POST['password']);

		if ($user->validateDate() && count($user->getUser()) == 0) {

			$user->save();
			$this->render('signin');
		} else {

			$this->view->user = array(
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'password' => $_POST['password'],
			);

			$this->view->errorSignin = true;

			$this->render('inscreverse');
		}
	}
}
