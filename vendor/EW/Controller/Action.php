<?php

namespace EW\Controller;

abstract class Action
{

    protected $view;

    public function __construct()
    {
        $this->view = new \stdClass();
    }


    protected function render($view)
    {
        require_once "../App/Views/layout1.phtml";
    }

    protected function content()
    {
        $atualClass = get_class($this);

        $atualClass = str_replace('App\\Controllers\\', '', $atualClass);

        $atualClass = strtolower(str_replace('Controller', '', $atualClass));

        require_once "../App/Views/" . $atualClass . "/" . $view . ".phtml";
    }
}

?>