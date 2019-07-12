<?php
/*
Author: Mark Lester O. Dampios
File: /application/controllers/Api.php
Description: This is the controller of all end-points of ShopN API
*/
defined('BASEPATH') OR exit('No direct script access allowed');
require (APPPATH.'/libraries/REST_Controller.php');
require APPPATH . 'libraries/Format.php';
use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller {
	public function __construct() {
        parent::__construct();
    }

    //category start
    function category_get(){
      $this->load->model('CategorysModel');
      $id = $this->uri->segment(3);
      $page = $this->input->get('page');
      if(!$id){
          if($page){
            $r = $this->CategorysModel->read(null,$page);
            if($r)
            {
                $this->response($r, 200);
            }
          }else{
            $r = $this->CategorysModel->read();
            if($r)
            {
                $this->response($r, 200);
            }
          }
        }else{
          $r = $this->CategorysModel->read($id);
      if($r){
              $this->response($r, 200);
          }
        }
        $this->response(NULL, 404);
    }
     
    function category_put(){
      $this->load->model('CategorysModel');
      $id = $this->uri->segment(3);
      if($id){
        $data = $this->input->get('data');
        if($data){
            $r = $this->CategorysModel->update($id,json_decode($data));
            if($r){
              $this->response($r, 200);
          }
        }
      }
      $this->response(NULL, 404);
    }

    function category_post(){
      $this->load->model('CategorysModel');
      if($this->input->post('data')){
          $data = $this->input->post('data');
          if($data){
        $r = $this->CategorysModel->create(json_decode($data));
        if($r){
              $this->response($r, 200);
            }
        }
      }
        $this->response(NULL, 404);
    }
     
    function category_delete(){
      $this->load->model('CategorysModel');
        $id = $this->uri->segment(3);
        if($id){
          $r = $this->CategorysModel->delete($id);
      if($r){
            $this->response($r, 200);
          }
      }
      $this->response(NULL, 404);
    }

    function categoryedit_post(){
      $this->load->model('CategorysModel');
      $id = $this->uri->segment(3);
      if($id){
        $data = $this->input->post('data');
        if($data){
            $r = $this->CategorysModel->update($id,json_decode($data));
            if($r){
              $this->response($r, 200);
          }
        }
      }
      $this->response(NULL, 404);
    }

    function categorys_post(){
      $this->load->model('CategorysModel');
      if($this->input->post('data')){
          $data = $this->input->post('data');
          if($data){
        $r = $this->CategorysModel->batch(json_decode($data));
        if($r){
              $this->response($r, 200);
            }
        }
      }
        $this->response(NULL, 404);
    }
    //category end

    //exercise start
    function exercise_get(){
      $this->load->model('ExercisesModel');
      $id = $this->uri->segment(3);
      $page = $this->input->get('page');
      $cat = $this->input->get('cat');
      if(!$id){
          if($page){
            $r = $this->ExercisesModel->read(null,$page,$cat);
            if($r)
            {
                $this->response($r, 200);
            }
          }else{
            $r = $this->ExercisesModel->read(null,null,$cat);
            if($r)
            {
                $this->response($r, 200);
            }
          }
        }else{
          $r = $this->ExercisesModel->read($id);
      if($r){
              $this->response($r, 200);
          }
        }
        $this->response(NULL, 404);
    }
     
    function exercise_put(){
      $this->load->model('ExercisesModel');
      $id = $this->uri->segment(3);
      if($id){
        $data = $this->input->get('data');
        if($data){
            $r = $this->ExercisesModel->update($id,json_decode($data));
            if($r){
              $this->response($r, 200);
          }
        }
      }
      $this->response(NULL, 404);
    }

    function exercise_post(){
      $this->load->model('ExercisesModel');
      if($this->input->post('data')){
          $data = $this->input->post('data');
          if($data){
        $r = $this->ExercisesModel->create(json_decode($data));
        if($r){
              $this->response($r, 200);
            }
        }
      }
        $this->response(NULL, 404);
    }
     
    function exercise_delete(){
      $this->load->model('ExercisesModel');
        $id = $this->uri->segment(3);
        if($id){
          $r = $this->ExercisesModel->delete($id);
      if($r){
            $this->response($r, 200);
          }
      }
      $this->response(NULL, 404);
    }

    function exerciseedit_post(){
      $this->load->model('ExercisesModel');
      $id = $this->uri->segment(3);
      if($id){
        $data = $this->input->post('data');
        if($data){
            $r = $this->ExercisesModel->update($id,json_decode($data));
            if($r){
              $this->response($r, 200);
          }
        }
      }
      $this->response(NULL, 404);
    }

    function exercises_post(){
      $this->load->model('ExercisesModel');
      if($this->input->post('data')){
          $data = $this->input->post('data');
          if($data){
        $r = $this->ExercisesModel->batch(json_decode($data));
        if($r){
              $this->response($r, 200);
            }
        }
      }
        $this->response(NULL, 404);
    }
    //exercise end
    //weekexercise start
    function weekexercise_get(){
      $this->load->model('WeekcategorysModel');
      $id = $this->uri->segment(3);

      if($id){
          $r = $this->WeekcategorysModel->readData($id);
          if($r){
              $this->response($r, 200);
            }
          }
        $this->response(NULL, 404);
    }
     
    function weekexercise_put(){
      $this->load->model('WeekcategorysModel');
      $id = $this->uri->segment(3);
      if($id){
        $data = $this->input->get('data');
        if($data){
            $r = $this->WeekcategorysModel->update($id,json_decode($data));
            if($r){
              $this->response($r, 200);
          }
        }
      }
      $this->response(NULL, 404);
    }

    function weekexercise_post(){
      $this->load->model('WeekcategorysModel');
      if($this->input->post('data')){
          $data = $this->input->post('data');
          if($data){
        $r = $this->WeekcategorysModel->create(json_decode($data));
        if($r){
              $this->response($r, 200);
            }
        }
      }
        $this->response(NULL, 404);
    }
     
    function weekexercise_delete(){
      $this->load->model('WeekcategorysModel');
        $id = $this->uri->segment(3);
        if($id){
          $r = $this->WeekcategorysModel->delete($id);
      if($r){
            $this->response($r, 200);
          }
      }
      $this->response(NULL, 404);
    }

    function weekexerciseedit_post(){
      $this->load->model('WeekcategorysModel');
      $id = $this->uri->segment(3);
      if($id){
        $data = $this->input->post('data');
        if($data){
            $r = $this->WeekcategorysModel->update($id,json_decode($data));
            if($r){
              $this->response($r, 200);
          }
        }
      }
      $this->response(NULL, 404);
    }

    function weekexercises_post(){
      $this->load->model('WeekcategorysModel');
      if($this->input->post('data')){
          $data = $this->input->post('data');
          if($data){
        $r = $this->WeekcategorysModel->batch(json_decode($data));
        if($r){
              $this->response($r, 200);
            }
        }
      }
        $this->response(NULL, 404);
    }
    //weekexercise end
    //user start
    function user_get(){
      $this->load->model('UsersModel');
      $id = $this->uri->segment(3);
      $page = $this->input->get('page');
      if(!$id){
          if($page){
            $r = $this->UsersModel->read(null,$page);
            if($r)
            {
                $this->response($r, 200);
            }
          }else{
            $r = $this->UsersModel->read();
            if($r)
            {
                $this->response($r, 200);
            }
          }
        }else{
          $r = $this->UsersModel->read($id);
      if($r){
              $this->response($r, 200);
          }
        }
        $this->response(NULL, 404);
    }
     
    function user_put(){
      $this->load->model('UsersModel');
      $id = $this->uri->segment(3);
      if($id){
        $data = $this->input->get('data');
        if($data){
            $r = $this->UsersModel->update($id,json_decode($data));
            if($r){
              $this->response($r, 200);
          }
        }
      }
      $this->response(NULL, 404);
    }

    function user_post(){
      $this->load->model('UsersModel');
      if($this->input->post('data')){
          $data = $this->input->post('data');
          if($data){
        $r = $this->UsersModel->create(json_decode($data));
        if($r){
              $this->response($r, 200);
            }
        }
      }
        $this->response(NULL, 404);
    }
     
    function user_delete(){
      $this->load->model('UsersModel');
        $id = $this->uri->segment(3);
        if($id){
          $r = $this->UsersModel->delete($id);
      if($r){
            $this->response($r, 200);
          }
      }
      $this->response(NULL, 404);
    }

    function users_post(){
      $this->load->model('UsersModel');
      if($this->input->post('data')){
          $data = $this->input->post('data');
          if($data){
        $r = $this->UsersModel->batch(json_decode($data));
        if($r){
              $this->response($r, 200);
            }
        }
      }
        $this->response(NULL, 404);
    }
    function useredit_post(){
      $this->load->model('UsersModel');
      $id = $this->uri->segment(3);
      if($id){
        $data = $this->input->post('data');
        if($data){
            $r = $this->UsersModel->update($id,json_decode($data));
            if($r){
              $this->response($r, 200);
          }
        }
      }
      $this->response(NULL, 404);
    }
    //user end
    //login start
    function login_get(){
    $this->load->model('LoginsModel');
    $user = $this->uri->segment(3);
    $password = $this->uri->segment(4);
      if($user && $password){
          $r = $this->LoginsModel->read($user,$password);
          if($r){
              $this->response($r, 200);
          }
      }
      $this->response(NULL, 404);
    }
    //login end
    //useremail start
    function useremail_get(){
    $this->load->model('LoginsModel');
    $email = $this->uri->segment(3);
      if($email){
          $r = $this->LoginsModel->readEmail($email);
          if($r){
              $this->response($r, 200);
          }
      }
      $this->response(NULL, 404);
    }
    //useremail end
    //username start
    function username_get(){
    $this->load->model('LoginsModel');
    $user = $this->uri->segment(3);
      if($user){
          $r = $this->LoginsModel->readUser($user);
          if($r){
              $this->response($r, 200);
          }
      }
      $this->response(NULL, 404);
    }
    //username end
    //weekcategory start
    function weekcategory_get(){
      $this->load->model('WeekcategorysModel');
      $id = $this->uri->segment(3);
      $page = $this->input->get('page');
      if(!$id){
          if($page){
            $r = $this->WeekcategorysModel->returnWeek(null,$page);
            if($r)
            {
                $this->response($r, 200);
            }
          }else{
            $r = $this->WeekcategorysModel->returnWeek();
            if($r)
            {
                $this->response($r, 200);
            }
          }
        }else{
          $r = $this->WeekcategorysModel->returnWeek($id);
      if($r){
              $this->response($r, 200);
          }
        }
        $this->response(NULL, 404);
    }
     
    function weekcategory_put(){
      $this->load->model('WeekcategorysModel');
      $id = $this->uri->segment(3);
      if($id){
        $data = $this->input->get('data');
        if($data){
            $r = $this->WeekcategorysModel->update($id,json_decode($data));
            if($r){
              $this->response($r, 200);
          }
        }
      }
      $this->response(NULL, 404);
    }

    function weekcategory_post(){
      $this->load->model('WeekcategorysModel');
      if($this->input->post('data')){
          $data = $this->input->post('data');
          if($data){
        $r = $this->WeekcategorysModel->create(json_decode($data));
        if($r){
              $this->response($r, 200);
            }
        }
      }
        $this->response(NULL, 404);
    }
     
    function weekcategory_delete(){
      $this->load->model('WeekcategorysModel');
        $id = $this->uri->segment(3);
        if($id){
          $r = $this->WeekcategorysModel->delete($id);
      if($r){
            $this->response($r, 200);
          }
      }
      $this->response(NULL, 404);
    }

    function weekcategoryedit_post(){
      $this->load->model('WeekcategorysModel');
      $id = $this->uri->segment(3);
      if($id){
        $data = $this->input->post('data');
        if($data){
            $r = $this->WeekcategorysModel->update($id,json_decode($data));
            if($r){
              $this->response($r, 200);
          }
        }
      }
      $this->response(NULL, 404);
    }

    function weekcategorys_post(){
      $this->load->model('WeekcategorysModel');
      if($this->input->post('data')){
          $data = $this->input->post('data');
          if($data){
        $r = $this->WeekcategorysModel->batch(json_decode($data));
        if($r){
              $this->response($r, 200);
            }
        }
      }
        $this->response(NULL, 404);
    }
    //weekcategory end
    function isUserHaveExercised_get(){
      $this->load->model('WeekcategorysModel');
      $user_id = $this->uri->segment(3);
      $exercise_id = $this->uri->segment(4);
          $r = $this->WeekcategorysModel->isUserHaveExercised_get($user_id,$exercise_id);
          if($r){
              $this->response($r, 200);
          }
        $this->response(NULL, 404);
    }

    function UserHaveExercised_post(){
      $this->load->model('WeekcategorysModel');
      if($this->input->post('data')){
          $data = $this->input->post('data');
          if($data){
        $r = $this->WeekcategorysModel->UserHaveExercised(json_decode($data));
        if($r){
              $this->response($r, 200);
            }
        }
      }
        $this->response(NULL, 404);
    }
}
?>