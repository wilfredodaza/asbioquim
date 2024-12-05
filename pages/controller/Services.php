<?php
class Services extends Controller
{
  private $id;

  function __construct(){
    parent::__construct();
    $this->view->id = 0;
  } 
  
  function render($id){
    $service = $this->model->get($id);
    $detail = $this->model->getServiceDetail($id);
    $this->view->service = $service;
    $this->view->detail = $detail;
    $this->view->render('services/index');
  }
  
}
