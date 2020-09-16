<?php

class Core {
  private $className = "Home";
  private $methodName = "index";
  private $params = [];
  function __construct() {
    $this->getUrl();
  }
  function getUrl() {
    $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';
    $url = explode('/', $url);

    /* Check Class Name And Intialize it ! */
    if (!empty($url[0])) {
      if (file_exists('../app/controller/'.ucfirst($url[0]).'.php')) {
        $this->className = ucfirst($url[0]);
        unset($url[0]);
      }
    }
    require_once '../app/controller/'.ucfirst($this->className).'.php';
    $this->className = new $this->className;

    /* Call Method Name And Check Have or not ! */
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