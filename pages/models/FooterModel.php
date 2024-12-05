<?php
class FooterModel extends Model
{
  function __construct(){
    parent::__construct();
  }

  public function getContact(){
    $items = [];
    $query = $this->db->connect()->query("Select * From contacto")->fetchAll(PDO::FETCH_OBJ);
    return $query[0];
  }

  public function getRedes(){
    $items = [];
    $query = $this->db->connect()->query("Select * From redes")->fetchAll(PDO::FETCH_OBJ);
    return $query;
  }
}
