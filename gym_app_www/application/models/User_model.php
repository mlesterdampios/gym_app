<?php
class User_model extends CI_Model {
    public function ajax_get_users()
    {
        return $this->db->get_where('tbl_users', array('is_deleted' => 0));
    }

    public function ajax_get_user_exercises($id)
    {
        return $this->db->get_where('tbl_exercise_user_logs', array('user_id' => $id, 'is_deleted' => 0));
    }

	public function get_users()
    {
        $query = $this->db->get_where('tbl_users', array('is_deleted' => 0));
        return $query->result_array();
    }

    public function get_user_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get_where('tbl_users', array('is_deleted' => 0));
            return $query->result_array();
        }
 
        $query = $this->db->get_where('tbl_users', array('id' => $id, 'is_deleted' => 0));
        return $query->row_array();
    }

    public function set_user($id = null,$data)
    {
        if ($id == null) {
            return $this->db->insert('tbl_users', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('tbl_users', $data);
        }
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_users', array('is_deleted' => 1));
    }

    public function login($data) {
        $query = $this->db->get_where('tbl_users', array('username' => $data['username'], 'password' => md5($data['password']), 'is_deleted' => 0));
        if ($query->num_rows() == 1) {
            return true;
        }
        return false;
    }

    public function read_user_information($username) {

        $query = $this->db->get_where('tbl_users', array('username' => $username, 'is_deleted' => 0));
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
        return false;
    }

}
?>