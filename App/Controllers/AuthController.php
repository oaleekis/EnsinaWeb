<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action {

    public function autenticar() {

        $user = Container::getModel('User');

        $user->__set('email', $_POST['email']);
        $user->__set('password', $_POST['password']);

        $user->autenticar();

        if($user->__get('id') != '' && $user->__get('name')){
            echo 'Autenticado'; 
        } else {
            header('Location: /?login=erro');
        }
    }
}
