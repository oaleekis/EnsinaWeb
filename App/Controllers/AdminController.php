<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AdminController extends Action
{

	public function index()
	{
		$this->render('index');
	}

	public function createCourses()
	{
		$this->render('createCourses');
	}

	public function registerCourses()
	{
		$course = Container::getModel('course');

		$course->__set('name', $_POST['name']);
		$course->__set('description', $_POST['description']);
		$course->__set('category', $_POST['category']);
		$course->__set('qty_lesson',  isset($_POST['qty_lesson'] ) ? $_POST['qty_lesson'] : 0);
		$course->__set('total_hours', isset($_POST['total_hours']) ? $_POST['total_hours'] : 0);

		if ($course->validateDate()) {
			$course->save();
			$this->render('registerSuccess'); 
		} else {
			$this->render('index'); // TODO: tela de erro ao cadastrar curso
		}
	}
}
