<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excercise extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Excercise_model');
        $this->load->model('ExcerciseCategories_model');
    }

	public function ajax_get_Excercises()
    {
          // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));

          $Excercises = $this->Excercise_model->ajax_get_Excercises();

		  $data = array();

          foreach($Excercises->result() as $r) {

               $data[] = array(
                    $r->id,
                    '<a href="'.site_url().'ExcerciseCategories/edit/'.$r->excercise_category_id.'">'.$this->ExcerciseCategories_model->get_ExcerciseCategories_by_id($r->excercise_category_id)['name'].'</a>',
                    $r->name,
                    $r->time_length,
                    '<div class="btn-group">
                        <a href="'. site_url('Excercise/edit/'.$r->id).'" class="btn btn-success btn-sm fa fa-edit"></a>
                    </div>'
               );
          }

          $output = array(
                 "draw" => $draw,
                 "recordsTotal" => $Excercises->num_rows(),
                 "recordsFiltered" => $Excercises->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
    }

	public function index() {
		$this->load->view('Excercise/index');
	}
	
	public function create() {
		$ExerciseCategories = $this->ExcerciseCategories_model->get_ExcerciseCategories();
		$this->load->view('Excercise/create', array('ExerciseCategories' => $ExerciseCategories));
	}

	public function edit($id = null) {
		$Excercise = $this->Excercise_model->get_Excercise_by_id($id);
		$ExerciseCategories = $this->ExcerciseCategories_model->get_ExcerciseCategories();
		if($Excercise != null){
			$this->load->view('Excercise/edit', array('Excercise' => $Excercise, 'ExerciseCategories' => $ExerciseCategories));
		}else{
			$this->load->view('404');
		}
	}

	public function set_Excercise($id = null){
		$data = $this->input->post();

		$result = $this->Excercise_model->set_Excercise($id,$data);
		
		if ($result != 0) {
			if($id == null){
				redirect('Excercise/', 'refresh');
			}else{
				redirect($_SERVER['HTTP_REFERER']);
			}
		}

		$session_data = array(
				'error' => "Please check your inputs."
				);
		$this->session->set_userdata('set_Excercise_error_message', $session_data);
		redirect('Excercise/', 'refresh');
	}

	public function set_Excercise_img($id = null)
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
				$this->session->set_userdata('set_Excercise_img_error_message', $errors);
		    }
		    else
		    {
		    	$upload_data = $this->upload->data();
				$this->Excercise_model->set_Excercise($id, array('profile_img' => $upload_data['file_name']));
		    }
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function delete_Excercise($id = null)
	{
		if($id != null){
			$Excercise = $this->Excercise_model->delete_Excercise($id);
			if($Excercise != null){
				redirect('Excercise/', 'refresh');
			}
			$session_data = array(
					'error' => "Please try again."
					);
			//$this->session->set_userdata('delete_Excercise_error_message', $session_data);
		}
		redirect('Excercise/', 'refresh');
	}
}
