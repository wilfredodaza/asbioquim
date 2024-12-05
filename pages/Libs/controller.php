<?php
class Controller
{
  function __construct(){
    $this->view = new View();
  }
  function loadmodel($model){
    $url = "pages/models/".$model."Model.php";
    if(file_exists($url)){
      require_once $url;
      $model_name = $model."Model";
      $this->model = new $model_name();
    }
  }

}
