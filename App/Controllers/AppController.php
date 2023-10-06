<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action
{
    public function dashboard()
    {
        session_start();


        if ($_SESSION['id'] != '' && $_SESSION['name'] != '') {

            // recuperar todos cursos
            $course =  Container::getModel('Course');

            $courses = $course->getAll();

            $this->view->courses = $courses;

            $this->render('dashboard');
        } else {
            header('Location: /?login=error');
        }
    }

    public function myCourses()
    {
        session_start();


        if ($_SESSION['id'] != '' && $_SESSION['name'] != '') {
            $this->render('myCourses');
        } else {
            header('Location: /?login=error');
        }
    }

    public function myProfile()
    {
        session_start();


        if ($_SESSION['id'] != '' && $_SESSION['name'] != '') {
            $this->render('myProfile');
        } else {
            header('Location: /?login=error');
        }
    }

    public function certificates()
    {
        session_start();


        if ($_SESSION['id'] != '' && $_SESSION['name'] != '') {
            $this->render('certificates');
        } else {
            header('Location: /?login=error');
        }
    }

    public function help()
    {
        session_start();


        if ($_SESSION['id'] != '' && $_SESSION['name'] != '') {
            $this->render('help');
        } else {
            header('Location: /?login=error');
        }
    }
}
