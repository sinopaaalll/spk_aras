<?php
class Criteria_model extends CI_Model
{
    public function get_all_criteria()
    {
        return $this->db->get('criteria')->result();
    }

    public function get_criteria_by_id($id)
    {
        return $this->db->get_where('criteria', array('id' => $id))->row();
    }

    public function add_criteria($data)
    {
        return $this->db->insert('criteria', $data);
    }

    public function update_criteria($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('criteria', $data);
    }

    public function delete_criteria($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('criteria');
    }
}
