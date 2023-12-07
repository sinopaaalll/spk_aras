<?php
class Criteria extends CI_Controller
{
    public function index()
    {
        $this->load->model('Criteria_model');
        $data['criteria'] = $this->Criteria_model->get_all_criteria();
        $data['title'] = "Criteria";
        $this->load->view('component/admin/header', $data);
        $this->load->view('component/admin/sidebar');
        $this->load->view('pages/criteria/index', $data);
        $this->load->view('component/admin/footer');
    }

    public function add()
    {
        // Menampilkan formulir tambah kriteria
        $data['title'] = "Criteria";
        $this->load->view('component/admin/header', $data);
        $this->load->view('component/admin/sidebar');
        $this->load->view('pages/criteria/add', $data);
        $this->load->view('component/admin/footer');
    }

    public function save()
    {
        // Proses penyimpanan data kriteria baru
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'weight' => $this->input->post('weight'),
            'jenis' => $this->input->post('jenis')
        );

        $this->load->model('Criteria_model');
        $this->Criteria_model->add_criteria($data);
        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('criteria');
    }

    public function edit($id)
    {
        // Menampilkan formulir edit kriteria
        $this->load->model('Criteria_model');
        $data['criteria'] = $this->Criteria_model->get_criteria_by_id($id);
        $data['title'] = "Criteria";
        $this->load->view('component/admin/header', $data);
        $this->load->view('component/admin/sidebar');
        $this->load->view('pages/criteria/edit', $data);
        $this->load->view('component/admin/footer');
    }

    public function update($id)
    {
        // Proses pembaruan data kriteria
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'weight' => $this->input->post('weight'),
            'jenis' => $this->input->post('jenis')
        );

        $this->load->model('Criteria_model');
        $this->Criteria_model->update_criteria($id, $data);
        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('criteria');
    }

    public function delete($id)
    {
        // Proses penghapusan data kriteria
        $this->load->model('Criteria_model');
        $this->Criteria_model->delete_criteria($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('criteria');
    }
}
