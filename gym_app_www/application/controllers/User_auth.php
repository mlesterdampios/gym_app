<?php

Class User_auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index() {
		$this->form_validation->set_message('trim', "%s cannot contain spaces");
		$this->form_validation->set_message('required', "%s cannot be empty");

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['user'])){
				$user = $this->session->userdata('user');
				redirect('ExcerciseWeek/', 'refresh');
			}else{
				$this->load->view('login');
			}
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
				);
			$result = $this->User_model->login($data);
			if ($result == TRUE) {

				$username = $this->input->post('username');
				$result = $this->User_model->read_user_information($username);
				if ($result != false) {
					$session_data = $result;
					$this->session->set_userdata('user', $session_data);
					$user = $this->session->userdata('user');
					redirect('ExcerciseWeek/');
				}
			} else {
				$data = array(
					'error_message' => 'Invalid Username or Password'
					);
				$this->load->view('login', $data);
			}
		}
	}

	public function logout() {
		$sess_array = array();
		$this->session->unset_userdata('user');
		redirect('User_auth/', 'refresh');
	}

}

?>