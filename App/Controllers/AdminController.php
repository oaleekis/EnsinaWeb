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
		$course->__set('category', md5($_POST['category']));
		$course->__set('qty_lesson', md5($_POST['qty_lesson']));
		$course->__set('total_hours', md5($_POST['total_hours']));

		if ($course->validateDate() && count($course->getCourse()) == 0) {

			$course->save();
			$this->render('index'); // TODO: tela de sucesso ao cadastrar curso
		} else {
			$this->render('index'); // TODO: tela de erro ao cadastrar curso
		}
	}
}
