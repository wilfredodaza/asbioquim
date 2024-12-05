<?php
class ServicesModel extends Model
{

  public $id;
  function __construct(){
    parent::__construct();
  }
  function get($id){
    $query = $this->db->connect()->query("Select * From services Where id = '$id'")->fetchAll(PDO::FETCH_OBJ);
    return $query[0];
  }
  function getService(){
    $query = $this->db->connect()->query("Select * From services")->fetchAll(PDO::FETCH_OBJ);
    return $query;
  }

  function getServiceDetail($id){
    $query = $this->db->connect()->query("Select * From detail_services Where services_id = '$id'")->fetchAll(PDO::FETCH_OBJ);
    return $query;
  }
}
