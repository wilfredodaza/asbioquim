<?php
  require_once 'pages/controller/Error.php';
  require_once 'pages/controller/Errores.php';
  Class App{
    function __construct(){
      $url = $_GET['url'];
      $url = rtrim($url, '/');
      $url = explode('/', $url);

      $name_controller = "pages/controller/".ucfirst($url[0]).".php";
      if (!file_exists($name_controller) && !empty($url[0])){
        $controller = new Errores();
        $controller->render();
        return $controller;
      }
      if(empty($url[0])){
        require_once "pages/controller/Home.php";
        $controller = new Home();
        $controller->loadmodel("Home");
        $controller->render();
        return false;
      }else{
        if (!empty($url[2])){
          $controller = new Errores();
          $controller->render();
          return $controller;
        }
        require_once $name_controller;
        // echo $name_controller;
        $controller = new $url[0];
        $controller->loadmodel("Services");
        if(!empty($url[1])){
          return $controller->render($url[1]);
        }
        $controller->render();
      }
    }
  }