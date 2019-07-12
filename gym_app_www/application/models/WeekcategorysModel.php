<?php
/*
Author: Mark Lester O. Dampios
File: /application/models/WeekcategorysModel.php
Description: This is Categorys Model CRUD
*/
class WeekcategorysModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->model('DataHelperModel');
        $this->load->model('Excercise_model');
        $this->load->model('ExcerciseWeek_model');
    }

	public $array_columns = array();

  function returnWeek($id = NULL, $page = NULL){
    $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    $data = array();
    for($i = 1; $i <= 7; $i++){
      //$data[$i]['id'] = $i;
      //$data[$i]['name'] = $days[$i-1];
      //$data[$i]['exerciseCount'] = count($this->ExcerciseWeek_model->get_ExcerciseWeek_by_day($i));

      //$data[$i] = array('id' => $i, 'name' => $days[$i-1], 'exerciseCount' => count($this->ExcerciseWeek_model->get_ExcerciseWeek_by_day($i)));
      array_push($data, array('id' => $i, 'name' => $days[$i-1], 'exerciseCount' => count($this->ExcerciseWeek_model->get_ExcerciseWeek_by_day($i))));
    }
    //var_dump($data); die();

    return $this->DataHelperModel->json_decode_array($data,$this->array_columns);
    //return $data = array($data);
  }

    function UserHaveExercised($data){
      if(isset($data)){
        $data = $this->DataHelperModel->json_encode_object($data,$this->array_columns);
         if($this->db->insert('tbl_exercise_user_logs',$data)){
          return $this->read($this->db->insert_id());
         }
      }
    }

  function create($data){
      if(isset($data)){
        $data = $this->DataHelperModel->json_encode_object($data,$this->array_columns);
         if($this->db->insert('tbl_excercise_categories',$data)){
          return $this->read($this->db->insert_id());
         }
      }
      
    }

  function readData($id = NULL){

          $query = $this->db->get_where('tbl_exercise_week', array('is_deleted' => 0, 'day' => $id));
          $data = $query->result_array();
          $dataX = array();
          if($data){
            foreach($data as $datum){
              $data1 = $this->Excercise_model->get_Excercise_by_id($datum['id']);
              if($data1){
                $data1['profile_img'] = base_url().'public/uploads/exercises/'.$data1['profile_img'];
                array_push($dataX, $data1);
              }
            }
          }
          //var_dump($dataX); die();
          if(count($dataX)>0){
            return $this->DataHelperModel->json_decode_object($dataX,$this->array_columns);
          }else{
            return "Error has occurred";
          }
  }

  function isUserHaveExercised_get($user_id = NULL, $excercise_id = NULL){
          $this->db->where('DATE(NOW()) = DATE(date_created)');
          $query = $this->db->get_where('tbl_exercise_user_logs', array('user_id' => $user_id, 'excercise_id' => $excercise_id));
          $data = $query->row_array();
          if($data){
            return $this->DataHelperModel->json_decode_object($data,$this->array_columns);
          }else{
            return "Error has occurred";
          }
  }

	function read($id = NULL, $page = NULL){
        if ($id === NULL){

            $query = $this->db->get_where('tbl_excercise_categories', array('is_deleted' => 0));
            $data = $query->result_array();
            if($data){

              var_dump($data); die();
              return $data;
              return $this->DataHelperModel->json_decode_array($data,$this->array_columns);
            }

        }else{
          $query = $this->db->get_where('tbl_excercise_categories', array('id' => $id, 'is_deleted' => 0));
          $data = $query->row_array();
          if($data){

            return $this->DataHelperModel->json_decode_object($data,$this->array_columns);
          }
      }
      return "Error has occurred";
	}

	function update($id,$data){
      if(isset($data)){
        $data = $this->DataHelperModel->json_encode_object($data,$this->array_columns);
       $result = $this->db->update('tbl_excercise_categories',$data,array('id' => $id));
       if($result){
           return $this->read($id);
       }
      }
      return "Error has occurred";
    }

    function delete($id){
    	$temp = $this->read($id);
       $result = $this->db->query("delete from `tbl_excercise_categories` where id = $id");
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
