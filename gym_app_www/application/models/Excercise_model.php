<?php
class Excercise_model extends CI_Model {
    public function ajax_get_Excercises()
    {
        return $this->db->get_where('tbl_excercises', array('is_deleted' => 0));
    }

	public function get_Excercises()
    {
        $query = $this->db->get_where('tbl_excercises', array('is_deleted' => 0));
        return $query->result_array();
    }

    public function get_Excercise_by_category_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get_where('tbl_excercises', array('is_deleted' => 0));
            return $query->result_array();
        }
 
        $query = $this->db->get_where('tbl_excercises', array('excercise_category_id' => $id, 'is_deleted' => 0));
        return $query->result_array();
    }

    public function get_Excercise_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get_where('tbl_excercises', array('is_deleted' => 0));
            return $query->result_array();
        }
 
        $query = $this->db->get_where('tbl_excercises', array('id' => $id, 'is_deleted' => 0));
        return $query->row_array();
    }

    public function set_Excercise($id = null,$data)
    {
        if ($id == null) {
            return $this->db->insert('tbl_excercises', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('tbl_excercises', $data);
        }
    }

    public function delete_Excercise($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_excercises', array('is_deleted' => 1));
    }
}
?>