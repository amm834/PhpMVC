<?php
define("HOST_NAME","localhost");
define("USERNAME","root");
define("USERPASS","");
define("DB_NAME","cmsblog");
define("URLROOT","http://localhost:8080/Cmsblog/");
define("APPROOT",dirname(dirname(__FILE__)));
function redirect($page){
  header("Location:".$page);
}
?>