<?php
//birds_model.php (Array of Strings)
class Birds_model extends CI_Model{
  function get_bird($q){
    $this->db->select('interest_into');
    $this->db->like('interest_into', $q);
    $query = $this->db->get('interest_into');
    if($query->num_rows() > 0){
      foreach ($query->result_array() as $row){
        $row_set[] = htmlentities(stripslashes($row['interest_into'])); //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }




  function get_bird2($q){
    $this->db->select('user_edu');
    $this->db->like('user_edu', $q);
    $query = $this->db->get('user_edu');
    if($query->num_rows() > 0){
      foreach ($query->result_array() as $row){
        $row_set[] = htmlentities(stripslashes($row['user_edu'])); //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }


}