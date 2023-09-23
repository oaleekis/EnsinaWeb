<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action
{

    public function autenticar()
    {

        $user = Container::getModel('User');

        $user->__set('email', $_POST['email']);
        $user->__set('password', $_POST['password']);

        $user->autenticar();

        if ($user->__get('id') != '' && $user->__get('name')) {
            echo 'Autenticado';

            session_start();

            $_SESSION['id'] = $user->__get('id');
            $_SESSION['name'] = $user->__get('name');

            header('Location: /dashboard');
        } else {
            header('Location: /?login=erro');
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /');
    }
}
