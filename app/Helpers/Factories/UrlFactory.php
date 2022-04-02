<?php

class UrlFactory
{

    private array $url;
    private string $urlClass;
    private string $urlMethod;
    private array $urlParameters;

    public function __construct($url_)
    {
        $this->setUrl(strtolower($url_));
        $this->setUrlClass($this->getUrl());
        $this->setUrlMethod($this->getUrl());
        $this->setUrlParameter($this->getUrl());

        if (
            !$this->isAnExistentController($this->getUrlClass()) &&
            !$this->isAnExistentMethod($this->getUrlClass(), $this->getUrlMethod())
        ) {
            $this->setUrlClass([]);
            $this->setUrlMethod([]);
        }
    }

    private function setUrl($url_)
    {
        $this->url = explode('/', $url_);
    }

    public function getUrl()
    {
        return $this->url;
    }

    private function setUrlClass($url_)
    {
        $this->urlClass = count($url_) > 0 ? $url_[0] . 'Controller' : 'HomeController';
    }

    public function getUrlClass()
    {
        return $this->urlClass;
    }

    private function setUrlMethod($url_)
    {
        $this->urlMethod = (count($url_) > 1) && ($url_[1] != '') ? $url_[1] : 'index';
    }

    public function getUrlMethod()
    {
        return $this->urlMethod;
    }

    private function setUrlParameter($url_)
    {
        $this->urlParameter = count($url_) > 2 ? array_slice($url_, 2) : [];
    }

    public function getUrlParameter()
    {
        return $this->urlParameter;
    }

    private function isAnExistentController($controller_)
    {
        return file_exists('app/Controllers/' . $controller_ . '.php');
    }

    private function isAnExistentMethod($controller_, $method_)
    {
        return method_exists($controller_, $method_);
    }
}
