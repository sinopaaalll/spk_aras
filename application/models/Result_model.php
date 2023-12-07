<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Result_model extends CI_Model
{

    public function get_all_results()
    {
        $this->db->select('result.*, alternatives.name AS alternative_name, alternatives.description');
        $this->db->from('result');
        $this->db->join('alternatives', 'result.alternative_id = alternatives.id');
        $this->db->order_by('result.ranking', 'ASC');
        return $this->db->get()->result();
    }

    public function insert_result($data)
    {
        return $this->db->insert('result', $data);
    }

    public function update_ranking($id, $ranking)
    {
        $this->db->where('id', $id);
        $this->db->update('result', array('ranking' => $ranking));
    }

    public function truncate_result_table()
    {
        return $this->db->truncate('result');
    }
}
