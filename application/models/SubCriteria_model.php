<?php
class SubCriteria_model extends CI_Model
{
    public function get_all_sub_criteria()
    {
        $this->db->select('subcriteria.*, criteria.name as criteria');
        $this->db->from('subcriteria');
        $this->db->join('criteria', 'criteria.id = subcriteria.criteria_id');
        // $this->db->group_by('subcriteria.criteria_id');
        return $this->db->get()->result();
    }

    public function get_sub_criteria_by_criteria($criteria)
    {
        $this->db->select('subcriteria.*, criteria.name as criteria');
        $this->db->from('subcriteria');
        $this->db->join('criteria', 'criteria.id = subcriteria.criteria_id');
        $this->db->where('criteria_id', $criteria);
        // $this->db->group_by('subcriteria.criteria_id');
        return $this->db->get()->result();
    }

    public function get_sub_criteria_by_id($id)
    {
        return $this->db->get_where('subcriteria', array('id' => $id))->row();
    }

    public function add_sub_criteria($data)
    {
        return $this->db->insert('subcriteria', $data);
    }

    public function update_sub_criteria($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('subcriteria', $data);
    }

    public function delete_sub_criteria($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('subcriteria');
    }
}
