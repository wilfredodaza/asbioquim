<?php
class Contact extends Controller
{
  function __construct(){
    parent::__construct();
  }
  function render(){
    $this->view->render('contact/index');
  }
}