<?php

class Core
{
    private object $controller;

    public function __construct()
    {
        $url = new Url(isset($_GET['pag']) ? $_GET['pag'] : '');

        $this->setController($url->getUrlClass());

        call_user_func_array(array($this->getController(), $url->getUrlMethod()), $url->getUrlParameter());
    }

    private function setController($class_)
    {
        $this->controller = new $class_;
    }

    public function getController()
    {
        return $this->controller;
    }
}
