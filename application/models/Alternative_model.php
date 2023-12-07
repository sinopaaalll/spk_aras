<?php
class Alternative_model extends CI_Model
{
    public function get_all_alternative()
    {
        return $this->db->get('alternatives')->result();
    }

    public function get_alternative_by_id($id)
    {
        return $this->db->get_where('alternatives', array('id' => $id))->row();
    }

    public function add_alternative($data)
    {
        return $this->db->insert('alternatives', $data);
    }

    public function update_alternative($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('alternatives', $data);
    }

    public function delete_alternative($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('alternatives');
    }
}
