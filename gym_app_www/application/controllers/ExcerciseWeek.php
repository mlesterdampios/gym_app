<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExcerciseWeek extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Excercise_model');
        $this->load->model('ExcerciseCategories_model');
        $this->load->model('ExcerciseWeek_model');
    }

	public function index() {
		$this->load->view('ExcerciseWeek/index');
	}
	
	public function create($id) {
		$Excercises = $this->Excercise_model->get_Excercises();
		$this->load->view('ExcerciseWeek/create', array('Excercises' => $Excercises, 'day' => $id));
	}

	public function edit($id = null) {
		$ExcerciseWeek = $this->ExcerciseWeek_model->get_ExcerciseWeek_by_id($id);
		$ExerciseCategories = $this->ExcerciseWeekCategories_model->get_ExcerciseWeekCategories();
		if($ExcerciseWeek != null){
			$this->load->view('ExcerciseWeek/edit', array('ExcerciseWeek' => $ExcerciseWeek, 'ExerciseCategories' => $ExerciseCategories));
		}else{
			$this->load->view('404');
		}
	}

	public function set_ExcerciseWeek($id = null){
		$data = $this->input->post();
		$data['day'] = $id;

		$result = $this->ExcerciseWeek_model->set_ExcerciseWeek(null,$data);
		
		if ($result != 0) {
			if($id == null){
				redirect('ExcerciseWeek/', 'refresh');
			}else{
				redirect($_SERVER['HTTP_REFERER']);
			}
		}

		$session_data = array(
				'error' => "Please check your inputs."
				);
		$this->session->set_userdata('set_ExcerciseWeek_error_message', $session_data);
		redirect('ExcerciseWeek/', 'refresh');
	}

	public function set_ExcerciseWeek_img($id = null)
	{
		if($id != null){
			$date = new DateTime();
		    $config['upload_path'] = './public/uploads/exercises/';
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
				$this->session->set_userdata('set_ExcerciseWeek_img_error_message', $errors);
		    }
		    else
		    {
		    	$upload_data = $this->upload->data();
				$this->ExcerciseWeek_model->set_ExcerciseWeek($id, array('profile_img' => $upload_data['file_name']));
		    }
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function delete_ExcerciseWeek($id = null)
	{
		if($id != null){
			$ExcerciseWeek = $this->ExcerciseWeek_model->delete_ExcerciseWeek($id);
			if($ExcerciseWeek != null){
				redirect('ExcerciseWeek/', 'refresh');
			}
			$session_data = array(
					'error' => "Please try again."
					);
			//$this->session->set_userdata('delete_ExcerciseWeek_error_message', $session_data);
		}
		redirect('ExcerciseWeek/', 'refresh');
	}
}
