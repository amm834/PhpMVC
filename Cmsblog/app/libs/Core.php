<?php

class Core {
  private $className = "Home";
  private $methodName = "index";
  private $params = [];
  function __construct() {
    $this->getUrl();
  }
  function getUrl() {
    $url = isset($_SERVER['REQUEST_URI']) ? rtrim($_SERVER['REQUEST_URI'], '/') : '';
    $url = explode('/', $url);
    unset($url[0]);
    unset($url[1]);
    $url = array_values($url);
    if (!empty($url[0])) {
      if (file_exists('../app/controller/'.ucfirst($url[0]).'.php')) {
        $this->className = ucfirst($url[0]);
        unset($url[0]);
      }
    }
    require_once '../app/controller/'.ucfirst($this->className).'.php';
    $this->className = new $this->className;

    if (!empty($url[1])) {
      if (method_exists($this->className, $url[1])) {
        $this->methodName = $url[1];
        unset($url[1]);
      }
    }

    $this->params = !empty($url) ? array_values($url) : [];

    call_user_func([$this->className, $this->methodName], $this->params);

  }
}

?>