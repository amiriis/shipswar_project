<?php

class testModel extends Model{
  function get(){
    echo "tessssss";
    $query = $this->db->select_rows("SELECT * FROM " . DB_PREFIX . "test");
  }
}
