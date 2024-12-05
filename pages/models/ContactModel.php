<?php
class ContactModel extends Model
{
  function __construct(){
    parent::__construct();
  }

  public function getContact(){
    $query = $this->db->connect()->query("Select * From contacto")->fetchAll(PDO::FETCH_OBJ);
    return $query[0];
  }
}
