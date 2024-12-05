<?php
class About_usModel extends Model
{
  function __construct(){
    parent::__construct();
  }

  public function getAbout(){
    $query = $this->db->connect()->query("Select * From about_us")->fetchAll(PDO::FETCH_OBJ);
    return $query[0];
  }

  public function getAboutDetail(){
    $query = $this->db->connect()->query("Select * From detail_about_us")->fetchAll(PDO::FETCH_OBJ);
    return $query;
  }
}
