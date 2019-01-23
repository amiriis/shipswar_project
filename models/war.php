<?php

class ModelWar extends Model{
  function getUsers($user_id){
    $sql = "SELECT * FROM " . DB_PREFIX . "users u LEFT JOIN " . DB_PREFIX . "users_description ud ON (u.user_id = ud.user_id) WHERE role_id='1' AND u.status='1' AND u.user_id!='" . $user_id . "'";

    return $this->db->select_rows($sql);
  }

  function getUserById($user_id){
    $sql = "SELECT u.user_id FROM " . DB_PREFIX . "users u WHERE role_id='1' AND u.status='1' AND u.user_id='" . $user_id . "'";
     if($this->db->select_row($sql)){
       return TRUE;
     }
    return FALSE;
  }

  function getRequest($requested_id, $requester_id){
    $sql = "SELECT * FROM " . DB_PREFIX . "war_request_fight WHERE requester_id='" . $requester_id . "' AND requested_id='" . $requested_id . "'";

    return $this->db->select_row($sql);
  }

  function setRequestFight($requested_id, $requester_id){
    $array = array();
    $timeNow = date('Y-m-d H:i:s');

    $array = array(
      'requester_id'   => $requester_id,
      'requested_id'   => $requested_id,
      'date_request'   => $timeNow,
    );

    return $this->db->insert(DB_PREFIX . "war_request_fight", $array);
  }

  function cancelRequestFight($requested_id, $requester_id){
    $array = array();
    $timeNow = date('Y-m-d H:i:s');

    $array = array(
      'canceler_id'    => Auth::id(),
      'date_cancel'   => $timeNow,
      'status'         => 0,
    );

    $where = "requester_id='" . $requester_id . "' AND requested_id='" . $requested_id . "'";

    return $this->db->update(DB_PREFIX . "war_request_fight", $array, $where);
  }
}
