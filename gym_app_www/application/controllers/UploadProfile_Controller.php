<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UploadProfile_Controller extends CI_Controller {
public function __construct() {
parent::__construct();
}
public function upload(){
$this->load->view('upload', array('error' => ' ' ));
}
public function do_upload(){
$config = array(
'upload_path' => "./public/uploads/profile",
'allowed_types' => "gif|jpg|png|jpeg|pdf",
'overwrite' => TRUE,
'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
);

$this->load->library('upload', $config);
if($this->upload->do_upload())
{
$data = array('upload_data' => $this->upload->data());
//$this->load->view('upload_success',$data);
echo json_encode($data);
}
else
{
$error = array('error' => $this->upload->display_errors());
$this->load->view('upload', $error);
}
}
}
?>