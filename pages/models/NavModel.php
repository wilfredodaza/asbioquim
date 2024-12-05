<?php
class NavModel extends Model
{
  function __construct(){
    parent::__construct();
  }

  public function getTable($table){
    $query = $this->db->connect()->query("Select * From $table")->fetchAll(PDO::FETCH_OBJ);
    return $query;
  }
}
