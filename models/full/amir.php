<?php

class ModelFullAmir extends Model{
  function get(){
    $query = $this->db->select_rows("SELECT * FROM " . DB_PREFIX . "test");

    return $query;
  }
}
