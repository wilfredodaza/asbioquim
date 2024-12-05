<?php
class Errores extends Controller
{
  function __construct(){
    parent::__construct();
  }
  function render(){
    $this->view->render('error/index');
  }
}
