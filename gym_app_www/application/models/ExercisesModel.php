<?php
/*
Author: Mark Lester O. Dampios
File: /application/models/ExercisesModel.php
Description: This is Exercises Model CRUD
*/
class ExercisesModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->model('DataHelperModel');
        $this->load->model('Excercise_model');
    }

	public $array_columns = array();

  function create($data){
      if(isset($data)){
        $data = $this->DataHelperModel->json_encode_object($data,$this->array_columns);
         if($this->db->insert('tbl_excercises',$data)){
          return $this->read($this->db->insert_id());
         }
      }
      return "Error has occured";
    }

	function read($id = NULL, $page = NULL, $cat = null){
        if ($id === NULL){
            //if($page){
            //  $this->db->limit(10,(10*$page)-10);
            //}
            if($cat){
              $this->db->where('excercise_category_id',$cat);
            }
            $query = $this->db->get_where('tbl_excercises', array('is_deleted' => 0));
            $data = $query->result_array();
            if($data){
              for($i = 0; $i < count($data); $i++){
                $data[$i]['profile_img'] = base_url().'public/uploads/exercises/'.$data[$i]['profile_img'];
              }
              return $this->DataHelperModel->json_decode_array($data,$this->array_columns);
            }

        }else{
          if($cat){
              $this->db->where('excercise_category_id',$cat);
          }
          $query = $this->db->get_where('tbl_excercises', array('id' => $id, 'is_deleted' => 0));
          $data = $query->row_array();
          if($data){
                $data['profile_img'] = base_url().'public/uploads/exercises/'.$data['profile_img'];
            return $this->DataHelperModel->json_decode_object($data,$this->array_columns);
          }
      }
      return "Error has occurred";
	}

	function update($id,$data){
      if(isset($data)){
        $data = $this->DataHelperModel->json_encode_object($data,$this->array_columns);
       $result = $this->db->update('tbl_excercises',$data,array('id' => $id));
       if($result){
           return $this->read($id);
       }
      }
      return "Error has occurred";
    }

    function delete($id){
    	$temp = $this->read($id);
       $result = $this->db->query("delete from `tbl_excercises` where id = $id");
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
