<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExcerciseCategories extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Excercise_model');
        $this->load->model('ExcerciseCategories_model');
    }

	public function ajax_get_ExcerciseCategories()
    {
          // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));

          $ExcerciseCategories = $this->ExcerciseCategories_model->ajax_get_ExcerciseCategories();

		  $data = array();

          foreach($ExcerciseCategories->result() as $r) {

               $data[] = array(
                    $r->id,
                    $r->name,
                    $r->description,
                    count($this->Excercise_model->get_Excercise_by_category_id($r->id)),
                    '<div class="btn-group">
                        <a href="'. site_url('ExcerciseCategories/edit/'.$r->id).'" class="btn btn-success btn-sm fa fa-edit"></a>
                    </div>'
               );
          }

          $output = array(
                 "draw" => $draw,
                 "recordsTotal" => $ExcerciseCategories->num_rows(),
                 "recordsFiltered" => $ExcerciseCategories->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
    }

	public function index() {
		$this->load->view('ExcerciseCategories/index');
	}

	public function create() {
		$this->load->view('ExcerciseCategories/create');
	}

	public function edit($id = null) {
		$ExcerciseCategories = $this->ExcerciseCategories_model->get_ExcerciseCategories_by_id($id);
		if($ExcerciseCategories != null){
			$this->load->view('ExcerciseCategories/edit', array('ExcerciseCategories' => $ExcerciseCategories));
		}else{
			$this->load->view('404');
		}
	}

	public function set_ExcerciseCategories($id = null){
		$data = $this->input->post();

		$result = $this->ExcerciseCategories_model->set_ExcerciseCategories($id,$data);
		
		if ($result != 0) {
			if($id == null){
				redirect('ExcerciseCategories/', 'refresh');
			}else{
				redirect($_SERVER['HTTP_REFERER']);
			}
		}

		$session_data = array(
				'error' => "Please check your inputs."
				);
		$this->session->set_userdata('set_ExcerciseCategories_error_message', $session_data);
		redirect('ExcerciseCategories/', 'refresh');
	}

	public function set_ExcerciseCategories_img($id = null)
	{
		if($id != null){
			$date = new DateTime();
		    $config['upload_path'] = './public/uploads/excercisecategories/';
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
				$this->session->set_userdata('set_ExcerciseCategories_img_error_message', $errors);
		    }
		    else
		    {
		    	$upload_data = $this->upload->data();
				$this->ExcerciseCategories_model->set_ExcerciseCategories($id, array('profile_img' => $upload_data['file_name']));
		    }
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function delete_ExcerciseCategories($id = null)
	{
		if($id != null){
			$ExcerciseCategories = $this->ExcerciseCategories_model->delete_ExcerciseCategories($id);
			if($ExcerciseCategories != null){
				redirect('ExcerciseCategories/', 'refresh');
			}
			$session_data = array(
					'error' => "Please try again."
					);
			//$this->session->set_userdata('delete_ExcerciseCategories_error_message', $session_data);
		}
		redirect('ExcerciseCategories/', 'refresh');
	}


}
