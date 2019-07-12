<?php
/*
Author: Mark Lester O. Dampios
File: /application/models/LoginsModel.php
Description: This is Logins Model CRUD
*/
class LoginsModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->model('DataHelperModel');
    }

	public $array_columns = array();

	function read($user , $pass){
          $query = $this->db->get_where('tbl_users', array('username' => $user, 'password' => md5($pass), 'is_deleted' => 0));
          $data = $query->row_array();
          if($data){
                        $data['profile_img'] = base_url().'public/uploads/profile/'.$data['profile_img'];
            return $this->DataHelperModel->json_decode_object($data,$this->array_columns);
          }
      
      return "Error has occurred";
	}
  function readEmail($email){
          $query = $this->db->get_where('tbl_users', array('email' => $email));
          $data = $query->row_array();
          if($data){
                        $data['profile_img'] = base_url().'public/uploads/profile/'.$data['profile_img'];
            return $this->DataHelperModel->json_decode_object($data,$this->array_columns);
          }
      return "Error has occurred";
  }
  function readUser($user){
          $query = $this->db->get_where('tbl_users', array('username' => $user));
          $data = $query->row_array();
          if($data){
                        $data['profile_img'] = base_url().'public/uploads/profile/'.$data['profile_img'];
            return $this->DataHelperModel->json_decode_object($data,$this->array_columns);
          }
      return "Error has occurred";
  }
  function readGuardianMobile($number){
          $query = $this->db->get_where('tbl_users', array('contact' => $number));
          $data = $query->row_array();
          if($data){
            $data['profile_img'] = base_url().'public/uploads/profile/'.$data['profile_img'];
            return $this->DataHelperModel->json_decode_object($data,$this->array_columns);
          }
      return "Error has occurred";
  }
}
