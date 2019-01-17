<?php

class Database extends PDO {


    function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) {
      global $db;
      $pdo = parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }

    public function select_row($SQL) {
      $query = $this->prepare($SQL);

      $fetch_style = PDO::FETCH_ASSOC;

      $query->execute();

      return $query->fetch($fetch_style);
    }

    public function select_rows($SQL) {
      $query = $this->prepare($SQL);
      $fetch_style = PDO::FETCH_ASSOC;

      $query->execute();

      return $query->fetchAll($fetch_style);

    }

    public function insert($table, $data) {
      ksort($data);
      $fieldkey = implode(', ', array_keys($data));
      $fieldvalue = ':' . implode(', :', array_keys($data));

      $query = $this->prepare("INSERT INTO $table ($fieldkey) VALUES ($fieldvalue)");

      foreach ($data as $key => $value) {

          $query->bindvalue(":$key", $value);
      }

      return $query->execute();
    }

    public function insertid($table, $data) {
      ksort($data);
      $fieldkey = implode(', ', array_keys($data));
      $fieldvalue = ':' . implode(', :', array_keys($data));
      $query = $this->prepare("INSERT INTO $table ($fieldkey) VALUES ($fieldvalue)");

      foreach ($data as $key => $value) {

          $query->bindvalue(":$key", $value);
      }

      $query->execute();
      $id = $this->lastInsertId();
      return $id;
    }

    public function update($table, $data, $where) {
      ksort($data);
      $fieldDetails = "";
      foreach ($data as $key => $value) {
          $fieldDetails.=" `$key`=:$key ,";
      }
      $fieldDetails = rtrim($fieldDetails, ' ,');



      $query = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

      foreach ($data as $key => $value) {

          $query->bindvalue(":$key", $value);
      }

      return $query->execute();
    }

    public function delete($table, $where) {

      $query = $this->prepare("DELETE FROM $table WHERE $where");
      return $query->execute();
    }

}
