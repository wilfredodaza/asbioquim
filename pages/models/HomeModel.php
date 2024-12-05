<?php
class HomeModel extends Model
{
  function __construct(){
    parent::__construct();
  }

  public function getBanner(){
    $query = $this->db->connect()->query("Select * From banner")->fetchAll(PDO::FETCH_OBJ);
    return $query;
  }

  public function getServices(){
    $query = $this->db->connect()->query("Select * From services")->fetchAll(PDO::FETCH_OBJ);
    return $query;
  }

  public function getAccreditations(){
    $query = $this->db->connect()->query("Select * From accreditations")->fetchAll(PDO::FETCH_OBJ);
    return $query;
  }
}
