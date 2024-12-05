<?php
class View
{
  function __construct(){

  }

  function render($file, $params=[]){
    $this->param = $params;
    require "pages/views/{$file}.php";
  }
}
