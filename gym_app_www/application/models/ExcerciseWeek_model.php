<?php
class ExcerciseWeek_model extends CI_Model {
    public function ajax_get_ExcerciseWeek()
    {
        return $this->db->get_where('tbl_exercise_week', array('is_deleted' => 0));
    }

    public function get_ExcerciseWeek()
    {
        $query = $this->db->get_where('tbl_exercise_week', array('is_deleted' => 0));
        return $query->result_array();
    }

    public function get_ExcerciseWeek_by_day($id = 0)
    {

        $query = $this->db->get_where('tbl_exercise_week', array('day' => $id, 'is_deleted' => 0));
        return $query->result_array();
    }

    public function get_ExcerciseWeek_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get_where('tbl_exercise_week', array('is_deleted' => 0));
            return $query->result_array();
        }
 
        $query = $this->db->get_where('tbl_exercise_week', array('id' => $id, 'is_deleted' => 0));
        return $query->row_array();
    }

    public function set_ExcerciseWeek($id = null,$data)
    {
        if ($id == null) {
            return $this->db->insert('tbl_exercise_week', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('tbl_exercise_week', $data);
        }
    }

    public function delete_ExcerciseWeek($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_exercise_week', array('is_deleted' => 1));
    }

}
?>