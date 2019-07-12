<?php
class ExcerciseCategories_model extends CI_Model {
    public function ajax_get_ExcerciseCategories()
    {
        return $this->db->get_where('tbl_excercise_categories', array('is_deleted' => 0));
    }

    public function get_ExcerciseCategories()
    {
        $query = $this->db->get_where('tbl_excercise_categories', array('is_deleted' => 0));
        return $query->result_array();
    }

    public function get_ExcerciseCategories_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get_where('tbl_excercise_categories', array('is_deleted' => 0));
            return $query->result_array();
        }
 
        $query = $this->db->get_where('tbl_excercise_categories', array('id' => $id, 'is_deleted' => 0));
        return $query->row_array();
    }

    public function set_ExcerciseCategories($id = null,$data)
    {
        if ($id == null) {
            return $this->db->insert('tbl_excercise_categories', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('tbl_excercise_categories', $data);
        }
    }

    public function delete_ExcerciseCategories($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_excercise_categories', array('is_deleted' => 1));
    }

}
?>