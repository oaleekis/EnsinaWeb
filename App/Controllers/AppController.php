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
            $this->render('dashboard');
        } else {
            header('Location: /?login=error');
        }
    }
}
