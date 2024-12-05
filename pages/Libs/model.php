<?php

class Model
{
  function __construct(){
    $this->db = new DatabasePage();
  }

  function query($query){
    return $this->db->connnect()->query($query);
  }

  function prepare($query){
    return $this->db->connect()->prepare($query);
  }
}
