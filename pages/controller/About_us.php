<?php
class About_us extends Controller
{
  function __construct(){
    parent::__construct();
  }
  function render(){
    $this->view->render('about/index');
  }
}
