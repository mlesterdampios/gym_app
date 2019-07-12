<?php
/*
Author: Mark Lester O. Dampios
File: /application/models/UsersModel.php
Description: This is Users Model CRUD
*/
class UsersModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->model('DataHelperModel');
    }

	public $array_columns = array();

  function create($data){
      if(isset($data)){
        $data = $this->DataHelperModel->json_encode_object($data,$this->array_columns);
         $data->{"password"} = md5($data->{"password"});
         if($this->db->insert('tbl_users',$data)){
          return $this->read($this->db->insert_id());
         }
      }
      return "Error has occured";
    }

	function read($id = NULL, $page = NULL){
        if ($id === NULL){
            //if($page){
            //  $this->db->limit(10,(10*$page)-10);
            //}
            $query = $this->db->get('tbl_users');
            $data = $query->result_array();
            if($data){
              for($i = 0; $i < count($data); $i++){
                $data[$i]['profile_img'] = base_url().'public/uploads/profile/'.$data[$i]['profile_img'];
              }
              return $this->DataHelperModel->json_decode_array($data,$this->array_columns);
            }

        }else{
          $query = $this->db->get_where('tbl_users', array('id' => $id));
          $data = $query->row_array();
          if($data){
            $data['profile_img'] = base_url().'public/uploads/profile/'.$data['profile_img'];
            return $this->DataHelperModel->json_decode_object($data,$this->array_columns);
          }
      }
      return "Error has occurred";
	}

	function update($id,$data){
      if(isset($data)){
        $data = $this->DataHelperModel->json_encode_object($data,$this->array_columns);
        $data->{"password"} = md5($data->{"password"});
       $result = $this->db->update('tbl_users',$data,array('id' => $id));
       if($result){
           return $this->read($id);
       }
      }
      return "Error has occurred";
    }

    function delete($id){
    	$temp = $this->read($id);
       $result = $this->db->query("delete from `tbl_users` where id = $id");
       if($result){
           return $temp;
       }
       return "Error has occurred";
    }

    function batch($data){
      $response["create"] = array();
      if(isset($data->{'create'})){
        for($i = 0; $i < count($data->{'create'}); $i++){
          $temp = $data->{'create'}[$i];
          array_push($response["create"],$this->create($temp));
        }
      }
      $response["update"] = array();
      if(isset($data->{'update'})){
        for($i = 0; $i < count($data->{'update'}); $i++){
          $temp = $data->{'update'}[$i];
          array_push($response["update"],$this->update($temp->{'id'},$temp));
        }
      }
      $response["delete"] = array();
      if(isset($data->{'delete'})){
        for($i = 0; $i < count($data->{'delete'}); $i++){
          $temp = $this->DataHelperModel->json_encode_object($data->{'delete'}[$i],$this->array_columns);
          array_push($response["delete"],$this->delete($temp->{'id'}));
        }
      }
      return $response;
    }
}
