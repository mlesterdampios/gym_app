<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Excercise_model');
    }

	public function ajax_get_user_exercises($id)
    {
          // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));
          $users = $this->User_model->ajax_get_user_exercises($id);

		  $data = array();

          foreach($users->result() as $r) {

               $data[] = array(
                     '<a href="'. site_url('ExcerciseCategories/edit/'.$r->excercise_id).'">'.$this->Excercise_model->get_Excercise_by_id($r->excercise_id)['name'].'</a>',
                    $r->date_created
    
               );
          }

          $output = array(
                 "draw" => $draw,
                 "recordsTotal" => $users->num_rows(),
                 "recordsFiltered" => $users->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
    }

	public function ajax_get_users()
    {
          // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));

          $users = $this->User_model->ajax_get_users();

		  $data = array();

          foreach($users->result() as $r) {

               $data[] = array(
                    $r->id,
                    $r->email,
                    $r->username,
                    $r->name,
                    $r->contact,
                    '<div class="btn-group">
                        <a href="'. site_url('User/edit/'.$r->id).'" class="btn btn-success btn-sm fa fa-edit"></a>
                    </div>'
               );
          }

          $output = array(
                 "draw" => $draw,
                 "recordsTotal" => $users->num_rows(),
                 "recordsFiltered" => $users->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
    }

	public function index() {
		$this->load->view('user/index');
	}
	/*
	public function profile($id = null)
	{
		$user = $this->User_model->get_user_by_id($id);

		if($user != null){
			$user_timeline_data = $this->User_model->get_user_timeline_data($id);
			$this->load->view('user_profile/content', array('id' => $id, 'user' => $user,'user_timeline_data' => $user_timeline_data));
		}else{
			$this->load->view('404');
		}
	}
	*/
	public function create() {
		$this->load->view('user/create');
	}

	public function edit($id = null) {
		$user = $this->User_model->get_user_by_id($id);
		if($user != null){
			$this->load->view('user/edit', array('user' => $user));
		}else{
			$this->load->view('404');
		}
	}

	public function set_user($id = null){
		$data = $this->input->post();

		if(isset($data['password']) && $data['password']==""){
			unset($data['password']);
		}else{
			$data['password'] = md5($data['password']);
		}

		$result = $this->User_model->set_user($id,$data);
		
		if ($result != 0) {
			if($id == null){
				redirect('User/', 'refresh');
			}else{
				redirect($_SERVER['HTTP_REFERER']);
			}
		}

		$session_data = array(
				'error' => "Please check your inputs."
				);
		$this->session->set_userdata('set_user_error_message', $session_data);
		redirect('User/', 'refresh');
	}

	public function set_user_img($id = null)
	{
		if($id != null){
			$date = new DateTime();
		    $config['upload_path'] = './public/uploads/profile/';
			$config['file_name']        = $id."-".$date->getTimestamp();
		    $config['allowed_types'] = 'gif|jpg|png';
		    $config['max_size'] = '1024';
		    $config['max_width']  = '1024';
		    $config['max_height']  = '1024';

		    $this->load->library('Upload', $config);
		    $this->upload->initialize($config);

		    if ( ! $this->upload->do_upload('profile_img'))
		    {
		        $errors = array('errors' => $this->upload->display_errors());
				$this->session->set_userdata('set_user_img_error_message', $errors);
		    }
		    else
		    {
		    	$upload_data = $this->upload->data();
				$this->User_model->set_user($id, array('profile_img' => $upload_data['file_name']));
		    }
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function delete_user($id = null)
	{
		if($id != null){
			$user = $this->User_model->delete_user($id);
			if($user != null){
				redirect('User/', 'refresh');
			}
			$session_data = array(
					'error' => "Please try again."
					);
			//$this->session->set_userdata('delete_user_error_message', $session_data);
		}
		redirect('User/', 'refresh');
	}


	public function set_user_password(){
		$current_password = $this->input->post('current_password');
		$new_password = $this->input->post('new_password');
		$conf_password = $this->input->post('conf_password');
		$user = $this->session->userdata('user');

		if(($new_password === $conf_password) && ($new_password != "" || $conf_password != "")){
			$data = array('username' => $user['username'],
				'password' => $current_password
				);
			$result = $this->User_model->login($data);
			if ($result == TRUE) {
				$this->User_model->set_user($user['id'], array('password' => md5($new_password)));
				redirect('User_auth/logout/', 'refresh');
			}
		}
		$session_data = array(
				'error' => "Please check your inputs."
				);
		$this->session->set_userdata('set_user_password_error_message', $session_data);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function set_user_profile_img()
	{
		$user = $this->session->userdata('user');
		$date = new DateTime();
	    $config['upload_path'] = './public/uploads/profile/';
		$config['file_name']        = $user['id']."-".$date->getTimestamp();
	    $config['allowed_types'] = 'gif|jpg|png';
	    $config['max_size'] = '1024';
	    $config['max_width']  = '1024';
	    $config['max_height']  = '1024';

	    $this->load->library('Upload', $config);
	    $this->upload->initialize($config);

	    if ( ! $this->upload->do_upload('profile_img'))
	    {
	        $errors = array('errors' => $this->upload->display_errors());
			$this->session->set_userdata('set_user_profile_img_error_message', $errors);
	    }
	    else
	    {
	    	$upload_data = $this->upload->data();
			$this->User_model->set_user($user['id'], array('profile_img' => $upload_data['file_name']));

			$config['image_library'] = 'gd2';
			$config['source_image'] = './public/uploads/profile/'.$upload_data['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = FALSE;
			$config['width']         = 240;
			$config['height']       = 240;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$user = $this->session->userdata('user');
			$user = $this->User_model->get_user_by_id($user['id']);
			$username = $user['username'];
			$result = $this->User_model->read_user_information($username);
			if ($result != false) {
				$session_data = $result;
				$this->session->set_userdata('user', $session_data);
				$user = $this->session->userdata('user');
				redirect($_SERVER['HTTP_REFERER']);
			}
	    }
	    redirect($_SERVER['HTTP_REFERER']);
	}
}
