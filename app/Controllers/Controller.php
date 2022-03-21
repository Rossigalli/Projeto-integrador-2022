<?php

class Controller
{
    private array $content;

    public function __construct()
    {
    }

    private function setContent($content_)
    {
        $this->content = $content_;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function loadTemplate($view_, $content_ = array())
    {
        $this->setContent($content_);
        require '../app/Views/template.php';
    }

    public function loadView($view_, $content_ = array())
    {
        extract($content_);
        require '../app/Views/' . $view_ . '.php';
    }
}
