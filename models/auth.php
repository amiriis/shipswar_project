<?php

class ModelAuth extends Model{

  function signIn($username , $password){
    $hash_password = Hash::create(ALGO_PASSWORD, $password, KEY_PASSWORD);
    $sql = "SELECT u.user_id, u.role_id FROM " . DB_PREFIX . "users u WHERE u.username='" . $username . "' AND u.password='" . $hash_password . "' AND u.status='1'";

    return $this->db->select_row($sql);
  }

  function signUp($username , $password, $name, $email){
    $array = array();
    $timeNow = date('Y-m-d H:i:s');
    $hash_password = Hash::create(ALGO_PASSWORD, $password, KEY_PASSWORD);

    $array = array(
      'role_id'       => 1,
      'username'      => $username,
      'password'      => $hash_password,
      'email'         => $email,
      'date_created'  => $timeNow,
      'date_modified' => $timeNow,
      'status'        => 1
    );

    $user_id = $this->db->insertid(DB_PREFIX . "users", $array);

    $array = array();

    $array = array(
      'user_id'       => $user_id,
      'language_id'   => 1,
      'name'          => $name,
      'date_created'  => $timeNow,
      'date_modified' => $timeNow
    );

    $this->db->insert(DB_PREFIX . "users_description", $array);

    return TRUE;
  }

  function getInfo($user_id){
    $sql = "SELECT ud.name FROM " . DB_PREFIX . "users_description ud WHERE ud.user_id='" . $user_id . "'";

    return $this->db->select_row($sql);
  }

}
