<?php
class Evaluation_model extends CI_Model
{
    public function get_all_evaluation()
    {
        return $this->db->get('evaluations')->result();
    }

    public function get_all_evaluation1()
    {
        $this->db->select('evaluations.*, criteria.name as criteria, alternatives.name as alternative');
        $this->db->from('evaluations');
        $this->db->join('criteria', 'criteria.id = evaluations.criteria_id');
        $this->db->join('alternatives', 'alternatives.id = evaluations.alternative_id');
        return $this->db->get()->result_array();
    }

    public function get_evaluation_by_alternative($id)
    {
        return $this->db->get_where('evaluations', array('alternative_id' => $id))->result_array();
    }

    public function add_evaluation_batch($data)
    {
        return $this->db->insert_batch('evaluations', $data);
    }

    public function update_evaluation_batch($data)
    {
        return $this->db->update_batch('evaluations', $data, 'id');
    }

    public function delete_evaluation($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('evaluations');
    }

    public function getEvaluationValue($evaluation, $alternative, $criteria)
    {
        foreach ($evaluation as $key => $value) {
            if ($value['alternative'] == $alternative && $value['criteria'] == $criteria) {
                return $value['value'];
            }
        }
        return ''; // Nilai default jika tidak ditemukan
    }
}
